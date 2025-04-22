@extends('admin.layouts.app')
@section('pageTitle', 'Gestion de l Équipe')
@section('pageSubTitle', 'Équipes / Ajout')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto">

        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('admin.teams.index') }}"
               class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                ← Retour à la liste des membres
            </a>
        </div>

        <!-- Titre -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            Créer un nouveau membre
        </h2>
        <hr class="border-t-3 border-blue-500 mb-6">

        <!-- Formulaire -->
        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>
             <!-- fonction -->
             <div>
                <label for="fonction" class="block text-sm font-medium text-gray-700 mb-1">Fonction</label>
                <input type="text" name="fonction" id="fonction" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-yellow-300" />
            </div>
            <!-- Téléphone -->

            <div>
                <label for="tel" class="block text-sm font-medium text-gray-700 mb-1">
                    Téléphone (WhatsApp)
                </label>
                <input type="tel" id="tel" name="tel"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <input type="hidden" name="full_phone">

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (optionnelle)</label>
                <input type="file" name="image" id="image"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>
            

            <!-- presentation (Rich Text) -->
            <div>
                <label for="presentation" class="block text-sm font-medium text-gray-700 mb-1">Présentation</label>
                <textarea rows="8" name="presentation" id="presentation" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-yellow-300">{{ old('presentation') }}</textarea>
            </div>

            <!-- Bouton Enregistrer -->
            <div class="pt-5 flex justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#tel");
    const iti = window.intlTelInput(input, {
        initialCountry: "gq",
        separateDialCode: true,
        preferredCountries: ["gq", "cm", "ci", "bj"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Option 1 : Si tu veux formater avant l'envoi
    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        // Empêche l'envoi automatique pour le test
        // e.preventDefault();

        // On récupère le numéro complet formaté avec l'indicatif
        const fullPhoneNumber = iti.getNumber(); // E.g. +237612345678

        // Crée ou remplace un input caché pour l'envoyer en base
        let hiddenInput = document.querySelector('input[name="full_phone"]');
        if (!hiddenInput) {
            hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "full_phone";
            form.appendChild(hiddenInput);
        }
        hiddenInput.value = fullPhoneNumber;
    });
</script>



@endsection
