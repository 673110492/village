@extends('admin.layouts.app')
@section('pageTitle', 'Gestion des utilisateurs')
@section('pageSubTitle', 'Utilisateurs / Detail')
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            <i class="fa fa-user-circle text-blue-500 mr-2"></i>
            Détails de l'utilisateur
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <div class="flex items-center gap-6">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" class="w-24 h-24 rounded-full">
            @else
                <i class="fa fa-user-circle fa-5x text-gray-400"></i>
            @endif

            <div class="space-y-3">
                <p class="text-lg font-semibold">
                    <i class="fa fa-user text-gray-600 mr-2"></i>
                    {{ $user->name }}
                </p>
                <p class="text-sm text-gray-600">
                    <i class="fa fa-envelope mr-2"></i>
                    {{ $user->email }}
                </p>
                <p class="text-sm text-gray-600">
                    <i class="fa fa-phone mr-2"></i>
                    {{ $user->phone ?? 'Téléphone non renseigné' }}
                </p>
                <p class="text-sm text-gray-600">
                    <i class="fa fa-map-marker mr-2"></i>
                    {{ $user->address ?? 'Adresse non renseignée' }}
                </p>
                @if (method_exists($user, 'roles'))
                <p class="text-sm text-gray-600">
                    <i class="fa fa-shield-alt mr-2 text-blue-600"></i>
                    <b>Rôle : </b>{{ $user->roles->pluck('display_name')->first() ?? 'Non défini' }}
                </p>
                @endif
            </div>
        </div>

        <div class="mt-8 flex">
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                <i class="fa fa-arrow-left mr-1"></i>
                Retour
            </a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded ml-3">
                <i class="fa fa-edit mr-1"></i>
                Modifier
            </a>
        </div>
    </div>
</div>
@endsection
