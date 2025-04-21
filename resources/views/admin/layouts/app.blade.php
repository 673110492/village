<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Segui Group</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- DataTables CSS (via CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">

</head>
<body class="bg-gray-100">
    <!-- Header -->
    @include('admin.layouts.partials.header')

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.layouts.partials.sidebar')

        <!-- Contenu principal -->
        <div class="flex-1 ml-48 mt-16 p-6">
        @if(View::hasSection('pageTitle'))
        <div class="mb-6">
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-blue-500">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">@yield('pageTitle')</h1>

                @hasSection('pageSubTitle')
                            <div class="mb-4 text-sm text-blue-600">
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Tableau de bord</a> /
                    <span>@yield('pageSubTitle')</span>
                </div>
                @endif
            </div>
        </div>
    @endif
            @yield('content')

            <!-- Footer -->
            @include('admin.layouts.partials.footer')
        </div>
    </div>

   <!-- jQuery (via CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS (via CDN) -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- Initialisation de DataTables -->
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            responsive: true, // Rendre le tableau responsive
            paging: true, // Pagination activée
            searching: true, // Recherche activée
            lengthChange: true, // Nombre de lignes par page modifiable
            pageLength: 10, // Nombre de lignes par page
            language: {
                paginate: {
                    previous: 'Précédent',
                    next: 'Suivant'
                },
                search: 'Rechercher:',
                lengthMenu: 'Afficher _MENU_ utilisateurs par page',
                info: 'Affichage de _START_ à _END_ sur _TOTAL_ utilisateurs'
            }
        });
    });
</script>
 
</body>
</html>
