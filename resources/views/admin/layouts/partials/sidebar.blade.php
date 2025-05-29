<aside class="w-72 bg-white border-r border-gray-200 text-gray-800 fixed top-[60px] left-0 h-[calc(100vh-60px)] overflow-y-auto shadow-sm z-50">
    <nav class="p-4">
        <ul class="space-y-1 text-[15px] font-medium">
            @php
                $links = [
                    ['label' => 'Dashboard', 'route' => url('admin/dashboard'), 'icon' => 'fas fa-tachometer-alt'],
                    ['label' => 'Utilisateurs', 'route' => route('admin.users.index'), 'icon' => 'fas fa-users'],
                    ['label' => 'Services', 'route' => route('admin.services.index'), 'icon' => 'fas fa-cogs'],
                    ['label' => 'Projets', 'route' => route('admin.projects.index'), 'icon' => 'fas fa-briefcase'],
                    ['label' => 'Danse traditionnelle', 'route' => route('admin.cultures.index'), 'icon' => 'fas fa-drum'],
                    ['label' => 'Témoignages', 'route' => route('admin.testimonials.index'), 'icon' => 'fas fa-quote-left'],
                    ['label' => 'Équipe', 'route' => route('admin.teams.index'), 'icon' => 'fas fa-users-cog'],
                    ['label' => 'Partenaires', 'route' => route('admin.partners.index'), 'icon' => 'fas fa-handshake'],
                    ['label' => 'À propos', 'route' => route('admin.about_sections.index'), 'icon' => 'fas fa-book-open'],
                    ['label' => 'Valeurs', 'route' => route('admin.values.index'), 'icon' => 'fas fa-scale-balanced'],
                    ['label' => 'Missions', 'route' => route('admin.missions.index'), 'icon' => 'fas fa-bullseye'],
                    ['label' => 'Actualités', 'route' => route('admin.posts.index'), 'icon' => 'fas fa-newspaper'],
                    ['label' => 'Paramètres', 'route' => route('admin.settings.index'), 'icon' => 'fas fa-cog'],
                    ['label' => 'Chat', 'route' => route('chat.index'), 'icon' => 'fas fa-comments'],
                ];
            @endphp

            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}" 
                       class="flex items-center px-4 py-3 rounded-xl {{ request()->url() == $link['route'] ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100 hover:text-blue-600' }} transition-all duration-150">
                        <i class="{{ $link['icon'] }} mr-3 text-[17px]"></i>
                        <span>{{ $link['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
