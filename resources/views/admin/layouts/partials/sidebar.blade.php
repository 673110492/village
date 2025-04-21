<aside class="w-48 bg-gray-800 text-white min-h-screen fixed top-12 left-0 p-4 mt-0">
    <nav>
        <ul>
            <li><a href="#" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a></li>
            <li><a href="{{route('admin.users.index')}}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-users mr-2"></i> Utilisateurs
            </a></li>
            <li><a href="{{route('admin.services.index')}}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-cogs mr-2"></i> Services
            </a></li>
            <li><a href="{{route('admin.projects.index')}}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-briefcase mr-2"></i> Projets
            </a></li>
            <li><a href="{{route('admin.testimonials.index')}}" class="block py-2 px-4 hover:bg-blue-700">
                <i class="fas fa-briefcase mr-2"></i> Temoignages
            </a></li>
        </ul>
    </nav>
</aside>
