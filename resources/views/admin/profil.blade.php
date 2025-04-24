@extends('admin.layouts.app')

@section('pageTitle', 'Mon Profil')
@section('pageSubTitle', 'Profil / Gestion')

@section('content')
<div class="p-6 md:p-10">
    <div class="bg-white rounded-2xl shadow-md p-6 max-w-5xl mx-auto">

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            <i class="fas fa-user-circle text-blue-600 text-2xl"></i> Mon Profil
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-triangle mr-1"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Profil Résumé -->
        <div class="flex items-center gap-6 mb-8">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-blue-500 shadow">
            @else
                <i class="fas fa-user-circle text-6xl text-gray-400 border-4 border-blue-500 rounded-full p-2"></i>
            @endif
            <div>
                <p class="text-xl font-semibold text-gray-800"><i class="fas fa-id-badge mr-2 text-blue-600"></i>{{ Auth::user()->name }}</p>
                <p class="text-gray-600"><i class="fas fa-envelope mr-2 text-blue-600"></i>{{ Auth::user()->email }}</p>
                <p class="text-gray-600"><i class="fas fa-phone mr-2 text-blue-600"></i>{{ Auth::user()->phone ?? 'Non renseigné' }}</p>
                <p class="text-gray-600"><i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>{{ Auth::user()->address ?? 'Non renseignée' }}</p>
            </div>
        </div>

        <!-- Onglets -->
        <div class="mb-4 flex space-x-4 border-b border-gray-300 text-sm font-medium">
            <button class="tab-btn py-2 px-4 text-gray-700 hover:text-blue-600" onclick="showTab('infos')">
                <i class="fas fa-user-edit mr-1"></i> Infos
            </button>
            <button class="tab-btn py-2 px-4 text-gray-700 hover:text-blue-600" onclick="showTab('photo')">
                <i class="fas fa-camera mr-1"></i> Photo
            </button>
            <button class="tab-btn py-2 px-4 text-gray-700 hover:text-blue-600" onclick="showTab('password')">
                <i class="fas fa-key mr-1"></i> Mot de passe
            </button>
        </div>

        <!-- Onglet Infos -->
        <div id="infos" class="tab-content hidden">
            <form action="{{ route('admin.profile.update.infos') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nom complet</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Téléphone</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="w-full border rounded-lg px-4 py-2">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Adresse</label>
                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="w-full border rounded-lg px-4 py-2">
                    </div>
                </div>
                <div class="text-right pt-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg">
                        <i class="fas fa-save mr-1"></i> Mettre à jour
                    </button>
                </div>
            </form>
        </div>

        <!-- Onglet Photo -->
        <div id="photo" class="tab-content hidden">
            <form action="{{ route('admin.profile.update.photo') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <label class="block text-sm text-gray-600 mb-1">Choisir une nouvelle photo</label>
                <input type="file" name="photo" class="block w-full border rounded-lg px-4 py-2">
                <div class="text-right pt-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg">
                        <i class="fas fa-upload mr-1"></i> Mettre à jour
                    </button>
                </div>
            </form>
        </div>

        <!-- Onglet Mot de passe -->
        <div id="password" class="tab-content hidden">
            <form action="{{ route('admin.profile.update.password') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Mot de passe actuel</label>
                    <input type="password" name="current_password" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nouveau mot de passe</label>
                    <input type="password" name="password" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Confirmation</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div class="text-right pt-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg">
                        <i class="fas fa-lock mr-1"></i> Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Styles personnalisés pour les onglets actifs --}}
<style>
    .tab-btn {
        transition: background-color 0.2s, color 0.2s;
    }

    .tab-btn.active-tab {
        background-color: #ebf8ff;
        border-bottom: 3px solid #3b82f6;
        color: #1d4ed8;
        font-weight: bold;
    }
</style>

{{-- Script pour gérer les onglets --}}
<script>
    function showTab(id) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById(id).classList.remove('hidden');

        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active-tab'));
        const activeBtn = Array.from(document.querySelectorAll('.tab-btn')).find(btn => btn.textContent.toLowerCase().includes(id));
        if (activeBtn) activeBtn.classList.add('active-tab');
    }

    // Afficher "Infos" au chargement
    // Ne rien afficher au chargement
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

</script>
@endsection
