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

        <!-- Affichage global des erreurs -->
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <strong>Oups ! Une erreur s'est produite :</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('admin.cultures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Titre -->
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                       class="w-full px-4 py-2 border @error('titre') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('titre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Référence -->
            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Référence</label>
                <input type="text" name="reference" id="reference" value="{{ old('reference') }}"
                       class="w-full px-4 py-2 border @error('reference') border-red-500 @else border-gray-300 @enderror rounded-lg" />
                @error('reference')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea rows="6" name="description" id="description"
                          class="w-full border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image 1 -->
            <div>
                <label for="image1" class="block text-sm font-medium text-gray-700 mb-1">Image 1</label>
                <input type="file" name="image1" id="image1"
                       class="w-full px-4 py-2 border @error('image1') border-red-500 @else border-gray-300 @enderror rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('image1')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image 2 -->
            <div>
                <label for="image2" class="block text-sm font-medium text-gray-700 mb-1">Image 2</label>
                <input type="file" name="image2" id="image2"
                       class="w-full px-4 py-2 border @error('image2') border-red-500 @else border-gray-300 @enderror rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('image2')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lien Youtube 1 -->
            <div>
                <label for="lien_youtube1" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 1</label>
                <input type="url" name="lien_youtube1" id="lien_youtube1" value="{{ old('lien_youtube1') }}"
                       class="w-full px-4 py-2 border @error('lien_youtube1') border-red-500 @else border-gray-300 @enderror rounded-lg" />
                @error('lien_youtube1')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lien Youtube 2 -->
            <div>
                <label for="lien_youtube2" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 2</label>
                <input type="url" name="lien_youtube2" id="lien_youtube2" value="{{ old('lien_youtube2') }}"
                       class="w-full px-4 py-2 border @error('lien_youtube2') border-red-500 @else border-gray-300 @enderror rounded-lg" />
                @error('lien_youtube2')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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
