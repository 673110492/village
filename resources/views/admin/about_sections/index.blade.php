@extends('admin.layouts.app')
@section('pageTitle', 'Gestion A propos')
@section('pageSubTitle', 'A propos / Liste')
@section('content')
<div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="bg-white shadow-lg rounded-lg p-4 sm:p-6">
        <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
            <h2 class="text-2xl font-semibold text-gray-700">Liste A propos</h2>
            <a href="{{ route('admin.about_sections.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center whitespace-nowrap">
                <i class="fa fa-plus mr-2"></i> Ajouter
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">
        <div class="overflow-x-auto">
            <table id="about_sectionsTable" class="w-full bg-white shadow-md rounded-lg text-gray-700 border border-gray-200 min-w-[600px]">
                <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                    <tr>
                        <th class="p-2 text-left">Nom</th>
                        <th class="p-2 text-left">Image</th>
                        <th class="p-2 text-left">Statut</th>
                        <th class="p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($abouts as $about)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <td class="p-2">{{ $about->slug }}</td>
                            <td class="p-2">
                                @if($about->image)
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="Image" class="w-8 h-8 sm:w-10 sm:h-10 rounded">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="p-2">
                                @if ($about->is_active)
                                    <span class="text-green-600 font-semibold">Actif</span>
                                @else
                                    <span class="text-red-600 font-semibold">Inactif</span>
                                @endif
                            </td>
                            <td class="p-2 flex flex-wrap gap-2 sm:gap-3 justify-start sm:justify-center">
                                <a href="{{ route('admin.about_sections.show', $about->id) }}" class="text-gray-500 hover:text-gray-900" title="Voir">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.about_sections.edit', $about->id) }}" class="text-blue-500 hover:text-blue-700" title="Modifier">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.about_sections.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet element ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.about_sections.toggleStatus', $about->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($about->is_active)
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
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />

<script>
    $(document).ready(function() {
        $('#about_sectionsTable').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pagingType: "full_numbers",
            dom: "<'flex flex-col sm:flex-row justify-between items-center mb-4'<'text-gray-700 mb-2 sm:mb-0'l><'text-gray-700'f>>t<'flex flex-col sm:flex-row justify-between items-center mt-4'<'text-gray-700 mb-2 sm:mb-0'i><'text-gray-700'p>>",
            language: {
                paginate: {
                    first: "<button class='bg-gray-500 text-white px-2 py-1 rounded text-xs sm:px-3 sm:py-1'><<</button>",
                    last: "<button class='bg-gray-500 text-white px-2 py-1 rounded text-xs sm:px-3 sm:py-1'>>></button>",
                    next: "<button class='bg-blue-500 text-white px-2 py-1 rounded text-xs sm:px-3 sm:py-1'>→</button>",
                    previous: "<button class='bg-blue-500 text-white px-2 py-1 rounded text-xs sm:px-3 sm:py-1'>←</button>"
                }
            }
        });
    });
</script>
@endsection
