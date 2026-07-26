<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Write Your Story in Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

        <!-- HEADER / NAVBAR -->
        <x-navbar />

        <!-- HERO SECTION -->
        <section class="relative h-[650px] md:h-[700px] overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1920&q=80" alt="Bali Temple Sunset" class="w-full h-full object-cover">
                <!-- Dark Overlay to Match Sunset Mood and Ensure Text Contrast -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            </div>

            <!-- Hero Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center pb-24 md:pb-32">
                <div class="max-w-2xl text-white space-y-6">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                        Write your story<br>in Bali
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-200 font-light">
                        Explore cultural beauty, exotic adventures, and paradise beaches with our best local guides.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#tours" class="px-8 py-3.5 bg-brand-red hover:bg-brand-dark-red text-white font-semibold rounded-lg shadow-lg hover:shadow-brand-red/30 transition-all duration-300 transform hover:-translate-y-0.5">
                            Book Your Tour
                        </a>
                        <a href="#services" class="px-8 py-3.5 bg-black/35 backdrop-blur-md hover:bg-black/50 text-white font-semibold rounded-lg border border-white/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            Explore Tour
                        </a>
                    </div>
                </div>
            </div>

            <!-- Integrated Stats Banner with matching tinted glassmorphism -->
            <div class="absolute bottom-0 left-0 right-0 bg-brand-red/10 backdrop-blur-md border-t border-brand-red/20 py-8 z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                        <div>
                            <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">12+</div>
                            <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold">Happy Traveler</div>
                        </div>
                        <div>
                            <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">850+</div>
                            <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold">Total Tour Guide</div>
                        </div>
                        <div>
                            <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">150+</div>
                            <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold">Destinations</div>
                        </div>
                        <div>
                            <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">20+</div>
                            <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold">Partner Hotels</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VALUE PROPOSITION SECTION -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Creating your perfect holiday
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Our excellence in providing an unforgettable holiday experience in Bali.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-xl p-8 shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:shadow-[0_10px_30px_rgba(0,0,0,0.1)] transition-shadow duration-300 text-center flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-brand-red/10 flex items-center justify-center mb-6">
                            <!-- Guide Icon -->
                            <svg class="h-7 w-7 text-brand-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Local Guides</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Professional local guides are ready to accompany and share the uniqueness of every magical corner of Bali.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-xl p-8 shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:shadow-[0_10px_30px_rgba(0,0,0,0.1)] transition-shadow duration-300 text-center flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-brand-red/10 flex items-center justify-center mb-6">
                            <!-- Route Icon -->
                            <svg class="h-7 w-7 text-brand-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Attractive Tour Packages</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            A complete selection of travel packages ranging from beaches, cultural tourism, to wild nature adventures.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-xl p-8 shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:shadow-[0_10px_30px_rgba(0,0,0,0.1)] transition-shadow duration-300 text-center flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-brand-red/10 flex items-center justify-center mb-6">
                            <!-- Car Rental Icon -->
                            <svg class="h-7 w-7 text-brand-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Comfortable Car Rental</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Prime air-conditioned car fleet with experienced drivers, ready to serve your trip around Bali.
                        </p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-xl p-8 shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:shadow-[0_10px_30px_rgba(0,0,0,0.1)] transition-shadow duration-300 text-center flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-brand-red/10 flex items-center justify-center mb-6">
                            <!-- Customer Service Icon -->
                            <svg class="h-7 w-7 text-brand-red" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Standby Service</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Full support from the Indo Bali Tour team on standby to respond to all your holiday emergency needs.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Our Services
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        We provide comprehensive tourism services to ensure your maximum satisfaction.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Service 1 -->
                    <a href="#" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80" alt="Tour Activities" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Tour Activities</h3>
                            <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                        </div>
                    </a>

                    <!-- Service 2 -->
                    <a href="#" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1505993597083-3bd19f7c839b?auto=format&fit=crop&w=800&q=80" alt="Tour Packages" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Tour Packages</h3>
                            <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                        </div>
                    </a>

                    <!-- Service 3 -->
                    <a href="#" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1604999333679-b86d54738315?auto=format&fit=crop&w=800&q=80" alt="Car Rental" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Car Rental</h3>
                            <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                        </div>
                    </a>

                    <!-- Service 4 -->
                    <a href="#" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1539367618428-2bc7f6940d26?auto=format&fit=crop&w=800&q=80" alt="Custom Tour" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">
                            <h3 class="text-xl font-bold">Custom Tour</h3>
                            <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- POPULAR DESTINATIONS SECTION -->
        <section id="tours" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end mb-12">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                            Popular Tourist Destinations
                        </h2>
                        <p class="mt-4 text-lg text-gray-500 max-w-xl">
                            Favorite destinations of world tourists that must be visited while on vacation in Bali.
                        </p>
                    </div>
                    <a href="#" class="mt-6 sm:mt-0 px-6 py-3 border border-gray-300 text-gray-700 hover:text-white hover:bg-brand-red hover:border-brand-red rounded-lg font-semibold text-sm transition-all duration-300 flex-shrink-0">
                        View All Tours
                    </a>
                </div>

                <!-- Destination Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Destination Card 1 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Star Badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-yellow-600 font-bold px-3 py-1 rounded-full text-xs z-10 flex items-center space-x-1 shadow-sm">
                                <span>⭐️</span>
                                <span>4.8</span>
                            </div>
                            <img src="https://images.unsplash.com/photo-1518548419070-ad8e5fd552b6?auto=format&fit=crop&w=800&q=80" alt="Tanah Lot" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-brand-red transition-colors">Tanah Lot Temple</h3>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Tabanan, Bali
                                </div>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-2">
                                <div>
                                    <span class="text-xs text-gray-400 block uppercase tracking-wider">Start from</span>
                                    <span class="text-lg font-extrabold text-brand-red">Rp 500k</span>
                                </div>
                                <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-brand-red text-gray-800 hover:text-white rounded-lg text-sm font-semibold transition-colors duration-200">
                                    Detail Tour
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Destination Card 2 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Star Badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-yellow-600 font-bold px-3 py-1 rounded-full text-xs z-10 flex items-center space-x-1 shadow-sm">
                                <span>⭐️</span>
                                <span>4.9</span>
                            </div>
                            <img src="https://images.unsplash.com/photo-1524231757912-21f4fe3a7200?auto=format&fit=crop&w=800&q=80" alt="Lempuyang Gate" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-brand-red transition-colors">Gate of Heaven Lempuyang</h3>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Karangasem, Bali
                                </div>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-2">
                                <div>
                                    <span class="text-xs text-gray-400 block uppercase tracking-wider">Start from</span>
                                    <span class="text-lg font-extrabold text-brand-red">Rp 750k</span>
                                </div>
                                <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-brand-red text-gray-800 hover:text-white rounded-lg text-sm font-semibold transition-colors duration-200">
                                    Detail Tour
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Destination Card 3 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Star Badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-yellow-600 font-bold px-3 py-1 rounded-full text-xs z-10 flex items-center space-x-1 shadow-sm">
                                <span>⭐️</span>
                                <span>4.7</span>
                            </div>
                            <img src="https://images.unsplash.com/photo-1552596880-cd7111867fd3?auto=format&fit=crop&w=800&q=80" alt="Tegallalang" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-brand-red transition-colors">Tegallalang Rice Terrace</h3>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Gianyar, Bali
                                </div>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-2">
                                <div>
                                    <span class="text-xs text-gray-400 block uppercase tracking-wider">Start from</span>
                                    <span class="text-lg font-extrabold text-brand-red">Rp 400k</span>
                                </div>
                                <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-brand-red text-gray-800 hover:text-white rounded-lg text-sm font-semibold transition-colors duration-200">
                                    Detail Tour
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS SECTION -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Stories of those who have explored with us
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Honest impressions from foreign travelers who enjoyed the beauty of the Island of the Gods.
                    </p>
                </div>

                <style>
                    .hide-scroll::-webkit-scrollbar {
                        display: none;
                    }
                </style>
                <div x-data="{ 
                        isDown: false, 
                        startX: 0, 
                        scrollLeft: 0,
                        autoScrollInterval: null,
                        init() {
                            this.startAutoScroll();
                        },
                        startAutoScroll() {
                            if(this.autoScrollInterval) return;
                            this.autoScrollInterval = setInterval(() => {
                                if(!this.isDown && this.$refs.slider) {
                                    this.$refs.slider.scrollLeft += 1;
                                    // Seamless loop: if we scroll past half the width, reset to 0
                                    if (this.$refs.slider.scrollLeft >= this.$refs.slider.scrollWidth / 2) {
                                        this.$refs.slider.scrollLeft = 0;
                                    }
                                }
                            }, 25);
                        },
                        stopAutoScroll() {
                            clearInterval(this.autoScrollInterval);
                            this.autoScrollInterval = null;
                        },
                        mousedown(e) { 
                            this.isDown = true; 
                            this.startX = e.pageX - this.$refs.slider.offsetLeft; 
                            this.scrollLeft = this.$refs.slider.scrollLeft; 
                            this.stopAutoScroll();
                        },
                        mouseleave() { 
                            this.isDown = false; 
                            this.startAutoScroll();
                        },
                        mouseenter() {
                            this.stopAutoScroll();
                        },
                        mouseup() { 
                            this.isDown = false; 
                            this.startAutoScroll();
                        },
                        mousemove(e) { 
                            if(!this.isDown) return; 
                            e.preventDefault(); 
                            const x = e.pageX - this.$refs.slider.offsetLeft; 
                            const walk = (x - this.startX) * 2; 
                            this.$refs.slider.scrollLeft = this.scrollLeft - walk; 
                        }
                    }" 
                    class="w-full relative py-4">
                    @if($testimonies->count() > 0)
                        <div x-ref="slider"
                             @mousedown="mousedown"
                             @mouseleave="mouseleave"
                             @mouseenter="mouseenter"
                             @mouseup="mouseup"
                             @mousemove="mousemove"
                             class="flex gap-8 overflow-x-auto hide-scroll cursor-grab active:cursor-grabbing w-full px-4 sm:px-0"
                             style="scrollbar-width: none; -ms-overflow-style: none;">
                            
                            <!-- Loop dua kali agar scroll terlihat tanpa batas (seamless) -->
                            @for($j = 0; $j < 2; $j++)
                                @foreach($testimonies as $testimony)
                                <div class="w-[320px] sm:w-[400px] whitespace-normal flex-shrink-0 bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow select-none">
                                    <div class="space-y-4">
                                        <div class="flex text-yellow-500 text-lg">
                                            @for($i = 0; $i < $testimony->rating; $i++)
                                                <span>★</span>
                                            @endfor
                                            @for($i = $testimony->rating; $i < 5; $i++)
                                                <span class="text-gray-300">★</span>
                                            @endfor
                                        </div>
                                        <p class="text-gray-600 text-sm leading-relaxed italic line-clamp-4 pointer-events-none">
                                            "{{ $testimony->message }}"
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-3 pt-6 mt-6 border-t border-gray-50 pointer-events-none">
                                        @if($testimony->photo)
                                            <img src="{{ asset('storage/' . $testimony->photo) }}" alt="{{ $testimony->name }}" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-zinc-800 flex items-center justify-center text-white font-bold text-sm uppercase">
                                                {{ substr($testimony->name, 0, 2) }}
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-bold text-sm text-gray-900 line-clamp-1">{{ $testimony->name }}</h4>
                                            <p class="text-xs text-gray-400 line-clamp-1">{{ $testimony->nationality }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endfor
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500 w-full">
                            No testimonials yet. Be the first to leave a review!
                        </div>
                    @endif
                </div>
            </div>
        </section>


        <!-- EXPERIENCE GALLERY SECTION -->
        <section id="experiences" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Experience
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Take a peek at the gallery of exciting activities and unforgettable moments of loyal Indo Bali Tour customers.
                    </p>
                </div>

                <!-- Custom Grid Layout matching the image exactly -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column (Stacked landscapes) -->
                    <div class="flex flex-col gap-6">
                        <!-- Mt Batur Landscape -->
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md group">
                            <img src="https://images.unsplash.com/photo-1558005530-a79588568467?auto=format&fit=crop&w=800&q=80" alt="Mt Batur Sunrise" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <!-- Ubud river rafting Landscape -->
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md group">
                            <img src="https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&w=800&q=80" alt="Ubud river rafting" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>

                    <!-- Right Column (Infinity pool tall breakfast & smaller bottom grid) -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Pool floating breakfast (tall) -->
                        <div class="rounded-2xl overflow-hidden h-[300px] lg:h-[400px] shadow-md group">
                            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80" alt="Floating breakfast" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <!-- Bottom row: Balinese dancer & flower offerings side by side -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="rounded-2xl overflow-hidden aspect-square shadow-md group">
                                <img src="https://images.unsplash.com/photo-1540959733332-eab4deceeaf7?auto=format&fit=crop&w=800&q=80" alt="Balinese dancer" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="rounded-2xl overflow-hidden aspect-square shadow-md group">
                                <img src="https://images.unsplash.com/photo-1589308078059-be1415eab4c3?auto=format&fit=crop&w=800&q=80" alt="Canang Sari offering" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer id="contact" class="bg-brand-dark text-gray-400 py-16 border-t border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <!-- Brand info -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 text-white">
                            <!-- Custom SVG Temple Logo matching the footer style -->
                            <svg class="h-9 w-auto text-brand-red" viewBox="0 0 100 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M50 2L35 15H65L50 2Z" fill="#9e001c" />
                                <path d="M50 13L25 30H75L50 13Z" fill="#ffffff" />
                                <path d="M50 26L15 45H85L50 26Z" fill="#9e001c" />
                                <path d="M50 41L5 60H95L50 41Z" fill="#ffffff" />
                                <rect x="30" y="60" width="8" height="15" fill="#9e001c" />
                                <rect x="62" y="60" width="8" height="15" fill="#9e001c" />
                                <rect x="44" y="60" width="12" height="15" fill="#ffffff" />
                                <rect x="2" y="72" width="96" height="5" rx="2" fill="#9e001c" />
                            </svg>
                            <span class="font-bold text-lg tracking-tight">Indo Bali Tour</span>
                        </div>
                        <p class="text-sm leading-relaxed">
                            Leading professional tourism service provider in Bali. Accompanying your adventure and bringing your tropical holiday dream to life.
                        </p>
                        <div class="flex space-x-4 pt-2">
                            <!-- Social icons -->
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <span class="text-xs">FB</span>
                            </a>
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <span class="text-xs">IG</span>
                            </a>
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <span class="text-xs">YT</span>
                            </a>
                        </div>
                    </div>

                    <!-- Column 2: Services -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Services</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Tour Packages</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Car Rental</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Custom Tours</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Activity Bookings</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Airport Transfer</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Support -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Support</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Terms & Conditions</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">F.A.Q.</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Contact Support</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Affiliate Program</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Contact -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Contact Us</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li class="flex items-start space-x-3">
                                <span>📍</span>
                                <span>Jl. Sunset Road No. 888, Seminyak, Kuta, Bali, Indonesia</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <span>📞</span>
                                <span>+62 812-3456-7890</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <span>✉️</span>
                                <span>info@indobalitour.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright row -->
                <div class="pt-8 border-t border-zinc-800 text-center text-xs text-gray-500">
                    <p>&copy; {{ date('Y') }} Indo Bali Tour. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </body>
</html>
