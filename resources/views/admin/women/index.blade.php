@extends('admin.layouts.app')

@section('pageTitle', 'Gestion des valeurs')
@section('pageSubTitle', 'Valeurs / Liste')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des valeurs</h2>
            <a href="{{ route('admin.women.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        <table id="womenTable" class="w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
            <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                <tr>
                    <th class="p-2 text-left">Titre</th>
                    <th class="p-2 text-left">Statut</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($womenValues as $value)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-2">{{ $value->title }}</td>
                        <td class="p-2">
                            @if ($value->status === 'activé')
                                <span class="text-green-600 font-semibold">Activé</span>
                            @else
                                <span class="text-red-600 font-semibold">Désactivé</span>
                            @endif
                        </td>
                        <td class="p-2 flex gap-3">
                            <a href="{{ route('admin.women.show', $value->id) }}" class="text-gray-500 hover:text-gray-900">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('admin.women.edit', $value->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <form action="{{ route('admin.women.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette valeur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                            <form action="{{ route('admin.women.toggleStatus', $value->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($value->status === 'activé')
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
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />

<script>
    $(document).ready(function() {
        $('#womenTable').DataTable({
            responsive: true,
            pagingType: "full_numbers",
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                paginate: {
                    first: "<button class='bg-gray-500 text-white px-3 py-1 rounded'><<</button>",
                    last: "<button class='bg-gray-500 text-white px-3 py-1 rounded'>>></button>",
                    next: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>→</button>",
                    previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded'>←</button>"
                }
            },
            dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>"
        });
    });
</script>
@endsection
