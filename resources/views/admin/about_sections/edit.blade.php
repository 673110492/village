@extends('admin.layouts.app')

@section('pageTitle', 'Gestion A propos')
@section('pageSubTitle', 'A propos / Edition')

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

            <!-- Formulaire d'édition -->
            <form action="{{ route('admin.about_sections.update', $about->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Titre du service -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Titre du service</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $about->slug) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
                    @error('slug')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (optionnelle)</label>
                    <input type="file" name="image" id="image"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @if ($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Image actuelle"
                            class="mt-2 w-24 h-24 object-cover rounded">
                    @endif
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vidéo -->
                <div>
                    <label for="lient_youtube" class="block text-sm font-medium text-gray-700 mb-1">Lien YouTube
                        (optionnel)</label>
                    <input type="url" name="lient_youtube" id="lient_youtube"
                        placeholder="https://www.youtube.com/watch?v=exemple"
                        value="{{ old('lient_youtube', $about->lient_youtube) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" />

                    @if ($about->lient_youtube)
                        <div class="mt-4">
                            <iframe width="100%" height="315" class="rounded-lg"
                                src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($about->lient_youtube, 'v=') }}"
                                title="Vidéo YouTube" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @endif

                    @error('lient_youtube')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- contenu (Rich Text) -->
                <div>
                    <label for="contenu" class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
                    <textarea name="contenu" id="contenu"
                        class="richtext w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('contenu', $about->contenu) }}</textarea>
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
