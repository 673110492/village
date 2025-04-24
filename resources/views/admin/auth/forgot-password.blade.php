<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded shadow-md">
        <div class="mb-6 text-center">
            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-12 mx-auto mb-2">
            <h2 class="text-2xl font-bold text-gray-800">Mot de passe oublié</h2>
        </div>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Envoyer le lien de réinitialisation
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">← Retour à la connexion</a>
        </div>
    </div>

</body>
</html>
