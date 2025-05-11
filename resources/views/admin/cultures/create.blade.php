@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des Événements')
@section('pageSubTitle', 'Événements / Ajout')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.cultures.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des événements
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Créer un nouvel événement
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire -->
        <form action="{{ route('admin.cultures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input type="text" name="nom" id="nom" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Origine -->
            <div>
                <label for="origine" class="block text-sm font-medium text-gray-700 mb-1">Origine</label>
                <input type="text" name="origine" id="origine"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea rows="6" name="description" id="description"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('description') }}</textarea>
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <input type="text" name="type" id="type"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Date de célébration -->
            <div>
                <label for="date_celebration" class="block text-sm font-medium text-gray-700 mb-1">Date de célébration</label>
                <input type="date" name="date_celebration" id="date_celebration"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Lieu de célébration -->
            <div>
                <label for="lieu_celebration" class="block text-sm font-medium text-gray-700 mb-1">Lieu de célébration</label>
                <input type="text" name="lieu_celebration" id="lieu_celebration"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Image 1 -->
            <div>
                <label for="image1" class="block text-sm font-medium text-gray-700 mb-1">Image 1</label>
                <input type="file" name="image1" id="image1"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <!-- Image 2 -->
            <div>
                <label for="image2" class="block text-sm font-medium text-gray-700 mb-1">Image 2</label>
                <input type="file" name="image2" id="image2"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <!-- Vidéo 1 -->
            <div>
                <label for="video1" class="block text-sm font-medium text-gray-700 mb-1">Vidéo 1 (lien YouTube ou fichier)</label>
                <input type="file" name="video1" id="video1"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Vidéo 2 -->
            <div>
                <label for="video2" class="block text-sm font-medium text-gray-700 mb-1">Vidéo 2 (lien YouTube ou fichier)</label>
                <input type="file" name="video2" id="video2"
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
