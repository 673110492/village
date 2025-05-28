@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Choisis un utilisateur pour discuter</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($users as $user)
            <a href="{{ route('chat.show', $user->id) }}"
               class="bg-white rounded-2xl shadow-md p-4 flex items-center hover:bg-gray-100 transition-colors duration-300">
                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default-avatar.png') }}"
                     alt="{{ $user->name }}"
                     class="w-12 h-12 rounded-full object-cover mr-4 flex-shrink-0">

                <div class="min-w-0">
                    <p class="text-lg font-medium text-gray-900 truncate">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500 truncate">Voir la conversation</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
