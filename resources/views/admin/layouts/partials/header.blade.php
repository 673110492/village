<header class="bg-white text-black p-4 shadow-md fixed top-0 left-0 w-full z-10 mt-0">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold flex items-center space-x-2">
            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-10">
            <span>La Maison du Village</span>
        </h1>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Rechercher..." class="bg-gray-200 text-black rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-black"></i>
            </div>
            <!-- Avatar et Nom de l'utilisateur connecté -->
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                     class="w-8 h-8 rounded-full object-cover border-2 border-blue-400 shadow-md transition-transform transform hover:scale-105">
            @else
                <i class="fas fa-user-circle text-2xl text-gray-600"></i>
            @endif
            <span>{{ Auth::user()->name }}</span>

            <div class="flex space-x-4">
                <!-- Lien vers le profil -->
                <a href="{{ route('admin.profile.index') }}" class="text-sm text-black hover:text-gray-600">
                    <i class="fas fa-user text-sm mr-2"></i> Profil
                </a>

                <!-- Formulaire de déconnexion -->
                <form method="POST" action="{{ route('deconnexion') }}">
                    @csrf
                    <button type="submit" class="text-sm text-black hover:text-gray-600">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<style>
    /* État de survol pour les liens dans l'en-tête */
    .text-black:hover {
        color: #4b5563;
    }
</style>
