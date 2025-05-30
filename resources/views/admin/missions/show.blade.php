@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des missions')
@section('pageSubTitle', 'Mission / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.missions.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des missions
            </a>
        </div>
        
        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de la mission : <span class="text-blue-600">{{ $mission->titre }}</span>
        </h2>
        <hr class="border-t-2 border-blue-500 mb-6">

        <!-- Détails -->
        <div class="space-y-6 text-gray-700">

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Titre :</strong>
                <p class="text-lg font-medium">{{ $mission->title }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Description :</strong>
                <div class="prose max-w-none">{{$mission->description}}</div>
            </div>

        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.missions.edit', $mission->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fas fa-edit mr-1"></i> Modifier
            </a>

            <form action="{{ route('admin.missions.destroy', $mission->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
                    <i class="fas fa-trash-alt mr-1"></i> Supprimer
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
