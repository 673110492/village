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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <style>
    .iti {
        width: 100%;
    }

    .iti input {
        width: 100%;
    }

    /* Exemple de style pour les thèmes */
    body.light {
        background-color: #f9f9f9;
        color: #333;
    }

    body.dark {
        background-color: #1a202c;
        color: white;
    }

    body.blue {
        background-color: #e0f7fa;
        color: #00796b;
    }

    body.green {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .theme-toggle-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #00796b;
        color: white;
        padding: 15px;
        border-radius: 50%;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s;
    }

    .theme-toggle-btn:hover {
        background-color: #004d40;
    }

    /* Animation pour une transition fluide */
    body {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    </style>
</head>
<body id="body" class="light"> <!-- Par défaut, le thème clair est appliqué -->

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

    <!-- Bouton de gestion du thème -->
    <div class="theme-toggle-btn" id="themeToggle">
        <i class="fas fa-adjust"></i> <!-- Icône d'ajustement -->
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

        // Fonction pour changer le thème
        const themeToggleButton = document.getElementById('themeToggle');
        const body = document.getElementById('body');

        // Charger le thème depuis localStorage
        if(localStorage.getItem('theme')) {
            body.className = localStorage.getItem('theme');
        }

        // Changer le thème au clic sur le bouton
        themeToggleButton.addEventListener('click', () => {
            // Basculer entre les thèmes
            if(body.classList.contains('light')) {
                body.classList.remove('light');
                body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else if(body.classList.contains('dark')) {
                body.classList.remove('dark');
                body.classList.add('blue');
                localStorage.setItem('theme', 'blue');
            } else if(body.classList.contains('blue')) {
                body.classList.remove('blue');
                body.classList.add('green');
                localStorage.setItem('theme', 'green');
            } else if(body.classList.contains('green')) {
                body.classList.remove('green');
                body.classList.add('light');
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>
