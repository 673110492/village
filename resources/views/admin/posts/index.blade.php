@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des actualités')
@section('pageSubTitle', 'Actualités / Liste')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto"> {{-- Ajout overflow-x-auto pour scroll sur mobile --}}
        <div class="flex justify-between items-center mb-4 flex-wrap gap-2"> {{-- flex-wrap pour éviter le débordement sur petit écran --}}
            <h2 class="text-2xl font-semibold text-gray-700">Liste des actualités</h2>
            <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        <table id="postsTable" class="min-w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-2 text-left whitespace-nowrap">Titre</th>
                    <th class="p-2 text-left whitespace-nowrap">Image</th>
                    <th class="p-2 text-left whitespace-nowrap">Statut</th>
                    <th class="p-2 text-left whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-2 whitespace-nowrap">{{ $post->slug }}</td>
                        <td class="p-2">
                            @if($post->cover_image)
                                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Image" class="w-10 h-10 rounded object-cover">
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                        </td>
                        <td class="p-2 whitespace-nowrap">
                            @if ($post->is_active)
                                <span class="text-green-600 font-semibold">Actif</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactif</span>
                            @endif
                        </td>
                        <td class="p-2 whitespace-nowrap flex gap-3">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="text-gray-500 hover:text-gray-900" title="Voir">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700" title="Modifier">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette actualité ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.posts.toggleStatus', $post->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($post->is_active)
                                    <button type="submit" class="text-yellow-500 hover:text-yellow-700" title="Désactiver">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                @else
                                    <button type="submit" class="text-green-500 hover:text-green-700" title="Activer">
                                        <i class="fa fa-unlock"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />

<script>
    $(document).ready(function() {
        $('#postsTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            dom: "<'flex flex-col sm:flex-row justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex flex-col sm:flex-row justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
            language: {
                paginate: {
                    first: "<button class='bg-gray-500 text-white px-3 py-1 rounded'><<</button>",
                    last: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>>></button>",
                    next: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>→</button>",
                    previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>←</button>"
                }
            }
        });
    });
</script>
@endsection
