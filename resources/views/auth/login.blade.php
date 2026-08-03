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
                
                @if(session('success'))
                    <div class="bg-green-50 text-green-600 p-3 rounded-lg text-sm border border-green-100">
                        {{ session('success') }}
                    </div>
                @endif
                
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
                    <div class="relative">
                        <input type="password" name="password" id="password" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none pr-10" 
                               placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg class="h-5 w-5 eye-slash-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
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
<script>
    function togglePassword(inputId, buttonElement) {
        const input = document.getElementById(inputId);
        const eyeIcon = buttonElement.querySelector('.eye-icon');
        const eyeSlashIcon = buttonElement.querySelector('.eye-slash-icon');
        
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.classList.add('hidden');
            eyeSlashIcon.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeIcon.classList.remove('hidden');
            eyeSlashIcon.classList.add('hidden');
        }
    }
</script>
</html>
