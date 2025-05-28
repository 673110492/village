@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des projets')
@section('pageSubTitle', 'Projet / Liste')
@section('content')
<div class="container mx-auto p-4">
  <div class="bg-white shadow-lg rounded-lg p-4 md:p-6">

    <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-3">
      <h2 class="text-xl md:text-2xl font-semibold text-gray-700">Liste des projets</h2>
      <a href="{{ route('admin.projects.create') }}"
         class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center w-full md:w-auto justify-center md:justify-start">
         <i class="fa fa-plus mr-2"></i> Ajouter
      </a>
    </div>

    <hr class="border-t-3 border-blue-500 mb-4">

    <div class="overflow-x-auto">
      <table id="projectsTable" class="w-full mt-4 bg-white shadow-md rounded-lg text-gray-700 border border-gray-200">
        <thead class="text-gray-600 text-xs md:text-sm uppercase border-b border-gray-300">
          <tr>
            <th class="p-1 md:p-2 text-left">Nom</th>
            <th class="p-1 md:p-2 text-left">Image</th>
            <th class="p-1 md:p-2 text-left">Statut</th>
            <th class="p-1 md:p-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-xs md:text-sm">
          @foreach ($projects as $project)
          <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
            <td class="p-1 md:p-2 break-words max-w-xs">{{ $project->slug }}</td>
            <td class="p-1 md:p-2">
              @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="Image" class="w-10 h-10 rounded object-cover">
              @else
                N/A
              @endif
            </td>
            <td class="p-1 md:p-2">
              @if ($project->is_active)
                <span class="text-green-600 font-semibold">Actif</span>
              @else
                <span class="text-red-600 font-semibold">Inactif</span>
              @endif
            </td>
            <td class="p-1 md:p-2 flex gap-2 md:gap-3 text-lg md:text-base">
              <a href="{{ route('admin.projects.show', $project->id) }}" class="text-gray-500 hover:text-gray-900" aria-label="Voir">
                <i class="fa fa-eye"></i>
              </a>
              <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-blue-500 hover:text-blue-700" aria-label="Modifier">
                <i class="fa fa-pencil"></i>
              </a>
              <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce projet ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700" aria-label="Supprimer">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
              <form action="{{ route('admin.projects.toggleStatus', $project->id) }}" method="POST">
                @csrf
                @method('PATCH')
                @if($project->is_active)
                  <button type="submit" class="text-yellow-500 hover:text-yellow-700" aria-label="Désactiver">
                    <i class="fa fa-lock"></i>
                  </button>
                @else
                  <button type="submit" class="text-green-500 hover:text-green-700" aria-label="Activer">
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
    $('#projectsTable').DataTable({
      responsive: true,
      pagingType: 'simple_numbers',  // Affiche Précédent, numéros, Suivant
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        paginate: {
          previous: "<button class='bg-blue-500 text-white px-3 py-1 rounded' aria-label='Page précédente'>&larr;</button>",
          next: "<button class='bg-blue-500 text-white px-3 py-1 rounded' aria-label='Page suivante'>&rarr;</button>"
        }
      },
      dom: "<'flex flex-col sm:flex-row justify-between items-center mb-4 gap-2'<'text-gray-700'l><'text-gray-700'f>>" +
           "t" +
           "<'flex flex-col sm:flex-row justify-center items-center mt-4 gap-2'<'text-gray-700'i><'pagination-container'p>>",
      // Limiter l'affichage des numéros à 1 pour éviter trop de boutons sur mobile
      lengthMenu: [5, 10, 25], // personnalisation si besoin
      pageLength: 5,
      drawCallback: function () {
        // Ajoute classe flex & centrage à la pagination
        $('.dataTables_paginate').addClass('flex space-x-2 justify-center');
        // Cacher les numéros de page sauf le courant sur mobile
        if(window.innerWidth < 640) {
          $('.dataTables_paginate .paginate_button').not('.current, .previous, .next').hide();
        } else {
          $('.dataTables_paginate .paginate_button').show();
        }
      }
    });

    // Au redimensionnement de la fenêtre, refaire le draw pour appliquer le cache
    $(window).on('resize', function () {
      $('#projectsTable').DataTable().draw(false);
    });
  });
</script>
@endsection
