@extends('admin.layouts.app')

@section('content')
    <div class="bg-blue-900 text-white p-6 rounded-lg shadow-md mb-6">
        <h1 class="text-3xl font-bold">Tableau de bord</h1>
        <p class="text-lg">Bienvenue dans votre tableau de bord, où vous pouvez suivre vos statistiques clés.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
        <!-- Carte Utilisateurs -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-users text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Utilisateurs</h2>
            <p class="text-4xl font-bold text-blue-900">123</p>
            <p class="text-lg text-gray-500">Utilisateurs enregistrés</p>
        </div>

        <!-- Carte Projets -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-clipboard-list text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Projets</h2>
            <p class="text-4xl font-bold text-blue-900">45</p>
            <p class="text-lg text-gray-500">Projets en cours</p>
        </div>

        <!-- Carte Services -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-cogs text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Services</h2>
            <p class="text-4xl font-bold text-blue-900">6</p>
            <p class="text-lg text-gray-500">Services disponibles</p>
        </div>

        <!-- Carte Visites -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-eye text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Visites</h2>
            <p class="text-4xl font-bold text-blue-900">432</p>
            <p class="text-lg text-gray-500">Visites du site</p>
        </div>

        <!-- Carte Revenus -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-dollar-sign text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Revenus</h2>
            <p class="text-4xl font-bold text-blue-900">$12,340</p>
            <p class="text-lg text-gray-500">Revenus générés</p>
        </div>

        <!-- Carte Nouvelles Commandes -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between transition-transform transform hover:scale-105">
            <div class="bg-blue-900 p-4 rounded-full mb-4">
                <i class="fas fa-box text-4xl text-white"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700">Commandes</h2>
            <p class="text-4xl font-bold text-blue-900">89</p>
            <p class="text-lg text-gray-500">Nouvelles commandes</p>
        </div>
    </div>
@endsection

<style>
    /* Animations pour les cartes */
    .transition-transform {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover\:scale-105:hover {
        transform: scale(1.05);
    }

    .shadow-md {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .bg-blue-900 {
        background-color: #1E3A8A;
    }
</style>
