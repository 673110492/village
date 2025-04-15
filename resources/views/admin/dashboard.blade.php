@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700">Utilisateurs</h2>
            <p class="text-lg">123 utilisateurs</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700">Projets</h2>
            <p class="text-lg">45 projets en cours</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700">Services</h2>
            <p class="text-lg">6 services disponibles</p>
        </div>
    </div>
@endsection
