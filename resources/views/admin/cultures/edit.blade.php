@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des Cultures')
@section('pageSubTitle', 'Culture / Édition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.cultures.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des cultures
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier la culture : <span class="text-blue-600">{{ $culture->titre }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire -->
        <form action="{{ route('admin.cultures.update', $culture->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre', $culture->titre) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Référence -->
            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Référence</label>
                <input type="text" name="reference" id="reference" value="{{ old('reference', $culture->reference) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="6"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('description', $culture->description) }}</textarea>
            </div>

            <!-- Image 1 -->
            <div>
                <label for="image1" class="block text-sm font-medium text-gray-700 mb-1">Image 1</label>
                <input type="file" name="image1" id="image1"
                       class="w-full border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($culture->image1)
                    <img src="{{ asset('storage/' . $culture->image1) }}" alt="Image 1" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
            </div>

            <!-- Image 2 -->
            <div>
                <label for="image2" class="block text-sm font-medium text-gray-700 mb-1">Image 2</label>
                <input type="file" name="image2" id="image2"
                       class="w-full border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($culture->image2)
                    <img src="{{ asset('storage/' . $culture->image2) }}" alt="Image 2" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
            </div>

            <!-- Lien YouTube 1 -->
            <div>
                <label for="lien_youtube1" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 1</label>
                <input type="text" name="lien_youtube1" id="lien_youtube1" value="{{ old('lien_youtube1', $culture->lien_youtube1) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" />
            </div>

            <!-- Lien YouTube 2 -->
            <div>
                <label for="lien_youtube2" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 2</label>
                <input type="text" name="lien_youtube2" id="lien_youtube2" value="{{ old('lien_youtube2', $culture->lien_youtube2) }}"
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
