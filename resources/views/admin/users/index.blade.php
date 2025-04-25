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
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button type="button" class="text-red-500 hover:text-red-700" onclick="openDeleteModal({{ $user->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de confirmation -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-6 animate-fade-in-up relative">
        <div class="flex items-center gap-4 mb-4">
            <div class="bg-red-100 text-red-600 rounded-full p-3">
                <i class="fa fa-exclamation-triangle text-xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">Confirmation de suppression</h2>
        </div>
        <p class="text-gray-600 mb-6">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
        <div class="flex justify-end gap-4">
            <button onclick="closeDeleteModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">
                Annuler
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Styles pour animation -->
<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.3s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

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
            pagingType: "full_numbers",
            dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
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

    function openDeleteModal(userId) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/users/${userId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection
