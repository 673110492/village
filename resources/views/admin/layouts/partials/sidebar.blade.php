<aside class="w-72 bg-gray-800 text-white fixed top-[60px] left-0 h-[calc(100vh-60px)] overflow-y-auto p-3">
    <nav>
        <ul>
            <li><a href="#" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a></li>
            <li><a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-users mr-2"></i> Utilisateurs
            </a></li>
            <li><a href="{{ route('admin.services.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-cogs mr-2"></i> Services
            </a></li>
            <li><a href="{{ route('admin.projects.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-briefcase mr-2"></i> Projets
            </a></li>
            <li><a href="{{ route('admin.cultures.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-drum mr-2"></i> Danse traditionnelle
            </a></li>
            <li><a href="{{ route('admin.testimonials.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-quote-left mr-2"></i> Témoignages
            </a></li>
            <li><a href="{{ route('admin.teams.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-users mr-2"></i> Équipe
            </a></li>
            <li><a href="{{ route('admin.partners.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-handshake mr-2"></i> Partenaires
            </a></li>
            <li><a href="{{ route('admin.about_sections.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-book-open mr-2"></i> À propos
            </a></li>
            <li><a href="{{ route('admin.values.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-scale-balanced mr-2"></i> Valeurs
            </a></li>
            <li><a href="{{ route('admin.missions.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-bullseye mr-2"></i> Missions
            </a></li>
            <li><a href="{{ route('admin.posts.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-newspaper mr-2"></i> Actualités
            </a></li>
            <li><a href="{{ route('admin.settings.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-cog mr-2"></i> Paramètres
            </a></li>
            <li><a href="{{ route('chat.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-comments mr-2"></i> Chat
            </a></li>
        </ul>
    </nav>
</aside>
