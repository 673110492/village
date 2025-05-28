@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4 flex flex-col h-[90vh]">

    <div class="bg-white rounded-xl shadow p-4 flex items-center space-x-4 mb-4 flex-shrink-0">
        <img src="{{ $user->photo ?? asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full object-cover">
        <h3 class="text-xl font-semibold text-gray-800">Discussion avec {{ $user->name }}</h3>
    </div>

    <div id="messagesContainer" class="flex-1 overflow-y-auto bg-gray-50 rounded-lg p-4 space-y-3 scrollbar-thin scrollbar-thumb-gray-300">
        @foreach($messages as $message)
            <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="{{ $message->sender_id == auth()->id() ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white border border-gray-300 text-gray-800 rounded-bl-none' }} max-w-[70%] px-4 py-2 shadow-md break-words">

                    @if ($message->message)
                        <p class="whitespace-pre-wrap">{{ $message->message }}</p>
                    @endif

                    @if ($message->attachment)
                        @if(Str::endsWith($message->attachment, ['.jpg', '.jpeg', '.png', '.gif']))
                            <img src="{{ asset('storage/attachments/' . $message->attachment) }}" alt="Image" class="w-40 h-auto rounded mt-2 object-cover">
                        @else
                            <a href="{{ asset('storage/attachments/' . $message->attachment) }}" target="_blank" class="block mt-2 text-sm underline">📎 Fichier joint</a>
                        @endif
                    @endif

                    @if ($message->audio)
                        <audio controls class="mt-2 w-full rounded">
                            <source src="{{ asset('storage/audios/' . $message->audio) }}" type="audio/mpeg">
                            Ton navigateur ne supporte pas l'audio.
                        </audio>
                    @endif

                    <div class="flex justify-between items-center mt-1 text-xs opacity-60">
                        <span>{{ $message->created_at->format('H:i') }}</span>
                        <button type="button" onclick="respondToMessage('{{ $message->id }}', '{{ addslashes($message->message) }}')" class="text-blue-300 hover:text-blue-100 ml-2">Répondre</button>
                    </div>

                    <div class="mt-1">
                        <span class="message-status"></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST" enctype="multipart/form-data"
          class="mt-4 flex items-center space-x-2 flex-shrink-0 bg-white p-3 rounded-lg shadow sticky bottom-0">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" id="respond_to_message_id" name="respond_to_message_id">

        <textarea name="message" id="message" rows="1" placeholder="Écris un message..."
                  class="flex-grow resize-none border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

        <input type="file" name="attachment" class="hidden" id="attachmentInput">
        <label for="attachmentInput" class="cursor-pointer text-gray-500 hover:text-gray-700 text-xl" title="Joindre un fichier">📎</label>

        <input type="file" name="audio" id="audioInput" class="hidden">

        <button type="button" id="recordButton" class="text-yellow-500 hover:text-yellow-600 text-2xl" title="Enregistrer un audio">🎙</button>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full font-semibold">Envoyer</button>
    </form>

    <p id="recordingStatus" class="text-sm mt-2 text-gray-500"></p>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Scroll automatique vers le bas au chargement
        const messagesContainer = document.getElementById('messagesContainer');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // Gestion des statuts messages (✔✔)
        const messages = document.querySelectorAll('[data-message-id]');
        messages.forEach(message => {
            const isRead = message.getAttribute('data-is-read') === 'true';
            const statusElement = message.querySelector('.message-status');

            if (isRead) {
                statusElement.textContent = '✔✔';
                statusElement.classList.add('text-blue-400');
            } else {
                statusElement.textContent = '✔';
                statusElement.classList.add('text-blue-400');
            }

            message.addEventListener('click', () => {
                if (!isRead) {
                    fetch(`/messages/${message.getAttribute('data-message-id')}/mark-as-read`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ is_read: true })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            message.setAttribute('data-is-read', 'true');
                            statusElement.textContent = '✔✔';
                        }
                    })
                    .catch(console.error);
                }
            });
        });

        // Répondre à un message
        window.respondToMessage = function(messageId, messageText) {
            document.getElementById('respond_to_message_id').value = messageId;
            document.getElementById('message').value = 'Répondre à : ' + messageText;
            document.getElementById('message').focus();
        };

        // Enregistrement audio
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
                    .catch(err => {
                        console.error('Erreur d\'accès au microphone :', err);
                        alert('Impossible d\'accéder au microphone.');
                    });
            }
        });

        // Auto-grow textarea
        const textarea = document.getElementById('message');
        textarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
</script>
@endpush

@endsection
