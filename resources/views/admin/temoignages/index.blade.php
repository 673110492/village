@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des temoignages')
@section('pageSubTitle', 'Temoignages / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des temoignages</h2>
            <a href="{{ route('admin.testimonials.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center" aria-label="Ajouter un témoignage">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">
        <div class="overflow-x-auto">
            <table id="temoignagesTable" class="w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
                <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                    <tr>
                        <th class="p-1 text-left">Nom</th>
                        <th class="p-1 text-left">Fonction</th>
                        <th class="p-1 text-left">Photo</th>
                        <th class="p-1 text-left">Statut</th>
                        <th class="p-1 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($temoignages as $temoignage)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <td class="p-1">{{ $temoignage->name }}</td>
                            <td class="p-1">{{ $temoignage->fonction }}</td>
                            <td class="p-1">
                                @if($temoignage->photo)
                                    <img src="{{ asset('storage/' . $temoignage->photo) }}" alt="Photo de {{ $temoignage->name }}" class="w-10 h-10 rounded">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="p-1">
                                @if ($temoignage->is_active)
                                    <span class="text-green-600 font-semibold">Actif</span>
                                @else
                                    <span class="text-red-600 font-semibold">Inactif</span>
                                @endif
                            </td>
                            <td class="p-1 flex gap-3 flex-wrap">
                                <a href="{{ route('admin.testimonials.show', $temoignage->id) }}" class="text-gray-500 hover:text-gray-900" aria-label="Voir le témoignage de {{ $temoignage->name }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.testimonials.edit', $temoignage->id) }}" class="text-blue-500 hover:text-blue-700" aria-label="Modifier le témoignage de {{ $temoignage->name }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <form action="{{ route('admin.testimonials.destroy', $temoignage->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce temoignage ?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" aria-label="Supprimer le témoignage de {{ $temoignage->name }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.testimonials.toggleStatus', $temoignage->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    @if($temoignage->is_active)
                                        <button type="submit" class="text-yellow-500 hover:text-yellow-700" aria-label="Désactiver le témoignage de {{ $temoignage->name }}">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="text-green-500 hover:text-green-700" aria-label="Activer le témoignage de {{ $temoignage->name }}">
                                            <i class="fa fa-unlock" aria-hidden="true"></i>
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
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />

<script>
    $(document).ready(function() {
        $('#temoignagesTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>t<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
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
