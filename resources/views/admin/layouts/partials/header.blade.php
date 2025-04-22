<header class="bg-blue-900 text-white p-4 shadow-md fixed top-0 left-0 w-full z-10 mt-0">
    <div class="flex justify-between items-center">
    <h1 class="text-xl font-semibold flex items-center space-x-2">
    <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-10">
    <span>Segui Admin</span>
    </h1>
    <div class="relative">
                <button class="flex items-center space-x-2" id="userMenuButton">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>Admin</span>
            </button>

            <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white text-black shadow-md rounded-md hidden">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                    <i class="fas fa-user text-sm mr-2"></i> Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>



<script>
    // Script pour afficher/masquer le dropdown
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    userMenuButton.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', (e) => {
        if (!userMenuButton.contains(e.target)) {
            userMenu.classList.add('hidden');
        }
    });
</script>
