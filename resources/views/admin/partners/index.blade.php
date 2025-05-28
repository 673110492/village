@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des Partenaires')
@section('pageSubTitle', 'Partenaires / Liste')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto"> {{-- Ajout overflow-x-auto pour scroll horizontal sur petits écrans --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des partenaires</h2>
            <a href="{{ route('admin.partners.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
                <span class="ml-2 hidden sm:inline">Ajouter</span> {{-- Masquer texte sur tout petit écran --}}
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        <table id="partnersTable" class="min-w-full table-auto bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-xs sm:text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-2 text-left">Nom</th>
                    <th class="p-2 text-left">Logo</th>
                    <th class="p-2 text-left hidden sm:table-cell">URL</th> {{-- Cacher URL sur très petit écran --}}
                    <th class="p-2 text-left">Statut</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-xs sm:text-sm">
                @foreach ($partners as $partner)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-2 whitespace-nowrap">{{ $partner->name }}</td>
                        <td class="p-2">
                            @if($partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="w-10 h-10 rounded object-contain">
                            @else
                                <span class="text-gray-400">N/A</span>
                            @endif
                        </td>
                        <td class="p-2 hidden sm:table-cell max-w-xs truncate">
                            @if ($partner->url)
                                <a href="{{ $partner->url }}" target="_blank" class="text-blue-600 underline break-all">{{ $partner->url }}</a>
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                        </td>
                        <td class="p-2 whitespace-nowrap">
                            @if ($partner->is_active)
                                <span class="text-green-600 font-semibold">Actif</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactif</span>
                            @endif
                        </td>
                        <td class="p-2 flex gap-3 whitespace-nowrap">
                            <a href="{{ route('admin.partners.show', $partner->id) }}" class="text-gray-500 hover:text-gray-900" title="Voir">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="text-blue-500 hover:text-blue-700" title="Modifier">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce partenaire ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.partners.toggleStatus', $partner->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($partner->is_active)
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
        $('#partnersTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            dom: "<'flex flex-col md:flex-row justify-between items-center mb-4 gap-4'<'text-gray-700'l><'text-gray-700'f>>" +
                 "t" +
                 "<'flex flex-col md:flex-row justify-between items-center mt-4 gap-4'<'text-gray-700'i><'text-gray-700'p>>",
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
