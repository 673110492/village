@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des services')
@section('pageSubTitle', 'Services / Liste')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">Liste des services</h2>
            <a href="{{ route('admin.services.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <hr class="border-t-3 border-blue-500 mb-4">

        <!-- Scroll horizontal sur petit écran -->
        <div class="overflow-x-auto">
            <table id="servicesTable" class="min-w-[600px] w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
                <thead class="text-gray-600 text-sm uppercase border-b border-gray-300">
                    <tr>
                        <th class="p-1 text-left">Nom</th>
                        <th class="p-1 text-left">Image</th>
                        <th class="p-1 text-left">Statut</th>
                        <th class="p-1 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($services as $service)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                        <td class="p-1">{{ $service->slug }}</td>
                        <td class="p-1">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Image" class="w-10 h-10 rounded object-cover">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="p-1">
                            @if ($service->is_active)
                                <span class="text-green-600 font-semibold">Actif</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactif</span>
                            @endif
                        </td>
                        <td class="p-1 flex gap-3">
                            <a href="{{ route('admin.services.show', $service->id) }}" class="text-gray-500 hover:text-gray-900" title="Voir">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="text-blue-500 hover:text-blue-700" title="Modifier">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                            <form action="{{ route('admin.services.toggleStatus', $service->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if($service->is_active)
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

<style>
  /* Pagination responsive : sur petit écran */
  @media (max-width: 640px) {
    /* Réduire padding et taille des boutons */
    .dataTables_wrapper .dataTables_paginate button {
      padding: 0.25rem 0.5rem !important;
      font-size: 0.75rem !important;
      min-width: 1.5rem;
    }
    /* Cacher premier et dernier */
    .dataTables_wrapper .dataTables_paginate button.first,
    .dataTables_wrapper .dataTables_paginate button.last {
      display: none !important;
    }
    /* Cacher certains numéros de page pour simplifier (optionnel) */
    .dataTables_wrapper .dataTables_paginate button:not(.previous):not(.next):not(.current) {
      display: none !important;
    }
    /* Afficher uniquement précédent, page courante, suivant */
    .dataTables_wrapper .dataTables_paginate button.current {
      font-weight: bold;
      text-decoration: underline;
    }
  }
</style>

<script>
    $(document).ready(function() {
        $('#servicesTable').DataTable({
            responsive: true,
            pagingType: "full_numbers",
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
                paginate: {
                    first: "<<",
                    last: ">>",
                    next: "→",
                    previous: "←"
                }
            },
            dom: "<'flex justify-between items-center mb-4'<'text-gray-700'l><'text-gray-700'f>>" +
                 "t" +
                 "<'flex justify-between items-center mt-4'<'text-gray-700'i><'text-gray-700'p>>",
            drawCallback: function(settings) {
                // Ajout des classes utiles pour CSS personnalisé
                $('.dataTables_paginate button:first-child').addClass('first');
                $('.dataTables_paginate button:last-child').addClass('last');
                $('.dataTables_paginate button.previous').addClass('previous');
                $('.dataTables_paginate button.next').addClass('next');
            }
        });
    });
</script>
@endsection
