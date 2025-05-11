@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des Célébrations')
@section('pageSubTitle', 'Célébrations / Édition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.cultures.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des culture
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier la célébration : <span class="text-blue-600">{{ $culture->nom }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire -->
        <form action="{{ route('admin.cultures.update', $culture->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom', $culture->nom) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Origine -->
            <div>
                <label for="origine" class="block text-sm font-medium text-gray-700 mb-1">Origine</label>
                <input type="text" name="origine" id="origine" value="{{ old('origine', $culture->origine) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <input type="text" name="type" id="type" value="{{ old('type', $culture->type) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Date de célébration -->
            <div>
                <label for="date_culture" class="block text-sm font-medium text-gray-700 mb-1">Date de célébration</label>
                <input type="date" name="date_culture" id="date_culture" value="{{ old('date_culture', $culture->date_culture) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Lieu -->
            <div>
                <label for="lieu_culture" class="block text-sm font-medium text-gray-700 mb-1">Lieu de célébration</label>
                <input type="text" name="lieu_culture" id="lieu_culture" value="{{ old('lieu_culture', $culture->lieu_culture) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea rows="6" name="description" id="description"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('description', $culture->description) }}</textarea>
            </div>

            <!-- Image 1 -->
            <div>
                <label for="image1" class="block text-sm font-medium text-gray-700 mb-1">Image 1</label>
                <input type="file" name="image1" id="image1"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($culture->image1)
                    <img src="{{ asset('storage/' . $culture->image1) }}" alt="Image 1" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
            </div>

            <!-- Image 2 -->
            <div>
                <label for="image2" class="block text-sm font-medium text-gray-700 mb-1">Image 2</label>
                <input type="file" name="image2" id="image2"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($culture->image2)
                    <img src="{{ asset('storage/' . $culture->image2) }}" alt="Image 2" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
            </div>

            <!-- Vidéo 1 -->
            <div>
                <label for="video1" class="block text-sm font-medium text-gray-700 mb-1">Vidéo 1 (lien YouTube ou fichier)</label>
                <input type="text" name="video1" id="video1" value="{{ old('video1', $culture->video1) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Vidéo 2 -->
            <div>
                <label for="video2" class="block text-sm font-medium text-gray-700 mb-1">Vidéo 2 (lien YouTube ou fichier)</label>
                <input type="text" name="video2" id="video2" value="{{ old('video2', $culture->video2) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
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
