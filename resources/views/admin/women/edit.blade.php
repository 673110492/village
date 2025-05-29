@extends('admin.layouts.app')
@section('pageTitle', 'Modifier une valeur')
@section('pageSubTitle', 'Valeurs / Édition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.women.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des valeurs
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier la valeur : <span class="text-blue-600">{{ $value->title }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire d'édition -->
        <form action="{{ route('admin.women.update', $value->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                <input type="text" name="title" id="title" value="{{ old('title', $value->title) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Edition -->
            <div>
                <label for="edition" class="block text-sm font-medium text-gray-700 mb-1">Édition</label>
                <textarea name="edition" id="edition" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('edition', $value->edition) }}</textarea>
                @error('edition')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="6"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('description', $value->description) }}</textarea>
                @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Lien Youtube 1 -->
            <div>
                <label for="lien_youtube1" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 1</label>
                <input type="url" name="lien_youtube1" id="lien_youtube1" value="{{ old('lien_youtube1', $value->lien_youtube1) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('lien_youtube1')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Lien Youtube 2 -->
            <div>
                <label for="lien_youtube2" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube 2</label>
                <input type="url" name="lien_youtube2" id="lien_youtube2" value="{{ old('lien_youtube2', $value->lien_youtube2) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('lien_youtube2')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Image 1 -->
            <div>
                <label for="image1" class="block text-sm font-medium text-gray-700 mb-1">Image 1</label>
                @if($value->image1)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $value->image1) }}" alt="Image 1" class="w-32 h-auto rounded">
                    </div>
                @endif
                <input type="file" name="image1" id="image1"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('image1')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Image 2 -->
            <div>
                <label for="image2" class="block text-sm font-medium text-gray-700 mb-1">Image 2</label>
                @if($value->image2)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $value->image2) }}" alt="Image 2" class="w-32 h-auto rounded">
                    </div>
                @endif
                <input type="file" name="image2" id="image2"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('image2')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Start Date -->
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $value->start_date) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('start_date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select name="status" id="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300">
                    <option value="activé" {{ old('status', $value->status) === 'activé' ? 'selected' : '' }}>Activé</option>
                    <option value="désactivé" {{ old('status', $value->status) === 'désactivé' ? 'selected' : '' }}>Désactivé</option>
                </select>
                @error('status')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
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
