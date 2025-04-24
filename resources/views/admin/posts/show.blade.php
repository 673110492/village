@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des actualités')
@section('pageSubTitle', 'Actualités / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.posts.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des actualités
            </a>
        </div>
        
        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de l’actualité : <span class="text-blue-600">{{ $post->slug }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Détails de l’actualité -->
        @if($post->cover_image)
            <div>
                <strong class="block text-sm text-gray-500">Image :</strong>
                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Image du post"
                     class="mt-2 w-full max-h-80 object-cover rounded shadow-md">
            </div>
        @endif

        <div class="space-y-4 pt-5 text-gray-700">
            <div>
                <strong class="block text-sm text-gray-500">Titre :</strong>
                <p class="text-lg font-medium">{{ $post->slug }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Contenu :</strong>
                <div class="prose max-w-none">{!! $post->contenu !!}</div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.posts.edit', $post->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette actualité ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
                    <i class="fa fa-trash"></i> Supprimer
                </button>
            </form>
        </div>
    </div>

    <!-- Liste des commentaires -->
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto mt-10">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Commentaires associés</h3>

        @forelse($post->comments as $comment)
            <div class="border border-gray-200 rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center">
                    <p class="font-medium text-gray-800">
                        {{ $comment->auteur }} — <span class="text-sm text-gray-500">{{ $comment->created_at->format('d/m/Y à H:i') }}</span>
                    </p>
                    <div class="flex gap-2">
                        @if(!$comment->is_approved)
                            <form action="{{ route('admin.comments.approve', $comment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-600 hover:text-green-800 text-sm font-semibold">
                                    Approuver
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                              onsubmit="return confirm('Supprimer ce commentaire ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                <p class="mt-2 text-gray-700">{{ $comment->contenu }}</p>
            </div>
        @empty
            <p class="text-gray-500">Aucun commentaire pour cette actualité.</p>
        @endforelse
    </div>
</div>
@endsection
