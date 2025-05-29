@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des Événements')
@section('pageSubTitle', 'Événement / Détails')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ url('admin/admin/cultures') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des événements
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de l'événement : <span class="text-blue-600">{{ $culture->titre }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Images côte à côte -->
        @if($culture->image1 || $culture->image2)
            <div class="flex flex-wrap gap-4 mb-6">
                @if($culture->image1)
                    <div class="flex-1 min-w-[200px]">
                        <strong class="block text-sm text-gray-500 mb-1">Image 1 :</strong>
                        <img src="{{ asset('storage/' . $culture->image1) }}" alt="Image 1"
                             class="w-full h-64 object-cover rounded shadow-md">
                    </div>
                @endif

                @if($culture->image2)
                    <div class="flex-1 min-w-[200px]">
                        <strong class="block text-sm text-gray-500 mb-1">Image 2 :</strong>
                        <img src="{{ asset('storage/' . $culture->image2) }}" alt="Image 2"
                             class="w-full h-64 object-cover rounded shadow-md">
                    </div>
                @endif
            </div>
        @endif

        <!-- Détails -->
        <div class="space-y-4 pt-5 text-gray-700">
            <div>
                <strong class="block text-sm text-gray-500">Titre :</strong>
                <p class="text-lg font-medium">{{ $culture->titre }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Référence :</strong>
                <p class="text-lg">{{ $culture->reference ?? 'Non spécifiée' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Description :</strong>
                <div class="prose max-w-none">{!! $culture->description !!}</div>
            </div>
        </div>

        <!-- Vidéos YouTube -->
        @if($culture->lien_youtube1 || $culture->lien_youtube2)
            <div class="grid md:grid-cols-2 gap-4 mt-6">
                @if($culture->lien_youtube1)
                    <div>
                        <strong class="block text-sm text-gray-500 mb-1">Vidéo 1 :</strong>
                        <iframe class="w-full h-64 rounded shadow-md"
                                src="{{ Str::contains($culture->lien_youtube1, 'embed') ? $culture->lien_youtube1 : 'https://www.youtube.com/embed/' . Str::after($culture->lien_youtube1, 'v=') }}"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                @endif

                @if($culture->lien_youtube2)
                    <div>
                        <strong class="block text-sm text-gray-500 mb-1">Vidéo 2 :</strong>
                        <iframe class="w-full h-64 rounded shadow-md"
                                src="{{ Str::contains($culture->lien_youtube2, 'embed') ? $culture->lien_youtube2 : 'https://www.youtube.com/embed/' . Str::after($culture->lien_youtube2, 'v=') }}"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        @endif

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.cultures.edit', $culture->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.cultures.destroy', $culture->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cet événement ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
                    <i class="fa fa-trash"></i> Supprimer
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
