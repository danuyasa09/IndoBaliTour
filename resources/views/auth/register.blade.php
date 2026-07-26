<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Indo Bali Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-800 flex items-center justify-center min-h-screen">
    
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden my-8">
        <div class="bg-brand-red py-6 text-center">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 brightness-0 invert mx-auto" />
            </a>
            <h2 class="text-white text-xl font-bold mt-4">Create a New Account</h2>
            <p class="text-white/80 text-sm mt-1">Register to provide a testimonial</p>
        </div>

        <div class="p-8">
            <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required autofocus
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none @error('nama') border-red-500 @enderror" 
                           placeholder="Your Full Name">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none @error('username') border-red-500 @enderror" 
                           placeholder="Choose a username">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none @error('password') border-red-500 @enderror" 
                           placeholder="Minimum 6 characters">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors outline-none" 
                           placeholder="Repeat password">
                </div>

                <button type="submit" class="w-full bg-brand-red hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 mt-2">
                    Register
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-brand-red hover:text-red-700 font-semibold transition-colors">Login here</a>
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
