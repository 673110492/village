@extends('admin.layouts.app')

@section('pageTitle', 'Gestion de l\'Équipe')
@section('pageSubTitle', 'Équipe / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.teams.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste de l'équipe
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail du membre : <span class="text-blue-600">{{ $team->name }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Détails -->
        @if($team->image)
            <div>
                <strong class="block text-sm text-gray-500">Photo :</strong>
                <img src="{{ asset('storage/' . $team->image) }}" alt="Photo du membre"
                     class="mt-2 w-full max-w-xs h-80 object-cover rounded shadow-md">
            </div>
        @endif

        <div class="space-y-4 pt-5 text-gray-700">
            <div>
                <strong class="block text-sm text-gray-500">Nom :</strong>
                <p class="text-lg font-medium">{{ $team->name }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Fonction :</strong>
                <p class="text-lg">{{ $team->fonction }}</p>
            </div>
            <div>
                <strong class="block text-sm text-gray-500">Téléphone :</strong>
                <p class="text-lg">{{ $team->tel }}</p>
            </div>
            <div>
                <strong class="block text-sm text-gray-500">Presentation :</strong>
                <div class="prose max-w-none">{!! $team->presentation !!}</div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.teams.edit', $team->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce membre ?');">
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
