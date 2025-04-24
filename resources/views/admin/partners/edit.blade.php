@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des Partenaires')
@section('pageSubTitle', 'Partenaires / Édition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.partners.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des partenaires
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier le partenaire : <span class="text-blue-600">{{ $partner->name }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire -->
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $partner->name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- URL -->
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 mb-1">Lien (URL)</label>
                <input type="url" name="url" id="url" value="{{ old('url', $partner->url) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Logo -->
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo (optionnel)</label>
                <input type="file" name="logo" id="logo"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo actuel" class="mt-2 w-24 h-24 object-contain rounded">
                @endif
            </div>

            <!-- Bouton Enregistrer -->
            <div class="pt-5 flex justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
