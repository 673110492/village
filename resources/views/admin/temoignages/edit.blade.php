@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des temoignages')
@section('pageSubTitle', 'Temoignages / Édition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.testimonials.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des temoignages
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier le temoignage : <span class="text-blue-600">{{ $temoignage->slug }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire d'édition -->
        <form action="{{ route('admin.testimonials.update', $temoignage->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre du temoignage -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $temoignage->name) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="fonction" class="block text-sm font-medium text-gray-700 mb-1">Fonction</label>
                <input type="text" name="fonction" id="fonction" value="{{ old('fonction', $temoignage->fonction) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('fonction')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- photo -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                <input type="file" name="photo" id="photo"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($temoignage->photo)
                  <img src="{{ asset('storage/' . $temoignage->photo) }}" alt="photo actuelle" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
                @error('photo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <!-- Description (Rich Text) -->
            <div>
                <label for="contenu" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea name="contenu" rows="8" id="contenu" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('contenu', $temoignage->contenu) }}</textarea>
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
