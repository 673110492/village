@extends('admin.layouts.app')

@section('content')
<div class="mb-8">
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold mb-2">Tableau de bord</h1>
        <p class="text-lg opacity-90">Bienvenue dans votre espace d'administration. Voici un aperçu rapide de vos statistiques.</p>
    </div>
</div>

<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @php
        $cards = [
            ['title' => 'Utilisateurs', 'count' => $user, 'subtitle' => 'Enregistrés', 'icon' => 'fas fa-users', 'color' => 'bg-indigo-600'],
            ['title' => 'Projets', 'count' => $proje, 'subtitle' => 'En cours', 'icon' => 'fas fa-clipboard-list', 'color' => 'bg-purple-600'],
            ['title' => 'Sections À propos', 'count' => $about, 'subtitle' => 'Créées', 'icon' => 'fas fa-info-circle', 'color' => 'bg-pink-600'],
            ['title' => 'Équipe', 'count' => $team, 'subtitle' => 'Membres', 'icon' => 'fas fa-users-cog', 'color' => 'bg-teal-600'],
            ['title' => 'Partenaires', 'count' => $partenaire, 'subtitle' => 'Collaborateurs', 'icon' => 'fas fa-handshake', 'color' => 'bg-green-600'],
            ['title' => 'Événements culturels', 'count' => $cu, 'subtitle' => 'Ajoutés', 'icon' => 'fas fa-music', 'color' => 'bg-yellow-600'],
        ];
    @endphp

    @foreach($cards as $card)
        <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="p-4 rounded-full {{ $card['color'] }} text-white">
                    <i class="{{ $card['icon'] }} text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">{{ $card['title'] }}</h2>
                    <p class="text-3xl font-bold text-gray-900">{{ $card['count'] }}</p>
                    <p class="text-sm text-gray-500">{{ $card['subtitle'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
