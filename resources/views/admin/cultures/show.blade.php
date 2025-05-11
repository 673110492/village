@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des Cultures')
@section('pageSubTitle', 'Culture / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.cultures.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des cultures
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de la culture : <span class="text-blue-600">{{ $culture->nom }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Image principale -->
        @if($culture->image1)
            <div>
                <strong class="block text-sm text-gray-500">Image :</strong>
                <img src="{{ asset('storage/' . $culture->image1) }}" alt="Image"
                     class="mt-2 w-full max-w-xs h-80 object-cover rounded shadow-md">
            </div>
        @endif
        @if($culture->image2)
            <div>
                <strong class="block text-sm text-gray-500">Image2 :</strong>
                <img src="{{ asset('storage/' . $culture->image2) }}" alt="Image"
                     class="mt-2 w-full max-w-xs h-80 object-cover rounded shadow-md">
            </div>
        @endif

        <!-- Détails -->
        <div class="space-y-4 pt-5 text-gray-700">
            <div>
                <strong class="block text-sm text-gray-500">Nom :</strong>
                <p class="text-lg font-medium">{{ $culture->nom }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Origine :</strong>
                <p class="text-lg">{{ $culture->origine ?? 'Non précisée' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Type :</strong>
                <p class="text-lg">{{ $culture->type ?? 'Non spécifié' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Date de célébration :</strong>
                <p class="text-lg">{{ $culture->date_celebration ? \Carbon\Carbon::parse($culture->date_celebration)->format('d/m/Y') : 'Non définie' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Lieu de célébration :</strong>
                <p class="text-lg">{{ $culture->lieu_celebration ?? 'Non précisé' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Description :</strong>
                <div class="prose max-w-none">{!! $culture->description !!}</div>
            </div>

            @if($culture->video1)
                <div>
                    <strong class="block text-sm text-gray-500">Vidéo 1 :</strong>
                    <video controls class="w-full mt-2 rounded shadow-md">
                        <source src="{{ asset('storage/' . $culture->video1) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de cette vidéo.
                    </video>
                </div>
            @endif

            @if($culture->video2)
                <div>
                    <strong class="block text-sm text-gray-500">Vidéo 2 :</strong>
                    <video controls class="w-full mt-2 rounded shadow-md">
                        <source src="{{ asset('storage/' . $culture->video2) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de cette vidéo.
                    </video>
                </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.cultures.edit', $culture->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.cultures.destroy', $culture->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette culture ?');">
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
