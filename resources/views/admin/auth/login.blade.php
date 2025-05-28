<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Si tu utilises Vite et Tailwind -->
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300">

    <div class="w-full max-w-md bg-gradient-to-br from-white via-gray-100 to-white p-8 rounded-2xl shadow-xl backdrop-blur-md">
        <div class="mb-6 text-center">
            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-12 mx-auto mb-2">
            <h2 class="text-2xl font-bold text-gray-800">Connexion Admin</h2>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
                <label class="flex items-center text-sm">
                    <input type="checkbox" name="remember" class="mr-2">
                    Se souvenir de moi
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Mot de passe oublié ?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition-all duration-300">
                Se connecter
            </button>
        </form>
    </div>

</body>
</html>
