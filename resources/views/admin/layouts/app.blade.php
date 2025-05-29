<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        .iti {
            width: 100%;
        }

        .iti input {
            width: 100%;
        }

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

        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Important pour empêcher le débordement horizontal dans le contenu */
        main {
            min-width: 0;
            overflow-x: hidden;
        }

        @media (max-width: 768px) {
            body {
                overflow-x: hidden;
            }
        }
    </style>
</head>

<body id="body" class="light bg-gray-50 text-gray-900">

  <!-- Bouton menu mobile -->
  <button
    class="md:hidden fixed top-4 left-4 z-50 p-2 rounded bg-blue-600 text-white"
    onclick="toggleSidebar()"
    aria-label="Toggle Sidebar"
  >
    <i class="fas fa-bars"></i>
  </button>

  {{-- Header --}}
  @include('admin.layouts.partials.header')

  <div class="flex flex-col md:flex-row min-h-screen w-full">

    <!-- Sidebar responsive -->
    <aside
      id="sidebar"
      class="fixed top-16 left-0 h-[calc(100vh-4rem)] w-72 bg-white shadow-lg z-40 overflow-auto
             transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out"
    >
      @include('admin.layouts.partials.sidebar')
    </aside>

    <!-- Main content -->
    <main class="flex-1 mt-16 p-4 md:ml-72 transition-all duration-300 ease-in-out">
      <div class="max-w-5xl mx-auto">
        @if (View::hasSection('pageTitle'))
          <div class="mb-6">
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-blue-500">
              <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2 break-words">
                @yield('pageTitle')
              </h1>

              @hasSection('pageSubTitle')
                <div class="mb-4 text-sm text-blue-600">
                  <a href="{{ route('admin.dashboard') }}" class="hover:underline">Tableau de bord</a> /
                  <span>@yield('pageSubTitle')</span>
                </div>
              @endif
            </div>
          </div>
        @endif

        <div>
          @yield('content')
        </div>

        @include('admin.layouts.partials.footer')
      </div>
    </main>
  </div>

  <!-- Bouton de changement de thème -->
  <div
    class="theme-toggle-btn fixed bottom-5 right-5 bg-green-700 text-white p-4 rounded-full shadow-lg cursor-pointer flex items-center justify-center transition-colors duration-300"
    id="themeToggle"
    role="button"
    aria-pressed="false"
    tabindex="0"
    title="Changer le thème"
  >
    <i class="fas fa-adjust"></i>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script>
    // DataTable initialization
    $(document).ready(function () {
      $('#usersTable').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        lengthChange: true,
        pageLength: 10,
        language: {
          paginate: {
            previous: 'Précédent',
            next: 'Suivant',
          },
          search: 'Rechercher:',
          lengthMenu: 'Afficher _MENU_ utilisateurs par page',
          info: 'Affichage de _START_ à _END_ sur _TOTAL_ utilisateurs',
        },
      });
    });

    const themeToggleButton = document.getElementById('themeToggle');
    const body = document.getElementById('body');

    if (localStorage.getItem('theme')) {
      body.className = localStorage.getItem('theme');
    }

    themeToggleButton.addEventListener('click', () => {
      if (body.classList.contains('light')) {
        body.classList.replace('light', 'dark');
        localStorage.setItem('theme', 'dark');
        themeToggleButton.setAttribute('aria-pressed', 'true');
      } else if (body.classList.contains('dark')) {
        body.classList.replace('dark', 'blue');
        localStorage.setItem('theme', 'blue');
      } else if (body.classList.contains('blue')) {
        body.classList.replace('blue', 'green');
        localStorage.setItem('theme', 'green');
      } else {
        body.classList.replace('green', 'light');
        localStorage.setItem('theme', 'light');
        themeToggleButton.setAttribute('aria-pressed', 'false');
      }
    });

    // Toggle Sidebar mobile avec animation slide
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('-translate-x-full');
    }
  </script>
</body>


</html>
