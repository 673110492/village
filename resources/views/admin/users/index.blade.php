@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des utilisateurs')
@section('pageSubTitle', 'Utilisateurs / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des utilisateurs</h2>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">
        <table id="operatorsTable" class="w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
    <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
        <tr>
            <th class="p-1 text-left">Nom</th>
            <th class="p-1 text-left">Email</th>
            <th class="p-1 text-left">Téléphone</th>
            <th class="p-1 text-left">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm">
        @foreach ($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                <td class="p-1">{{ $user->name }}</td>
                <td class="p-1">{{ $user->email }}</td>
                <td class="p-1">{{ $user->phone ?? 'N/A' }}</td>
                <td class="p-1 flex gap-3">
                <a href="{{ route('admin.users.show', $user->id) }}" class="text-gray-500 hover:text-gray-900">
                <i class="fa fa-eye"></i> <!-- Icône pour voir les détails -->
                </a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                    <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet administrateur ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <i class="fa fa-trash"></i>
                        </button>
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
        $('#operatorsTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "pagingType": "full_numbers",
            "dom": "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
            "language": {
                "paginate": {
                    "first": "<button class='bg-gray-500 text-white px-3 py-1 rounded'><<</button>",
                    "last": "<button class='bg-gray-500 text-white px-3 py-1 rounded'>>></button>",
                    "next": "<button class='bg-blue-500 text-white px-3 py-1 rounded'>→</button>",
                    "previous": "<button class='bg-blue-500 text-white px-3 py-1 rounded'>←</button>"
                }
            }
        });
    });
</script>
@endsection
