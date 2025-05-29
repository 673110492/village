@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des valeurs')
@section('pageSubTitle', 'Valeurs / Détails')

@php
    // Fonction PHP pour extraire l'ID YouTube depuis l'URL
    function extractYoutubeId($url) {
        if (!$url) return null;
        preg_match('/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|embed\/))([^\?&"\'<> #]+)/', $url, $matches);
        return $matches[4] ?? null;
    }

    $youtube1 = extractYoutubeId($value->lien_youtube1);
    $youtube2 = extractYoutubeId($value->lien_youtube2);
@endphp

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.women.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des valeurs
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail de la valeur : <span class="text-blue-600">{{ $value->title }}</span>
        </h2>
        <hr class="border-t-2 border-blue-500 mb-6">

        <!-- Détails -->
        <div class="space-y-6 text-gray-700">

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Titre :</strong>
                <p class="text-lg font-medium">{{ $value->title }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Édition :</strong>
                <p>{{ $value->edition ?? '-' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Description :</strong>
                <div class="prose max-w-none">{!! nl2br(e($value->description)) !!}</div>
            </div>

            <!-- Vidéos YouTube -->
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Vidéos YouTube :</strong>
                <div class="flex gap-4">
                    @if ($youtube1)
                        <div class="w-1/3 aspect-w-16 aspect-h-9">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $youtube1 }}"
                                title="YouTube video 1"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                class="w-full h-full rounded-lg"
                            ></iframe>
                        </div>
                    @endif

                    @if ($youtube2)
                        <div class="w-1/3 aspect-w-16 aspect-h-9">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $youtube2 }}"
                                title="YouTube video 2"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                class="w-full h-full rounded-lg"
                            ></iframe>
                        </div>
                    @endif

                    @if (!$youtube1 && !$youtube2)
                        <span>Aucune vidéo disponible</span>
                    @endif
                </div>
            </div>

            <!-- Images -->
            <div>
                <strong class="block text-sm text-gray-500 mb-1">Images :</strong>
                <div class="flex gap-4">
                    @if ($value->image1)
                        <img src="{{ asset('storage/' . $value->image1) }}" alt="Image 1" class="w-1/3 rounded-lg object-cover aspect-[16/9]">
                    @endif
                    @if ($value->image2)
                        <img src="{{ asset('storage/' . $value->image2) }}" alt="Image 2" class="w-1/3 rounded-lg object-cover aspect-[16/9]">
                    @endif
                    @if (!$value->image1 && !$value->image2)
                        <span>Aucune image disponible</span>
                    @endif
                </div>
            </div>

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Date de début :</strong>
                <p>{{ $value->start_date ?? '-' }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500 mb-1">Statut :</strong>
                <p class="{{ $value->status === 'activé' ? 'text-green-600' : 'text-red-600' }}">
                    {{ ucfirst($value->status) }}
                </p>
            </div>

        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.women.edit', $value->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fas fa-edit mr-1"></i> Modifier
            </a>

            <form action="{{ route('admin.women.destroy', $value->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette valeur ?');">
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
