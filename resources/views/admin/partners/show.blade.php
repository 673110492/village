@extends('admin.layouts.app')
@section('pageTitle', 'Détails du Partenaire')
@section('pageSubTitle', 'Partenaires / Détails')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.partners.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des partenaires
            </a>
        </div>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Détails du partenaire</h2>

        <div class="mb-4">
            <strong>Nom :</strong> {{ $partner->name }}
        </div>

        <div class="mb-4">
            <strong>URL :</strong>
            @if($partner->url)
                <a href="{{ $partner->url }}" target="_blank" class="text-blue-600 underline">{{ $partner->url }}</a>
            @else
                <span class="text-gray-500">N/A</span>
            @endif
        </div>

        <div class="mb-4">
            <strong>Logo :</strong><br>
            @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="w-32 h-32 object-contain border mt-2">
            @else
                <span class="text-gray-500">Pas de logo</span>
            @endif
        </div>

        <!-- Actions -->
    <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.partners.edit', $partner->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce partner ?');">
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
