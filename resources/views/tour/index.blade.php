<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Tulis Cerita Mu di Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

        <!-- HEADER / NAVBAR -->
        <x-navbar />
        <x-floating_contactUs />
    

        <!-- HERO SECTION -->
        <section class="relative h-screen overflow-hidden"
                 x-data="{ 
                     activeSlide: 0, 
                     slides: [
                         'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1920&q=80',
                         'https://images.unsplash.com/photo-1518548419070-ad8e5fd552b6?auto=format&fit=crop&w=1920&q=80',
                         'https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&w=1920&q=80'
                     ],
                     init() {
                         setInterval(() => {
                             this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
                         }, 5000);
                     }
                 }">
            
            <template x-for="(slide, index) in slides" :key="index">
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                     :class="{ 'opacity-100 z-10': activeSlide === index, 'opacity-0 z-0': activeSlide !== index }">
                    <img :src="slide" alt="Bali Destination" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                </div>
            </template>

            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center pb-[220px] md:pb-32">
                <div class="max-w-2xl text-white space-y-6">
                    <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold tracking-wider uppercase mb-2">
                        ✨ The Best Travel Partner in Bali
                    </span>
                    
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                        Jelajahi Bali, <br>Ciptakan Kenangan Abadi
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-200 font-light">
                        Jelajahi keindahan budaya, petualangan eksotis, dan pantai surga bersama pemandu lokal terbaik kami.
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

            <div class="absolute z-20 bottom-[170px] md:bottom-[140px] left-0 right-0 flex justify-center space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index" 
                            class="h-2 rounded-full transition-all duration-300 focus:outline-none"
                            :class="{ 'bg-brand-red w-8': activeSlide === index, 'bg-white/50 hover:bg-white w-2': activeSlide !== index }">
                    </button>
                </template>
            </div>

            <div class="absolute bottom-0 left-0 right-0 border-t border-brand-red/20 py-8 z-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div x-data="{ 
                        openModal: false, 
                        activeGallery: [], 
                        galleries: {
                            travelers: [
                                'https://images.unsplash.com/photo-1527631746610-bca00a040d60?w=600&q=80',
                                'https://images.unsplash.com/photo-1539635278303-d4002c07eae3?w=600&q=80',
                            ],
                            guides: [
                                'https://images.unsplash.com/photo-1517486808906-6a1b4acabab8?w=600&q=80',
                                'https://images.unsplash.com/photo-1555685812-4b943f1cb0eb?w=600&q=80',
                            ],
                            destinations: [
                                'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=600&q=80',
                                'https://images.unsplash.com/photo-1518548419070-ad8e5fd552b6?w=600&q=80',
                            ],
                            hotels: [
                                'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=600&q=80',
                                'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=600&q=80',
                            ]
                        },
                        openGallery(type) {
                            this.activeGallery = this.galleries[type];
                            this.openModal = true;
                            document.body.style.overflow = 'hidden'; // Mencegah scroll saat modal terbuka
                        },
                        closeGallery() {
                            this.openModal = false;
                            document.body.style.overflow = 'auto'; // Mengembalikan scroll
                        }
                    }">
                                
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                            <div @click="openGallery('travelers')" class="cursor-pointer group hover:scale-105 transition-transform duration-300">
                                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1 group-hover:text-brand-red">12K+</div>
                                <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold group-hover:text-white">Happy Traveler</div>
                            </div>

                            <div @click="openGallery('guides')" class="cursor-pointer group hover:scale-105 transition-transform duration-300">
                                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1 group-hover:text-brand-red">850+</div>
                                <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold group-hover:text-white">Total Tour Guide</div>
                            </div>

                            <div @click="openGallery('destinations')" class="cursor-pointer group hover:scale-105 transition-transform duration-300">
                                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1 group-hover:text-brand-red">150+</div>
                                <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold group-hover:text-white">Destinations</div>
                            </div>

                            <div @click="openGallery('hotels')" class="cursor-pointer group hover:scale-105 transition-transform duration-300">
                                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1 group-hover:text-brand-red">20+</div>
                                <div class="text-xs sm:text-sm text-red-200 uppercase tracking-widest font-semibold group-hover:text-white">Partner Hotels</div>
                            </div>
                        </div>

                        <!-- Gallery Modal -->
                        <div x-show="openModal" 
                             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @keydown.escape.window="closeGallery()"
                             x-cloak>
                            
                            <div class="relative max-w-4xl w-full bg-neutral-900 rounded-2xl overflow-hidden shadow-2xl border border-white/10"
                                 @click.away="closeGallery()">
                                
                                <!-- Close Button -->
                                <button @click="closeGallery()" class="absolute top-4 right-4 text-white hover:text-brand-red bg-black/50 hover:bg-black/80 p-2 rounded-full transition-colors z-10">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>

                                <!-- Gallery Content -->
                                <div class="p-6 md:p-8 space-y-6">
                                    <h3 class="text-xl font-bold text-white capitalize border-b border-white/10 pb-4">
                                        Gallery
                                    </h3>
                                    
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-[60vh] overflow-y-auto pr-2">
                                        <template x-for="(img, idx) in activeGallery" :key="idx">
                                            <div class="relative group rounded-xl overflow-hidden aspect-video bg-neutral-800 border border-white/5 shadow-md">
                                                <img :src="img" alt="Gallery Image" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- VALUE PROPOSITION SECTION -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
                    
                    <div class="max-w-2xl space-y-8">
                        <div class="space-y-6">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-brand-red">YOUR QUALITY TRAVEL PARTNER</p>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                                Indo Bali Tour: Your Quality Travel Partner
                            </h2>
                            <p class="text-base leading-8 text-gray-600">
                                Discover the magic of Bali and beyond with Indo Bali Tour, your trusted travel companion since 2014. With our motto "Your Quality Travel Partner," we promise unforgettable experiences tailored to your desires.
                                Whether you're looking to explore hidden gems, immerse yourself in cultural wonders, or relax on pristine beaches, we craft tours that match your unique style. Want something special? Design your own dream itinerary with our personalized tour services. With Indo Bali Tour, every journey is as extraordinary as you are. Let's create memories together!
                            </p>
                        </div>

                        <div class="flex items-center gap-6">
                            <img src="{{ asset('images/icon_google-review.png') }}" alt="Google Reviews" class="h-12 w-auto object-contain" />
                            <img src="{{ asset('images/icon_trip_advisor.png') }}" alt="TripAdvisor Reviews" class="h-12 w-auto object-contain" />
                        </div>
                    </div> <div class="relative overflow-hidden rounded-[2rem] bg-white shadow-[0_40px_80px_rgba(15,23,42,0.12)]">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80" alt="Couple enjoying Bali resort" class="w-full h-full min-h-[420px] object-cover transition-transform duration-500 hover:scale-105">
                    </div>

                </div>
            </div>
        </section>


        <!-- SERVICES SECTION -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Layanan kami
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Kami menyediakan layanan wisata komprehensif untuk memastikan kepuasan maksimal Anda.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Service 1 -->
                <a href="{{ route('fun_activity') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300 block">
                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80" alt="Tour Activities" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">     
                        <h3 class="text-xl font-bold">Fun Activity</h3>
                        <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                    </div>
                </a>

                    <!-- Service 2 -->
                <a href="{{ route('package_tour') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300 block">
                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80 alt="Tour Packages" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">     
                        <h3 class="text-xl font-bold">Tour Packages</h3>
                        <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                    </div>
                </a>

                    <!-- Service 3 -->
                 <a href="{{ route('car_rental') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300 block">
                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80" alt="Tour Activities" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">     
                        <h3 class="text-xl font-bold">Car Rental</h3>
                        <span class="text-xl font-light transform translate-x-0 group-hover:translate-x-2 transition-transform duration-200">&rarr;</span>
                    </div>
                </a>

                    <!-- Service 4 -->
                <a href="{{ route('hotel_transfer') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-md hover:shadow-xl transition-all duration-300 block">
                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?auto=format&fit=crop&w=800&q=80" alt="Tour Activities" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 text-white flex justify-between items-center">     
                        <h3 class="text-xl font-bold">Transfer</h3>
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
                            Tempat wisata populer
                        </h2>
                        <p class="mt-4 text-lg text-gray-500 max-w-xl">
                            Destinasi favorit wisatawan dunia yang wajib dikunjungi saat berlibur di Bali.
                        </p>
                    </div>
                    <a href="#" class="mt-6 sm:mt-0 px-6 py-3 border border-gray-300 text-gray-700 hover:text-white hover:bg-brand-red hover:border-brand-red rounded-lg font-semibold text-sm transition-all duration-300 flex-shrink-0">
                        Lihat Semua Tour
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
                        Cerita mereka yang sudah menjelajah bersama kami
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Kesan jujur dari para pelancong mancanegara yang menikmati keindahan pulau Dewata.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-yellow-500 text-lg">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed italic">
                                "The Bali tour package was amazing. The itinerary was well planned, and we visited all the best places in Nusa Penida. Our driver was extremely friendly and gave us great restaurant recommendations. Recommended!"
                            </p>
                        </div>
                        <div class="flex items-center space-x-3 pt-6 mt-6 border-t border-gray-50">
                            <!-- Avatar -->
                            <div class="h-10 w-10 rounded-full bg-zinc-800 flex items-center justify-center text-white font-bold text-sm">
                                SD
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900">Sarah & David</h4>
                                <p class="text-xs text-gray-400">USA</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-yellow-500 text-lg">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed italic">
                                "Pemandu kami sangat menguasai budaya Bali dan membawa kami ke pura yang indah pada waktu terbaik untuk menghindari keramaian. Kualitas mobilnya luar biasa bersih dan nyaman sepanjang perjalanan kami di Tabanan."
                            </p>
                        </div>
                        <div class="flex items-center space-x-3 pt-6 mt-6 border-t border-gray-50">
                            <!-- Avatar -->
                            <div class="h-10 w-10 rounded-full bg-zinc-800 flex items-center justify-center text-white font-bold text-sm">
                                HE
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900">Hans & Elsa</h4>
                                <p class="text-xs text-gray-400">Germany</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-4">
                            <div class="flex text-yellow-500 text-lg">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed italic">
                                "Wonderful customized tour from Ubud up to Mt. Batur sunset tracking. Highly responsive support team. The floating pool breakfast experience they arranged for us was a magical highlight of our honeymoon!"
                            </p>
                        </div>
                        <div class="flex items-center space-x-3 pt-6 mt-6 border-t border-gray-50">
                            <!-- Avatar -->
                            <div class="h-10 w-10 rounded-full bg-zinc-800 flex items-center justify-center text-white font-bold text-sm">
                                YK
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-gray-900">Yuki & Kenji</h4>
                                <p class="text-xs text-gray-400">Japan</p>
                            </div>
                        </div>
                    </div>
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
                        Intip galeri aktivitas seru dan momen tak terlupakan pelanggan setia Indo Bali Tour.
                    </p>
                </div>

                <!-- Custom Grid Layout matching the image exactly -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column (Stacked landscapes) -->
                    <div class="flex flex-col gap-6">
                        <!-- Mt Batur Landscape -->
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md group">
                            <img src="https://images.unsplash.com/photo-1558005530-a79588568467?auto=format&fit=crop&w=800&q=80     " alt="Mt Batur Sunrise" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
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

            <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="bg-[#EAEAEA] rounded-2xl p-10 md:p-14 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Siap Menulis Cerita Anda Sendiri ?</h2>
            <p class="text-xs md:text-sm text-gray-500 mb-8 max-w-xl mx-auto">
                Konsultasikan perjalanan impian Anda dengan pakar lokal kami dan buat setiap momen berharga.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="javascript:void(0)" onclick="openBookingModal()" class="w-full sm:w-auto bg-[#7A0C16] hover:bg-[#5a0810] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Mulai petualangan anda
                </a>
                <a href="#" class="w-full sm:w-auto bg-[#333333] hover:bg-[#222222] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>


        <!-- START BOOKING FORM -->

        <div id="bookingModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto transition-opacity duration-300">
    
    <div class="relative bg-white w-full max-w-3xl rounded-xl shadow-2xl border-t-8 border-[#7A0C16] overflow-hidden max-h-[90vh] flex flex-col transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
        
        <button type="button" onclick="closeBookingModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl font-bold">&times;</button>
        
        <form action="#" method="POST" class="p-6 md:p-8 overflow-y-auto space-y-6 text-left">
            @csrf <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    <h2>Personal Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Full Name</label>
                        <input type="text" name="full_name" placeholder="John Doe" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Email Address</label>
                        <input type="email" name="email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Phone Number</label>
                        <input type="text" name="phone" placeholder="+1 234 567 890" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Nationality</label>
                        <input type="text" name="nationality" placeholder="e.g. Australian" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7" /></svg>
                    <h2>Tour Details</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Tour Package</label>
                        <select name="tour_package" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] text-gray-500 text-sm bg-white">
                            <option value="" disabled selected>Select a package</option>
                            <option value="ubud">Ubud Cultural Tour</option>
                            <option value="uluwatu">Uluwatu Sunset Tour</option>
                            <option value="nusa-penida">Nusa Penida Adventure</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Date of Tour / Activity</label>
                        <input type="date" name="tour_date" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] text-gray-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Total Person</label>
                        <input type="number" name="total_person" placeholder="2" min="1" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Hotel Name Stay in Bali</label>
                        <input type="text" name="hotel_name" placeholder="e.g. Alila Villas Uluwatu" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z" /></svg>
                    <h2>Additional Details</h2>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Booking / Comment / Message Details</label>
                    <textarea name="message" rows="4" placeholder="Share any special requirements or preferences for your trip..." class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm resize-none"></textarea>
                </div>
            </div>

            <div class="text-center pt-4 space-y-3">
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-[#7A0C16] hover:bg-[#5a0810] text-white font-medium rounded-md shadow-md transition-colors duration-300 w-full sm:w-auto">
                    <span>Send Message</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-[-45deg]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                </button>
                <p class="text-xs text-gray-500 italic">Our response time is typically within 12 hours.</p>
            </div>
        </form>
    </div>
</div>

        <script>
        function openBookingModal() {
            const modal = document.getElementById('bookingModal');
            const content = document.getElementById('modalContent');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
            
            document.body.style.overflow = 'hidden';
        }

        function closeBookingModal() {
            const modal = document.getElementById('bookingModal');
            const content = document.getElementById('modalContent');
            
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Menutup modal jika user klik di luar area form
        window.onclick = function(event) {
            const modal = document.getElementById('bookingModal');
            if (event.target == modal) {
                closeBookingModal();
            }
        }
    </script>
        <x-footer />
    </body>
</html>
