<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Tulis Cerita Mu di Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

<header x-data="{ scrolled: false }" 
        @scroll.window="scrolled = (window.scrollY > 20)" 
        :class="scrolled ? 'bg-white border-b border-gray-100 shadow-sm text-gray-950' : 'bg-white/40 backdrop-blur-md border-b border-white/20 text-gray-900'" 
        class="fixed w-full top-0 z-50 transition-all duration-300 skiptranslate">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-16 flex justify-between items-center transition-all duration-300">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto group-hover:scale-105 transition-all duration-300" />
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('tour.index') }}" 
                   :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" 
                   class="hover:text-brand-red text-sm transition-all duration-200 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Home') }}
                </a>
                
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" class="flex items-center space-x-1 hover:text-brand-red text-sm transition-all duration-200 focus:outline-none py-2">
                        <span>{{ __('Tour') }}</span>
                        <svg class="h-3.5 w-3.5 transition-transform duration-200" :class="scrolled ? 'text-gray-400' : 'text-gray-600', { 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-0 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black/5 z-50 overflow-hidden text-gray-900" 
                         style="display: none;">
                        <div class="py-1.5">
                            <a href="{{ route('fun_activity') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors no-underline">{{ __('Fun Activity') }}</a>
                            <a href="{{ route('package_tour') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors no-underline">{{ __('Package Tour') }}</a>
                            <a href="{{ route('car_rental') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors no-underline">{{ __('Car Rental') }}</a>
                        </div>
                    </div>
                </div>

                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" class="flex items-center space-x-1 hover:text-brand-red text-sm transition-all duration-200 focus:outline-none py-2">
                        <span>{{ __('Transfer') }}</span>
                        <svg class="h-3.5 w-3.5 transition-transform duration-200" :class="scrolled ? 'text-gray-400' : 'text-gray-600', { 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150" 
                         x-transition:enter-start="opacity-0 translate-y-1" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-100" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-1" 
                         class="absolute left-0 mt-0 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black/5 z-50 overflow-hidden text-gray-900" 
                         style="display: none;">
                        <div class="py-1.5">
                            <a href="{{ route('hotel_transfer') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors no-underline">{{ __('Hotel Transfer') }}</a>
                            <a href="{{ route('airport_transfer') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red font-medium transition-colors no-underline">{{ __('Airport Transfer') }}</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('experience') }}" 
                   :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" 
                   class="hover:text-brand-red text-sm transition-all duration-200 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Experiences') }}
                </a>
                
                <a href="{{ route('blog_event') }}" 
                   :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" 
                   class="hover:text-brand-red text-sm transition-all duration-200 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Blogs & News') }}
                </a>
                
                <a href="{{ route('contact') }}" 
                   :class="scrolled ? 'text-gray-600' : 'text-gray-800 font-medium'" 
                   class="hover:text-brand-red text-sm transition-all duration-200 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Contact Us') }}
                </a>
            </nav>

            <div class="flex items-center space-x-4">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            :class="scrolled ? 'border-gray-200 text-gray-700 hover:bg-gray-50' : 'border-gray-300 text-gray-900 hover:bg-black/5'" 
                            class="flex items-center space-x-2 px-3 py-1.5 border rounded-full text-sm font-medium focus:outline-none transition-all duration-150">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <svg class="h-3 w-3 transition-transform duration-200" :class="scrolled ? 'text-gray-400' : 'text-gray-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black/5 z-50 text-gray-900" style="display: none;">
                        <div class="py-1">
                            <a href="{{ route('lang.switch', 'id') }}" class="block px-4 py-2 text-sm {{ app()->getLocale() == 'id' ? 'bg-gray-100 font-bold text-brand-red' : 'text-gray-700 hover:bg-gray-100' }} no-underline">Indonesia (ID)</a>
                            <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 text-sm {{ app()->getLocale() == 'en' ? 'bg-gray-100 font-bold text-brand-red' : 'text-gray-700 hover:bg-gray-100' }} no-underline">English (EN)</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="hidden lg:inline-flex items-center justify-center px-5 py-2 bg-brand-red hover:bg-brand-dark-red text-white text-xs font-semibold rounded-full shadow-md hover:shadow-brand-red/20 transition-all duration-200 transform hover:-translate-y-0.5 no-underline">
                    {{ __('Hubungi Kami') }}
                </a>

                <div class="md:hidden" x-data="{ mobileOpen: false }">
                    <button @click="$dispatch('toggle-mobile-menu')" 
                            :class="scrolled ? 'text-gray-500 hover:text-gray-900 hover:bg-gray-100' : 'text-gray-900 hover:text-black/80 hover:bg-black/5'" 
                            class="p-2 rounded-md focus:outline-none transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

   <div x-data="{ isOpen: false }" 
         @toggle-mobile-menu.window="isOpen = !isOpen" 
         x-show="isOpen" 
         x-transition 
         class="md:hidden absolute left-0 top-full w-full bg-white border-t border-gray-100 py-4 px-6 space-y-4 text-gray-900 shadow-xl max-h-[calc(100vh-4rem)] overflow-y-auto" 
         style="display: none;">
         
        <a href="{{ route('tour.index') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1 no-underline">{{ __('Home') }}</a>
        
        <div x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between items-center w-full text-gray-700 hover:text-brand-red font-medium text-base py-1 focus:outline-none">
                <span>{{ __('Tour') }}</span>
                <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-4 mt-2 space-y-2 border-l-2 border-brand-red/20" style="display: none;">
                <a href="{{ route('fun_activity') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium no-underline">{{ __('Fun Activity') }}</a>
                <a href="{{ route('package_tour') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium no-underline">{{ __('Package Tour') }}</a>
                <a href="{{ route('car_rental') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium no-underline">{{ __('Car Rental') }}</a>
            </div>
        </div>

        <div x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between items-center w-full text-gray-700 hover:text-brand-red font-medium text-base py-1 focus:outline-none">
                <span>{{ __('Transfer') }}</span>
                <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" x-transition class="pl-4 mt-2 space-y-2 border-l-2 border-brand-red/20" style="display: none;">
                <a href="{{ route('hotel_transfer') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium no-underline">{{ __('Hotel Transfer') }}</a>
                <a href="{{ route('airport_transfer') }}" class="block text-sm text-gray-600 hover:text-brand-red py-1 font-medium no-underline">{{ __('Airport Transfer') }}</a>
            </div>
        </div>

        <a href="{{ route('experience') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1 no-underline">{{ __('Experiences') }}</a>
        <a href="{{ route('blog_event') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1 no-underline">{{ __('Blogs & News') }}</a>
        <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-brand-red font-medium text-base py-1 no-underline">{{ __('Contact Us') }}</a>

        <div class="border-t border-gray-100 pt-4 mt-4">
            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Language / Bahasa</span>
            <div class="flex space-x-4">
                <a href="{{ route('lang.switch', 'id') }}" class="flex items-center space-x-2 px-3 py-1.5 border rounded-full text-xs font-medium {{ app()->getLocale() == 'id' ? 'border-brand-red text-brand-red bg-brand-red/5' : 'border-gray-200 text-gray-600 hover:bg-gray-50' }} no-underline">
                    <span>Indonesia (ID)</span>
                </a>
                <a href="{{ route('lang.switch', 'en') }}" class="flex items-center space-x-2 px-3 py-1.5 border rounded-full text-xs font-medium {{ app()->getLocale() == 'en' ? 'border-brand-red text-brand-red bg-brand-red/5' : 'border-gray-200 text-gray-600 hover:bg-gray-50' }} no-underline">
                    <span>English (EN)</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Styles & Scripts for Google Translate Integration -->
<style>
    /* Hide Google Translate Banner and elements */
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner-frame,
    .goog-te-gadget-icon,
    #goog-gt-tt,
    .goog-te-balloon-frame,
    #google_translate_element {
        display: none !important;
    }
    body {
        top: 0px !important;
        position: static !important;
    }
    .goog-text-highlight {
        background-color: transparent !important;
        box-shadow: none !important;
    }
</style>

<div id="google_translate_element" style="display:none;"></div>

<script type="text/javascript">
    // Set googtrans cookie based on PHP locale
    (function() {
        const currentLocale = "{{ app()->getLocale() }}";
        if (currentLocale === 'en') {
            document.cookie = "googtrans=/id/en; path=/";
            document.cookie = "googtrans=/id/en; path=/; domain=" + window.location.hostname;
            document.cookie = "googtrans=/id/en; path=/; domain=." + window.location.hostname.replace(/^www\./, '');
        } else {
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + window.location.hostname;
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=." + window.location.hostname.replace(/^www\./, '');
        }
    })();

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'id,en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>