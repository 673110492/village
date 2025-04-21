@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des services')
@section('pageSubTitle', 'Services / Détails')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.services.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des services
            </a>
        </div>
        
        <!-- Titre -->

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Détail du service : <span class="text-blue-600">{{ $service->slug }}</span>
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Détails -->
        @if($service->image)
            <div>
                <strong class="block text-sm text-gray-500">Image :</strong>
                <img src="{{ asset('storage/' . $service->image) }}" alt="Image du service"
                     class="mt-2 w-100 h-80 rounded shadow-md">
            </div>
            @endif
        <div class="space-y-4 pt-5 text-gray-700">
            <div>
                <strong class="block text-sm text-gray-500">Titre :</strong>
                <p class="text-lg font-medium">{{ $service->slug }}</p>
            </div>

            <div>
                <strong class="block text-sm text-gray-500">Description :</strong>
                <div class="prose max-w-none">{!! $service->description !!}</div>
            </div>

        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.services.edit', $service->id) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?');">
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
