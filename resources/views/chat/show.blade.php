@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white rounded-xl shadow p-4">
        <div class="flex items-center mb-4">
            <img src="{{ $user->photo ?? asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full mr-4">
            <h3 class="text-xl font-semibold text-gray-800">Discussion avec {{ $user->name }}</h3>
        </div>

        <div class="h-96 overflow-y-auto space-y-4 mb-4 px-2 py-3 bg-gray-50 rounded">
            @foreach($messages as $message)
                <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}"
                     data-message-id="{{ $message->id }}"
                     data-is-read="{{ $message->is_read ? 'true' : 'false' }}">
                    <div class="{{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }} max-w-xs px-4 py-2 rounded-lg shadow-sm">
                        @if ($message->message)
                            <p class="text-sm mb-1">{{ $message->message }}</p>
                        @endif

                        @if ($message->attachment)
                            @if(Str::endsWith($message->attachment, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ asset('storage/attachments/' . $message->attachment) }}" class="w-32 h-auto rounded mt-1" alt="Image">
                            @else
                                <a href="{{ asset('storage/attachments/' . $message->attachment) }}" target="_blank" class="text-sm underline mt-1 block">📎 Fichier joint</a>
                            @endif
                        @endif

                        @if ($message->audio)
                            <audio controls class="mt-2 w-full">
                                <source src="{{ asset('storage/audios/' . $message->audio) }}" type="audio/mpeg">
                                Ton navigateur ne supporte pas l'audio.
                            </audio>
                        @endif

                        <span class="block text-xs text-right opacity-60 mt-1">
                            {{ $message->created_at->format('H:i') }}
                        </span>

                        <button type="button" onclick="respondToMessage('{{ $message->id }}', '{{ $message->message }}')" class="text-xs text-blue-500 mt-1">Répondre</button>

                        <!-- Affichage des traits en fonction de l'état du message -->
                        <div class="mt-2">
                            <span class="message-status"></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="{{ route('chat.send') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-2">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" id="respond_to_message_id" name="respond_to_message_id"> <!-- Champ caché pour le message auquel on répond -->
            <textarea name="message" id="message" rows="1" placeholder="Écris un message..." class="flex-grow resize-none p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            <input type="file" name="attachment" class="text-sm">
            <input type="file" name="audio" id="audioInput" class="hidden">
            <button type="button" id="recordButton" class="bg-yellow-400 text-white px-3 py-2 rounded hover:bg-yellow-500">🎙</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Envoyer</button>
        </form>
        <p id="recordingStatus" class="text-sm mt-2 text-gray-500"></p>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionner tous les messages
        const messages = document.querySelectorAll('[data-message-id]');

        messages.forEach(message => {
            const isRead = message.getAttribute('data-is-read') === 'true'; // Vérifier si le message est lu ou non
            const statusElement = message.querySelector('.message-status');

            // Affichage des traits en fonction de l'état du message
            if (isRead) {
                // Si le message est lu, afficher deux traits bleus
                statusElement.textContent = '✔✔';
                statusElement.classList.add('text-blue-500');
            } else {
                // Si le message n'est pas lu, afficher un seul trait bleu
                statusElement.textContent = '✔';
                statusElement.classList.add('text-blue-500');
            }

            // Marquer le message comme lu au clic
            message.addEventListener('click', function () {
                if (!isRead) {
                    fetch(`/messages/${message.getAttribute('data-message-id')}/mark-as-read`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ is_read: true })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            message.setAttribute('data-is-read', 'true');
                            statusElement.textContent = '✔✔';
                            statusElement.classList.add('text-blue-500');
                        }
                    }).catch(err => console.log(err));
                }
            });
        });

        // Fonction pour répondre à un message
        function respondToMessage(messageId, messageText) {
            console.log('Répondre au message ID:', messageId, 'Message:', messageText); // Log pour vérifier que la fonction est appelée
            document.getElementById('respond_to_message_id').value = messageId;  // Remplir le champ caché avec l'ID du message
            document.getElementById('message').value = 'Répondre à : ' + messageText;  // Ajouter le texte du message auquel on répond
        }

        // Fonction d'enregistrement audio
        let mediaRecorder;
        let audioChunks = [];

        document.getElementById('recordButton').addEventListener('click', function () {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                mediaRecorder.stop();
                document.getElementById('recordingStatus').textContent = 'Enregistrement terminé.';
            } else {
                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(stream => {
                        mediaRecorder = new MediaRecorder(stream);
                        mediaRecorder.ondataavailable = event => audioChunks.push(event.data);
                        mediaRecorder.onstop = () => {
                            const audioBlob = new Blob(audioChunks, { type: 'audio/mpeg' });
                            const audioUrl = URL.createObjectURL(audioBlob);
                            const audioInput = document.getElementById('audioInput');
                            const file = new File([audioBlob], 'audio-recording.mp3', { type: 'audio/mpeg' });
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(file);
                            audioInput.files = dataTransfer.files;
                            audioChunks = [];
                        };
                        mediaRecorder.start();
                        document.getElementById('recordingStatus').textContent = 'Enregistrement en cours...';
                    })
                    .catch(err => console.log('Erreur d\'accès au microphone :', err));
            }
        });
    });
</script>
@endpush

@endsection
