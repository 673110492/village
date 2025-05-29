@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des Cultures')
@section('pageSubTitle', 'Cultures / Liste')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3 mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des cultures</h2>
            <a href="{{ url('admin/admin/cultures/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus mr-2"></i> Ajouter
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        <!-- TABLE RESPONSIVE WRAPPER -->
        <div class="overflow-x-auto">
            <table id="culturesTable" class="min-w-full bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
                <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                    <tr>
                        <th class="p-2 text-left">Titre</th>
                        <th class="p-2 text-left">Référence</th>
                        <th class="p-2 text-left">Image</th>
                        <th class="p-2 text-left">Lien YouTube 1</th>
                        <th class="p-2 text-left">Lien YouTube 2</th>
                        <th class="p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($cultures as $culture)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <td class="p-2">{{ $culture->titre }}</td>
                            <td class="p-2">{{ $culture->reference ?? '—' }}</td>
                            <td class="p-2">
                                @if ($culture->image1)
                                    <img src="{{ asset('storage/' . $culture->image1) }}" alt="Image" class="w-12 h-12 object-cover rounded">
                                @else
                                    —
                                @endif
                            </td>
                            <td class="p-2">
                                @if ($culture->lien_youtube1)
                                    <a href="{{ $culture->lien_youtube1 }}" target="_blank" class="text-blue-500 underline">Vidéo 1</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="p-2">
                                @if ($culture->lien_youtube2)
                                    <a href="{{ $culture->lien_youtube2 }}" target="_blank" class="text-blue-500 underline">Vidéo 2</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="p-2 flex flex-wrap gap-2">
                                <a href="{{ route('admin.cultures.show', $culture->id) }}" class="text-gray-500 hover:text-gray-900">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.cultures.edit', $culture->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.cultures.destroy', $culture->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette culture ?');">
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
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.tailwindcss.min.css" />

<script>
    $(document).ready(function () {
        $('#culturesTable').DataTable({
            responsive: true,
            pagingType: "full_numbers",
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                paginate: {
                    first: "<button class='bg-gray-500 text-white px-2 py-1 text-sm rounded'>&laquo;</button>",
                    last: "<button class='bg-gray-500 text-white px-2 py-1 text-sm rounded'>&raquo;</button>",
                    next: "<button class='bg-blue-500 text-white px-2 py-1 text-sm rounded'>&rarr;</button>",
                    previous: "<button class='bg-blue-500 text-white px-2 py-1 text-sm rounded'>&larr;</button>"
                }
            },
            dom: "<'flex flex-col md:flex-row justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex flex-col md:flex-row justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>"
        });
    });
</script>
@endsection
