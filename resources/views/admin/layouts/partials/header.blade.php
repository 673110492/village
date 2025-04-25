<header class="bg-blue-900 text-white p-4 shadow-md fixed top-0 left-0 w-full z-10 mt-0">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold flex items-center space-x-2">
            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-10">
            <span>La Maison du Village</span>
        </h1>
        <div class="relative">
            <button class="flex items-center space-x-2 py-2 px-4 rounded-md hover:bg-blue-700 transition-all" id="userMenuButton">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                         class="w-8 h-8 rounded-full object-cover border-2 border-blue-400 shadow-md transition-transform transform hover:scale-105">
                @else
                    <i class="fas fa-user-circle text-2xl text-gray-600"></i>
                @endif
                <span>{{ Auth::user()->name }}</span>
            </button>

            <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white text-black shadow-xl rounded-md opacity-0 pointer-events-none transition-all duration-300 transform scale-95">
                <div class="py-2">
                    <a href="{{ route('admin.profile.index') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-md text-sm">
                        <i class="fas fa-user text-sm mr-2"></i> Profil
                    </a>
                    <form method="POST" action="{{ route('deconnexion') }}">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-all">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Script pour afficher/masquer le menu déroulant avec animation
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    userMenuButton.addEventListener('click', (e) => {
        e.stopPropagation(); // Empêcher de fermer le menu immédiatement quand on clique dessus
        userMenu.classList.toggle('opacity-100');
        userMenu.classList.toggle('scale-100');
        userMenu.classList.toggle('pointer-events-auto');
        userMenu.classList.toggle('opacity-0');
        userMenu.classList.toggle('scale-95');
    });

    // Fermer le menu si l'utilisateur clique en dehors du menu
    window.addEventListener('click', (e) => {
        if (!userMenuButton.contains(e.target)) {
            userMenu.classList.add('opacity-0');
            userMenu.classList.add('scale-95');
            userMenu.classList.remove('opacity-100');
            userMenu.classList.remove('scale-100');
            userMenu.classList.remove('pointer-events-auto');
        }
    });
</script>

<style>
    /* Animation pour la transition du menu déroulant */
    #userMenu {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
</style>
