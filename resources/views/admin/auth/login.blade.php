<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-in': 'slide-in 0.5s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        glow: {
                            'from': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                            'to': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)' }
                        },
                        'slide-in': {
                            'from': { transform: 'translateY(20px)', opacity: '0' },
                            'to': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            z-index: -1;
        }

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1), 0 0 20px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center gradient-bg relative overflow-hidden">

    <!-- Floating elements for visual interest -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-float"></div>
    <div class="absolute top-32 right-20 w-16 h-16 bg-blue-300 bg-opacity-20 rounded-full animate-float" style="animation-delay: -2s;"></div>
    <div class="absolute bottom-20 left-32 w-12 h-12 bg-purple-300 bg-opacity-20 rounded-full animate-float" style="animation-delay: -4s;"></div>
    <div class="absolute bottom-32 right-10 w-24 h-24 bg-pink-300 bg-opacity-10 rounded-full animate-float" style="animation-delay: -1s;"></div>

    <div class="w-full max-w-md mx-4 animate-slide-in">
        <!-- Main card with glassmorphism effect -->
        <div class="glass-morphism p-8 rounded-3xl shadow-2xl relative overflow-hidden">
            <!-- Animated gradient border -->
            <div class="absolute inset-0 rounded-3xl p-[2px] bg-gradient-to-r from-blue-400 via-purple-500 to-pink-400 animate-glow">
                <div class="bg-white bg-opacity-90 rounded-3xl h-full w-full"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10">
                <!-- Header section -->
                <div class="mb-8 text-center">
                    <div class="relative mb-4">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-105 transition-all duration-300">
                            <img src="{{ asset(site_setting('Logo')) }}" alt="Logo" class="h-10 w-10 object-contain">
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full animate-pulse"></div>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">
                        Connexion Admin
                    </h2>
                    <p class="text-gray-600 text-sm">Accédez à votre espace d'administration</p>
                </div>

                <!-- Success message -->
                @if (session('status'))
                    <div class="bg-gradient-to-r from-green-100 to-emerald-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg mb-6 shadow-sm animate-slide-in">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd"/>
                            </svg>
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="bg-gradient-to-r from-red-100 to-rose-100 border-l-4 border-red-500 text-red-800 p-4 rounded-lg mb-6 shadow-sm animate-slide-in">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clipRule="evenodd"/>
                            </svg>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Login form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email field -->
                    <div class="group">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                            Adresse Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 input-glow transition-all duration-300 bg-white bg-opacity-50 backdrop-blur-sm hover:bg-opacity-70">
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="group">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 input-glow transition-all duration-300 bg-white bg-opacity-50 backdrop-blur-sm hover:bg-opacity-70">
                        </div>
                    </div>

                    <!-- Remember me and forgot password -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                        <label class="flex items-center text-sm group cursor-pointer">
                            <input type="checkbox" name="remember" class="mr-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <span class="text-gray-600 group-hover:text-gray-800 transition-colors duration-200">Se souvenir de moi</span>
                        </label>
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-600 hover:text-blue-800 font-medium hover:underline transition-all duration-200 transform hover:scale-105">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 relative overflow-hidden group">
                        <span class="relative z-10">Se connecter</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-xs text-gray-500">
                        Sécurisé par un chiffrement de niveau entreprise
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
