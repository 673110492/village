@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des projets')
@section('pageSubTitle', 'Projets / Edition')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.projects.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des projet
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Modifier le projet : <span class="text-blue-600">{{ $project->slug }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire d'édition -->
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre du project -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Titre du projet</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (optionnelle)</label>
                <input type="file" name="image" id="image"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @if($project->image)
                  <img src="{{ asset('storage/' . $project->image) }}" alt="Image actuelle" class="mt-2 w-24 h-24 object-cover rounded">
                @endif
                @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <!-- Description (Rich Text) -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" class="richtext w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('description', $project->description) }}</textarea>
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

<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.richtext',
            height: 300,
            menubar: false,
            plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>
    @endsection
