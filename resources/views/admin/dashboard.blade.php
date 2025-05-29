@extends('admin.layouts.app')

@section('content')
<div class="mb-12">
    <div class="bg-white border-l-8 border-yellow-500 p-8 rounded-2xl shadow-xl">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-2">Tableau de bord - Maison du Village</h1>
        <p class="text-lg text-gray-600 leading-relaxed">
            Bienvenue dans l’espace d’administration de <span class="text-yellow-600 font-semibold">la Maison du Village</span>. 
            Ici, vous avez une vue d’ensemble sur les activités culturelles, les projets en cours, 
            les membres de l’équipe, et bien plus encore.
        </p>
        <p class="mt-2 text-sm text-gray-500 italic">
            « Préserver nos traditions, bâtir notre avenir. »
        </p>
    </div>
</div>

<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
    @php
        $cards = [
            ['title' => 'Utilisateurs', 'count' => $user, 'subtitle' => 'Membres enregistrés', 'icon' => 'fas fa-users', 'color' => 'bg-indigo-600'],
            ['title' => 'Projets', 'count' => $proje, 'subtitle' => 'Initiatives en cours', 'icon' => 'fas fa-clipboard-list', 'color' => 'bg-purple-600'],
            ['title' => 'À propos', 'count' => $about, 'subtitle' => 'Sections disponibles', 'icon' => 'fas fa-info-circle', 'color' => 'bg-pink-600'],
            ['title' => 'Équipe', 'count' => $team, 'subtitle' => 'Membres actifs', 'icon' => 'fas fa-users-cog', 'color' => 'bg-teal-600'],
            ['title' => 'Partenaires', 'count' => $partenaire, 'subtitle' => 'Alliances locales', 'icon' => 'fas fa-handshake', 'color' => 'bg-green-600'],
            ['title' => 'Culture & Événements', 'count' => $cu, 'subtitle' => 'Événements recensés', 'icon' => 'fas fa-drum', 'color' => 'bg-yellow-600'],
        ];
    @endphp

    @foreach($cards as $card)
        <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-2xl transition duration-300 transform hover:scale-105">
            <div class="flex items-center space-x-4">
                <div class="p-4 rounded-full {{ $card['color'] }} text-white shadow-md">
                    <i class="{{ $card['icon'] }} text-3xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-700">{{ $card['title'] }}</h2>
                    <p class="text-4xl font-extrabold text-gray-900">{{ $card['count'] }}</p>
                    <p class="text-sm text-gray-500">{{ $card['subtitle'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-16 text-center text-gray-600 text-sm italic">
    © {{ date('Y') }} Maison du Village — Tous droits réservés. <br>
    Une plateforme dédiée à la valorisation de notre patrimoine culturel.
</div>
@endsection
