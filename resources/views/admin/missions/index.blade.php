@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des missions')
@section('pageSubTitle', 'Missions / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 overflow-x-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des missions</h2>
            <a href="{{ route('admin.missions.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">
        <table id="missionsTable" class="min-w-full w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-2 text-left">Titre</th>
                    <th class="p-2 text-left">Statut</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($missions as $mission)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-2">{{ $mission->title }}</td>
                        <td class="p-2">
                            @if ($mission->is_active)
                                <span class="text-green-600 font-semibold">Actif</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactif</span>
                            @endif
                        </td>
                        <td class="p-2 flex gap-3 flex-wrap">
                            <a href="{{ route('admin.missions.show', $mission->id) }}" class="text-gray-500 hover:text-gray-900" title="Voir détails">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.missions.edit', $mission->id) }}" class="text-blue-500 hover:text-blue-700" title="Modifier">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.missions.destroy', $mission->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.missions.toggleStatus', $mission->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                @if($mission->is_active)
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
        $('#missionsTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            dom: "<'flex flex-col sm:flex-row justify-between items-center mb-4 gap-2'<'text-gray-700'l><'text-gray-700'f>>" +
                 "t" +
                 "<'flex flex-col sm:flex-row justify-between items-center mt-4 gap-2'<'text-gray-700'i><'text-gray-700'p>>",
            language: {
                paginate: {
                    first: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>&lt;&lt;</button>",
                    last: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>&gt;&gt;</button>",
                    next: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>&rarr;</button>",
                    previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>&larr;</button>"
                }
            }
        });
    });
</script>
@endsection
