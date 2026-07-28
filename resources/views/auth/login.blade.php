<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Indo Bali Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-800 flex items-center justify-center min-h-screen">
    
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-brand-red py-6 text-center">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('images/logos/logo.png') }}" alt="Logo" class="h-12 brightness-0 invert mx-auto" />
            </a>
            <h2 class="text-white text-xl font-bold mt-4">Welcome Back!</h2>
            <p class="text-white/80 text-sm mt-1">Please log in to continue</p>
        </div>

        <div class="p-8">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf
                
                @if($errors->any())
                    <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm border border-red-100">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none" 
                           placeholder="Enter your username">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none" 
                           placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-brand-red hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    Login
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-brand-red hover:text-red-700 font-semibold transition-colors">Register now</a>
            </div>
            
            <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-gray-600 transition-colors">
                    &larr; Back to Home
                </a>
            </div>
        </div>
    </div>

</body>
</html>
