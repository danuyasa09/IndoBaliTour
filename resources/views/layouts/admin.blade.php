<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Indo Bali Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 text-white transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex flex-col">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 bg-gray-950 px-4">
                <a href="{{ url('/') }}" class="flex items-center gap-2 text-xl font-bold">
                    <img src="{{ asset('images/logos/logo.png') }}" alt="Logo" class="h-8 brightness-0 invert" />
                    <span>Admin Panel</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <!-- Future routes can be added here -->
                <div class="pt-4 mt-4 border-t border-gray-800">
                    <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Manajemen Konten</p>
                    <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.bookings.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-address-book w-5 text-center"></i>
                        <span class="font-medium">Bookings</span>
                    </a>
                    <a href="{{ route('admin.tours.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.tours.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-map-location-dot w-5 text-center"></i>
                        <span class="font-medium">Paket Tour</span>
                    </a>
                    <a href="{{ route('admin.cars.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.cars.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-car w-5 text-center"></i>
                        <span class="font-medium">Kendaraan</span>
                    </a>
                    <a href="{{ route('admin.fun_activities.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.fun_activities.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-person-swimming w-5 text-center"></i>
                        <span class="font-medium">Fun Activity</span>
                    </a>
                    <a href="{{ route('admin.testimonies.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.testimonies.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-comments w-5 text-center"></i>
                        <span class="font-medium">Testimoni</span>
                    </a>
                    <a href="{{ route('admin.blogs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.blogs.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-newspaper w-5 text-center"></i>
                        <span class="font-medium">Blog & News</span>
                    </a>
                    <a href="{{ route('admin.job_applications.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.job_applications.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <i class="fa-solid fa-briefcase w-5 text-center"></i>
                        <span class="font-medium">Job Applications</span>
                    </a>
                </div>

            <!-- Experience -->
            <div class="pt-4 mt-4 border-t border-gray-800">
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Experiences</p>
                <a href="{{ route('admin.albums.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.albums.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-images w-5 text-center"></i>
                    <span class="font-medium">Photo Gallery</span>
                </a>
                <a href="{{ route('admin.videos.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.videos.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-video w-5 text-center"></i>
                    <span class="font-medium">Video Gallery</span>
                </a>
            </div>

            <!-- Transfer -->
            <div class="pt-4 mt-4 border-t border-gray-800">
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Transfer Service</p>
                <a href="{{ route('admin.airports.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.airports.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-plane-arrival w-5 text-center"></i>
                    <span class="font-medium">Airport Transfer</span>
                </a>
                <a href="{{ route('admin.hotel_transfers.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs('admin.hotel_transfers.*') ? 'bg-brand-red text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fa-solid fa-hotel w-5 text-center"></i>
                    <span class="font-medium">Hotel Transfer</span>
                </a>
            </div>

            <!-- Bottom Profile -->
            <div class="bg-gray-950 p-4 border-t border-gray-800">
                <div class="flex items-center gap-3">
                    <div class="bg-brand-red text-white w-9 h-9 rounded-full flex items-center justify-center font-bold">
                        {{ substr(Auth::user()->nama, 0, 1) }}
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->nama }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ Auth::user()->level }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80 z-40 md:hidden" style="display: none;"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-full overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8 z-30">
                <button @click="sidebarOpen = true" class="text-gray-500 hover:text-gray-700 focus:outline-none md:hidden">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                
                <div class="flex-1 flex justify-end items-center gap-4">
                    <a href="{{ url('/') }}" target="_blank" class="text-sm font-medium text-gray-500 hover:text-brand-red transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span class="hidden sm:inline">Lihat Website</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-1.5 rounded-lg bg-gray-100 text-red-600 hover:bg-red-50 text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-50">
                <!-- Header Title -->
                <div class="mb-6 flex justify-between items-end">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                        @hasSection('subtitle')
                            <p class="text-sm text-gray-500 mt-1">@yield('subtitle')</p>
                        @endif
                    </div>
                    <div>
                        @yield('actions')
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-xmark"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Tuliskan deskripsi atau konten di sini...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
