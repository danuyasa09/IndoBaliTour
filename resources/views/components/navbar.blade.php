<!-- HEADER / NAVBAR -->
<header class="bg-white border-b border-gray-100 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto group-hover:scale-105 transition-transform duration-200" />
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('tour.index') }}" class="text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200">Home</a>
                <!-- Tour Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center space-x-1 text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200 focus:outline-none py-2">
                        <span>Tour</span>
                        <svg class="h-3.5 w-3.5 text-gray-400 group-hover:text-brand-red transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown list -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-0 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black/5 z-50 overflow-hidden" 
                         style="display: none;">
                        <div class="py-1.5">
                            <a href="{{ route('fun_activity') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors">Fun Activity</a>
                            <a href="{{ route('package_tour') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors">Package Tour</a>
                            <a href="{{ route('car_rental') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors">Car Rental</a>
                        </div>
                    </div>
                </div>

                <!-- Transfer Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center space-x-1 text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200 focus:outline-none py-2">
                        <span>Transfer</span>
                        <svg class="h-3.5 w-3.5 text-gray-400 group-hover:text-brand-red transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown list -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-0 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black/5 z-50 overflow-hidden" 
                         style="display: none;">
                        <div class="py-1.5">
                            <a href="{{ route('hotel_transfer') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors">Hotel Transfer</a>
                            <a href="{{ route('airport_transfer') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors">Airport Transfer</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('experience') }}" class="text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200">Experiences</a>
                <a href="{{ route('blog_event') }}" class="text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200">Blogs & News</a>
                <a href="{{ route('contact') }}" class="text-gray-600 hover:text-brand-red font-medium text-sm transition-colors duration-200">Contact Us</a>
            </nav>

            <!-- Language Dropdown & Mobile Menu Button -->
            <div class="flex items-center space-x-4">
                <!-- Language Selector (Dropdown with Alpine.js) -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 px-3 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none transition-colors duration-150">
                        <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span>ID</span>
                        <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown list -->
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black/5 z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Indonesia (ID)</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">English (EN)</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button (Hamburger) -->
                <div class="md:hidden" x-data="{ mobileOpen: false }">
                    <button @click="$dispatch('toggle-mobile-menu')" class="p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu Drawer (via dispatch event) -->
    <div x-data="{ isOpen: false }" @toggle-mobile-menu.window="isOpen = !isOpen" x-show="isOpen" x-transition class="md:hidden bg-white border-t border-gray-100 py-4 px-6 space-y-4" style="display: none;">
        <a href="{{ route('tour.index') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1">Home</a>
        <!-- Tour Accordion (Mobile) -->
        <div x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between items-center w-full text-gray-700 hover:text-brand-red font-medium text-base py-1 focus:outline-none">
                <span>Tour</span>
                <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-4 mt-2 space-y-2 border-l-2 border-gray-100" style="display: none;">
                <a href="{{ route('fun_activity') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium">Fun Activity</a>
                <a href="{{ route('package_tour') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium">Package Tour</a>
                <a href="{{ route('car_rental') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium">Car Rental</a>
            </div>
        </div>

        <!-- Transfer Accordion (Mobile) -->
        <div x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between items-center w-full text-gray-700 hover:text-brand-red font-medium text-base py-1 focus:outline-none">
                <span>Transfer</span>
                <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-4 mt-2 space-y-2 border-l-2 border-gray-100" style="display: none;">
                <a href="{{ route('hotel_transfer') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium">Hotel Transfer</a>
                <a href="{{ route('airport_transfer') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium">Airport Transfer</a>
            </div>
        </div>

        <a href="{{ route('experience') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1">Experiences</a>
        <a href="{{ route('blog_event') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1">Blogs & News</a>
        <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1">Contact Us</a>
    </div>
</header>
