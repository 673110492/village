@extends('admin.layouts.app')
@section('pageTitle', 'Gestion de l Équipe')
@section('pageSubTitle', 'Équipes / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto"> <!-- Ajout overflow-x-auto pour scroll sur mobile -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des membres</h2>
            <a href="{{ route('admin.teams.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">
        <table id="teamsTable" class="w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-1 text-left">Nom</th>
                    <th class="p-1 text-left">Fonction</th>
                    <th class="p-1 text-left">Image</th>
                    <th class="p-1 text-left">Statut</th>
                    <th class="p-1 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($teams as $team)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-1">{{ $team->name }}</td>
                        <td class="p-1">{{ $team->fonction }}</td>
                        <td class="p-1">
                            @if($team->image)
                                <img src="{{ asset('storage/' . $team->image) }}" alt="Image" class="w-10 h-10 rounded">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="p-1">
                            @if ($team->is_active)
                                <span class="text-green-600 font-semibold">Actif</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactif</span>
                            @endif
                        </td>
                        <td class="p-1 flex gap-3">
                            <a href="{{ route('admin.teams.show', $team->id) }}" class="text-gray-500 hover:text-gray-900">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.teams.edit', $team->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce membre ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.teams.toggleStatus', $team->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($team->is_active)
                                    <button type="submit" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                @else
                                    <button type="submit" class="text-green-500 hover:text-green-700">
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
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />

<script>
    $(document).ready(function() {
        function getPaginationSettings() {
            if(window.innerWidth <= 768) {
                return {
                    pagingType: 'simple', // pagination avec juste previous et next
                    responsive: true,
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                        paginate: {
                            previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>←</button>",
                            next: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>→</button>"
                        }
                    },
                    dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
                };
            } else {
                return {
                    pagingType: 'full_numbers', // pagination complète sur desktop
                    responsive: true,
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                        paginate: {
                            first: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>&lt;&lt;</button>",
                            last: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>&gt;&gt;</button>",
                            next: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>→</button>",
                            previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>←</button>"
                        }
                    },
                    dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
                };
            }
        }

        var table = $('#teamsTable').DataTable(getPaginationSettings());

        // Ajouter flag isMobile pour ne recréer la table que si changement de mode
        table.isMobile = window.innerWidth <= 768;

        $(window).on('resize', function() {
            var isMobile = window.innerWidth <= 768;
            if (table.isMobile !== isMobile) {
                table.destroy();
                table = $('#teamsTable').DataTable(getPaginationSettings());
                table.isMobile = isMobile;
            }
        });
    });
</script>
@endsection
