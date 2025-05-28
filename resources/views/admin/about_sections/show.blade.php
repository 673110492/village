@extends('admin.layouts.app')

@section('pageTitle', 'Gestion A propos')
@section('pageSubTitle', 'A propos / Détails')

@section('content')
    <div class="p-6 md:p-10">
        <div class="bg-white rounded-2xl shadow-md p-6 max-w-4xl mx-auto">

            <!-- Bouton retour -->
            <div class="mb-4">
                <a href="{{ route('admin.about_sections.index') }}"
                    class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                    ← Retour à la liste A propos
                </a>
            </div>

            <!-- Titre -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
                Détail A propos : <span class="text-blue-600">{{ $about->slug }}</span>
            </h2>

            <hr class="border-t-3 border-blue-500 mb-6">

            <!-- Médias -->
            <div class="flex flex-col md:flex-row gap-6">

                <!-- Image -->
                @if ($about->image)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md w-full md:w-1/2">
                        <strong class="block text-sm text-gray-500">Image :</strong>
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Image du about"
                            class="mt-2 w-full h-80 object-cover rounded-md shadow-md">
                    </div>
                @endif

                <!-- Vidéo YouTube -->
                @if ($about->lient_youtube)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md w-full md:w-1/2">
                        <strong class="block text-sm text-gray-500 mb-2">Vidéo :</strong>
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class="w-full h-80 rounded-md shadow-md"
                                src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($about->lient_youtube, 'v=') }}"
                                title="Vidéo YouTube" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @else
                    <p class="text-red-500">Vidéo non disponible.</p>
                @endif

            </div>

            <!-- Informations textuelles -->
            <div class="space-y-4 pt-5 text-gray-700">
                <div>
                    <strong class="block text-sm text-gray-500">Titre :</strong>
                    <p class="text-lg font-medium">{{ $about->slug }}</p>
                </div>

                <div>
                    <strong class="block text-sm text-gray-500">Contenu :</strong>
                    <div class="prose max-w-none">{!! $about->contenu !!}</div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.about_sections.edit', $about->id) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                    <i class="fa fa-edit"></i> Modifier
                </a>

                <form action="{{ route('admin.about_sections.destroy', $about->id) }}" method="POST"
                    onsubmit="return confirm('Voulez-vous vraiment supprimer cet élément ?');">
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
