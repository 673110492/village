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

</head>
<body class="bg-gray-100">
    <!-- Header -->
    @include('admin.layouts.partials.header')

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.layouts.partials.sidebar')

        <!-- Contenu principal -->
        <div class="flex-1 ml-48 mt-16 p-6">
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
