<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Write Your Story in Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

<header x-data="{ scrolled: false }" 
        @scroll.window="scrolled = (window.scrollY > 50)" 
        :class="scrolled ? 'bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-md text-gray-900' : 'bg-transparent border-b border-white/10 text-white pt-2'" 
        class="fixed w-full top-0 z-50 transition-all duration-500 skiptranslate">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center transition-all duration-500" :class="scrolled ? 'h-16' : 'h-20'">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto group-hover:scale-105 transition-all duration-500" :class="scrolled ? 'h-10' : 'h-12 brightness-0 invert drop-shadow-md'" />
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('tour.index') }}" 
                   :class="scrolled ? 'text-gray-800' : 'text-white'" 
                   class="hover:text-brand-red text-sm font-medium transition-all duration-300 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Home') }}
                </a>
                
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button :class="scrolled ? 'text-gray-800' : 'text-white'" class="flex items-center space-x-1 hover:text-brand-red font-medium text-sm transition-all duration-300 focus:outline-none py-2">
                        <span>{{ __('Tour') }}</span>
                        <svg class="h-3.5 w-3.5 transition-transform duration-300" :class="scrolled ? 'text-gray-500' : 'text-white/70', { 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    <button :class="scrolled ? 'text-gray-800' : 'text-white'" class="flex items-center space-x-1 hover:text-brand-red font-medium text-sm transition-all duration-300 focus:outline-none py-2">
                        <span>{{ __('Transfer') }}</span>
                        <svg class="h-3.5 w-3.5 transition-transform duration-300" :class="scrolled ? 'text-gray-500' : 'text-white/70', { 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                   :class="scrolled ? 'text-gray-800' : 'text-white'" 
                   class="hover:text-brand-red text-sm font-medium transition-all duration-300 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Experiences') }}
                </a>
                
                <a href="{{ route('blog_event') }}" 
                   :class="scrolled ? 'text-gray-800' : 'text-white'" 
                   class="hover:text-brand-red text-sm font-medium transition-all duration-300 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Blogs & News') }}
                </a>
                
                <a href="{{ route('contact') }}" 
                   :class="scrolled ? 'text-gray-800' : 'text-white'" 
                   class="hover:text-brand-red text-sm font-medium transition-all duration-300 no-underline relative py-1 after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 hover:after:w-full after:bg-brand-red after:transition-all after:duration-300">
                   {{ __('Contact Us') }}
                </a>
            </nav>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-1.5 text-sm font-medium rounded-full bg-brand-red text-white hover:bg-red-700 transition-colors hidden md:block">
                        Login
                    </a>
                @else
                    <div class="relative hidden md:block" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center space-x-2 font-medium text-sm focus:outline-none py-2">
                            <span class="bg-brand-red text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shadow-sm">{{ substr(Auth::user()->nama, 0, 1) }}</span>
                        </button>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-150" 
                             x-transition:enter-start="opacity-0 translate-y-1" 
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute right-0 mt-0 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black/5 z-50 overflow-hidden text-gray-900" 
                             style="display: none;">
                            <div class="py-1">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->nama }}</p>
                                    <p class="text-xs text-brand-red truncate">{{ Auth::user()->level }}</p>
                                </div>
                    @if(strtolower(Auth::user()->level) === 'admin' || strtolower(Auth::user()->level) === 'super admin')
                                    <a href="{{ url('/admin') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-red">Admin Panel</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest

                <div class="relative flex items-center" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button :class="scrolled ? 'border-gray-200 text-gray-700 bg-white hover:bg-gray-50' : 'border-white/30 text-white bg-transparent hover:bg-white/10 backdrop-blur-sm'" class="flex items-center space-x-2 pl-3 pr-3 py-1.5 border rounded-full text-sm font-medium focus:outline-none transition-all duration-300 cursor-pointer">
                        <svg class="h-4 w-4" :class="scrolled ? 'text-gray-500' : 'text-white/80'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span id="desktop-current-lang" class="truncate max-w-[100px]">English</span>
                        <svg class="h-3 w-3 transition-transform duration-300" :class="scrolled ? 'text-gray-500' : 'text-white/70', { 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                         class="absolute top-full right-0 mt-2 w-56 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] bg-white ring-1 ring-black/5 z-50 overflow-hidden text-gray-900 border border-gray-100" 
                         style="display: none;">
                        <div class="py-2 max-h-[60vh] overflow-y-auto" id="desktop-lang-dropdown">
                            <!-- Injected by JS -->
                            <button onclick="doGTranslate('en');" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">English (Original)</button>
                            <button onclick="doGTranslate('id');" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">Indonesia</button>
                        </div>
                    </div>
                </div>


                <div class="md:hidden" x-data="{ mobileOpen: false }">
                    <button @click="$dispatch('toggle-mobile-menu')" 
                            :class="scrolled ? 'text-gray-800 hover:bg-gray-100' : 'text-white hover:bg-white/20'" 
                            class="p-2 rounded-md focus:outline-none transition-colors duration-300">
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
            @guest
                <a href="{{ route('login') }}" class="block text-center w-full bg-brand-red text-white font-medium text-sm py-2 rounded-lg no-underline hover:bg-red-700">Login / Register</a>
            @else
                <div class="px-2 py-2 mb-2 bg-gray-50 rounded-lg">
                    <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->nama }}</p>
                    <p class="text-xs text-brand-red truncate mb-2">{{ Auth::user()->level }}</p>
                    @if(strtolower(Auth::user()->level) === 'admin' || strtolower(Auth::user()->level) === 'super admin')
                        <a href="{{ url('/admin') }}" class="block text-sm text-brand-red hover:text-red-700 font-medium no-underline mb-2">Admin Panel</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">Logout</button>
                    </form>
                </div>
            @endguest
        </div>

        <div class="border-t border-gray-100 pt-4 mt-4 pb-6" x-data="{ langOpen: false }">
            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Language</span>
            <div class="relative w-full">
                <button @click="langOpen = !langOpen" class="w-full flex items-center justify-between pl-4 pr-4 py-2 border border-gray-200 rounded-xl text-sm font-medium text-gray-700 bg-white focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red transition-all duration-300">
                    <div class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span id="mobile-current-lang">English</span>
                    </div>
                    <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': langOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="langOpen" 
                     x-transition 
                     class="absolute left-0 top-full mt-2 w-full bg-white border border-gray-100 rounded-xl shadow-lg z-50 overflow-hidden" style="display: none;">
                    <div class="py-1 max-h-[250px] overflow-y-auto" id="mobile-lang-dropdown">
                        <!-- Injected by JS -->
                        <button onclick="doGTranslate('en');" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">English (Original)</button>
                        <button onclick="doGTranslate('id');" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">Indonesia</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Styles & Scripts for Google Translate Integration -->
<style>
    /* Hide Google Translate Banner and elements */
    iframe.goog-te-banner-frame,
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner-frame,
    .goog-te-gadget-icon,
    #goog-gt-tt,
    .goog-te-balloon-frame,
    .VIpgJd-Zvi9od-ORHb-OEVmcd,
    .VIpgJd-Zvi9od-aZ2wEe-wOHMyf,
    .VIpgJd-Zvi9od-aZ2wEe-wOHMyf-ti6hGc,
    .goog-tooltip,
    .goog-tooltip:hover,
    #goog-gt-vt,
    #google_translate_element {
        display: none !important;
        visibility: hidden !important;
        height: 0 !important;
        width: 0 !important;
        position: absolute !important;
        top: -9999px !important;
    }
    body {
        top: 0px !important;
        margin-top: 0px !important;
        position: static !important;
    }
    html {
        top: 0px !important;
        margin-top: 0px !important;
    }
    .goog-text-highlight {
        background-color: transparent !important;
        box-shadow: none !important;
    }
</style>

<div id="google_translate_element" style="position: absolute; left: -9999px; visibility: hidden;"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'google_translate_element');
    }

    function updateLangLabel(label) {
        var desktopLabel = document.getElementById('desktop-current-lang');
        var mobileLabel = document.getElementById('mobile-current-lang');
        if(desktopLabel) desktopLabel.innerText = label;
        if(mobileLabel) mobileLabel.innerText = label;
    }

    function doGTranslate(lang) {
        if (lang === 'en') {
            // Reset translation
            var domain = window.location.hostname.replace(/^www\./, '');
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=." + domain;
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + window.location.hostname;
            window.location.reload();
            return;
        }

        var teCombo = document.querySelector('.goog-te-combo');
        if (teCombo) {
            teCombo.value = lang;
            teCombo.dispatchEvent(new Event('change'));
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Force hide Google Translate top banner continuously
        setInterval(function() {
            var bannerFrames = document.getElementsByClassName('goog-te-banner-frame');
            for (var i = 0; i < bannerFrames.length; i++) {
                if (bannerFrames[i].style.display !== 'none') {
                    bannerFrames[i].style.display = 'none';
                }
            }
            var skipTranslate = document.querySelectorAll('body > .skiptranslate');
            skipTranslate.forEach(function(el) {
                if (el.tagName === 'DIV' && el.querySelector('iframe')) {
                    el.style.display = 'none';
                }
            });
            if (document.body.style.top !== '0px') {
                document.body.style.top = '0px';
            }
            if (document.body.style.marginTop !== '0px') {
                document.body.style.marginTop = '0px';
            }
            if (document.documentElement.style.top !== '0px') {
                document.documentElement.style.top = '0px';
            }
            if (document.documentElement.style.marginTop !== '0px') {
                document.documentElement.style.marginTop = '0px';
            }
        }, 100);

        var gtInterval = setInterval(function() {
            var teCombo = document.querySelector('.goog-te-combo');
            if (teCombo && teCombo.options.length > 0) {
                clearInterval(gtInterval);
                
                var desktopDropdown = document.getElementById('desktop-lang-dropdown');
                var mobileDropdown = document.getElementById('mobile-lang-dropdown');
                
                var optionsHtml = '<button onclick="doGTranslate(\'en\')" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">English (Original)</button>';
                
                var langMap = { 'en': 'English' };
                
                for (var i = 0; i < teCombo.options.length; i++) {
                    var opt = teCombo.options[i];
                    if(opt.value && opt.value !== 'en') {
                        langMap[opt.value] = opt.innerHTML;
                        optionsHtml += '<button onclick="doGTranslate(\'' + opt.value + '\')" class="w-full text-left px-4 py-2.5 text-sm hover:bg-red-50 hover:text-brand-red font-medium transition-colors">' + opt.innerHTML + '</button>';
                    }
                }

                // Get current language from cookie
                var currentLang = 'en';
                var googtrans = getCookie('googtrans');
                if (googtrans) {
                    var parts = googtrans.split('/');
                    if (parts.length > 2) {
                        currentLang = parts[2];
                    }
                }

                if (desktopDropdown) {
                    desktopDropdown.innerHTML = optionsHtml;
                }
                if (mobileDropdown) {
                    mobileDropdown.innerHTML = optionsHtml;
                }
                
                updateLangLabel(langMap[currentLang] || 'English');
            }
        }, 500);
        
        // Failsafe: stop checking after 10 seconds
        setTimeout(function() { clearInterval(gtInterval); }, 10000);
    });

    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>