@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des utilisateurs')
@section('pageSubTitle', 'Utilisateurs / Ajout')
@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.users.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des utilisateurs
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            Créer un nouvel utilisateur
        </h2>
        <hr class="border-t-3 border-blue-500 mb-4">

        <!-- Formulaire -->
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Téléphone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                <input type="text" name="phone" id="phone"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Adresse -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                <input type="text" name="address" id="address"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>

            <!-- Bouton Enregistrer avec grand espace -->
            <div class="pt-5 flex justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

