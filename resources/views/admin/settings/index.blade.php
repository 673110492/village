@extends('admin.layouts.app')

@section('pageTitle', 'Paramètres généraux')
@section('pageSubTitle', 'Paramètres / Général')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Paramètres du site</h2>

        @foreach ($settings as $setting)
        <div class="flex justify-between items-center py-3 border-b">
            <div class="w-2/3">
                <strong class="block text-gray-700">{{ ucfirst($setting->key) }}</strong>
                <p class="text-gray-600 text-sm mt-1">
                    @if($setting->key === 'Logo' && $setting->logo)
                        <img src="{{ asset($setting->logo) }}" alt="Logo" class="h-10">
                    @elseif($setting->key === 'Adresse') {{ $setting->adresse }}
                    @elseif($setting->key === 'Email') {{ $setting->email }}
                    @elseif($setting->key === 'Téléphone1') {{ $setting->tel1 }}
                    @elseif($setting->key === 'Téléphone2') {{ $setting->tel2 }}
                    @else {{ $setting->value }}
                    @endif
                </p>
            </div>
            <button 
                data-modal-target="modal-{{ $setting->id }}" 
                class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">
                Modifier
            </button>
        </div>

        <!-- Modal -->
        <div id="modal-{{ $setting->id }}"
     class="hidden fixed inset-0 z-50 backdrop-blur-sm bg-white/30 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative border border-gray-200">
        <!-- Bouton de fermeture -->
        <button onclick="document.getElementById('modal-{{ $setting->id }}').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl font-bold">×</button>

        <!-- Titre -->
        <h3 class="text-xl font-semibold mb-4">Modifier {{ ucfirst($setting->key) }}</h3>

        <!-- Formulaire -->
        <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($setting->key === 'Logo')
                <input type="file" name="logo" class="w-full border rounded px-3 py-2 mb-4">
            @elseif ($setting->key === 'Adresse')
                <input type="text" name="adresse" value="{{ $setting->adresse }}"
                       class="w-full border rounded px-3 py-2 mb-4">
            @elseif ($setting->key === 'Email')
                <input type="email" name="email" value="{{ $setting->email }}"
                       class="w-full border rounded px-3 py-2 mb-4">
            @elseif ($setting->key === 'Téléphone1')
                <input type="text" name="tel1" value="{{ $setting->tel1 }}"
                       class="w-full border rounded px-3 py-2 mb-4">
            @elseif ($setting->key === 'Téléphone2')
                <input type="text" name="tel2" value="{{ $setting->tel2 }}"
                       class="w-full border rounded px-3 py-2 mb-4">
            @else
                <textarea name="value" rows="4"
                          class="w-full border rounded px-3 py-2 mb-4">{{ $setting->value }}</textarea>
            @endif

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

        @endforeach
    </div>
</div>

<script>
    // Active les modals (si tu veux le faire sans Alpine/JS frameworks)
    document.querySelectorAll('[data-modal-target]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-target');
            document.getElementById(modalId).classList.remove('hidden');
        });
    });
</script>
@endsection
