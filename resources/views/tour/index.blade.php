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
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

        <!-- HEADER / NAVBAR -->
        <x-navbar />
        <x-floating_contactUs />
    

        <!-- HERO SECTION -->
        <section class="relative min-h-[100vh] overflow-hidden bg-black flex flex-col"
                 x-data="{ 
                     activeSlide: 0, 
                     slides: [
                         'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1920&q=80',
                         'https://inivie.com/_next/image?url=https%3A%2F%2Fblog.inivie.com%2Fwp-content%2Fuploads%2F2025%2F04%2F4._Pantai-Berawa-1024x683.jpg&w=1920&q=75',
                         'https://www.water-sport-bali.com/wp-content/uploads/2024/10/gunung-batur-kintamani-bali.webp',
                         'https://inivie.com/_next/image?url=https%3A%2F%2Fblog.inivie.com%2Fwp-content%2Fuploads%2F2025%2F04%2F11._Ubud-Art-Market-1024x683.jpg&w=1920&q=75'
                     ],
                     init() {
                         setInterval(() => {
                             this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
                         }, 6000);
                     }
                 }">
            
            <!-- Ken Burns Slider -->
            <template x-for="(slide, index) in slides" :key="index">
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                     :class="{ 'opacity-100 z-10': activeSlide === index, 'opacity-0 z-0': activeSlide !== index }">
                    <img :src="slide" alt="Bali Destination" 
                         class="w-full h-full object-cover transition-transform duration-[10000ms] ease-out origin-center"
                         :class="{ 'scale-110': activeSlide === index, 'scale-100': activeSlide !== index }">
                    <!-- Premium Gradient Overlays -->
                    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
                </div>
            </template>

            <!-- Slide Indicators (Right Side) -->
            <div class="absolute right-4 md:right-6 top-1/2 -translate-y-1/2 z-30 hidden sm:flex flex-col gap-3 md:gap-4">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index" 
                            class="w-1.5 rounded-full transition-all duration-500 focus:outline-none"
                            :class="{ 'bg-brand-red h-10 md:h-12 shadow-[0_0_10px_rgba(122,12,22,0.8)]': activeSlide === index, 'bg-white/30 hover:bg-white h-3 md:h-4': activeSlide !== index }">
                    </button>
                </template>
            </div>

            <!-- Hero Content -->
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex-grow flex flex-col justify-center pt-20 sm:pt-24 pb-[380px] sm:pb-[350px] lg:pb-64">
                <div class="max-w-4xl text-white space-y-5 sm:space-y-6">
                    <!-- Animated Badge -->

                    
                    <!-- Massive Title -->
                    <h1 class="text-5xl sm:text-6xl md:text-[5rem] font-extrabold tracking-tight leading-[1.1]" data-aos="fade-up" data-aos-delay="100">
                        Explore Bali, <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-400">Create Timeless</span> <br>
                        <span class="relative inline-block text-brand-red italic font-serif pr-4">
                            Memories
                            <svg class="absolute w-full h-4 -bottom-2 left-0 text-brand-red/40" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="transparent"/></svg>
                        </span>
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-gray-300 font-light max-w-xl leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                        Discover hidden paradises, cultural wonders, and unforgettable adventures. Your dream vacation with our best local guides starts here.
                    </p>
                    
                    <!-- Floating Avatars & Trust -->
                    <div class="flex flex-wrap items-center gap-4 pt-1 sm:pt-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex -space-x-4">
                            <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-[#1a1a1a] object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Traveler">
                            <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-[#1a1a1a] object-cover" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&q=80" alt="Traveler">
                            <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-[#1a1a1a] object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="Traveler">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border-2 border-[#1a1a1a] bg-brand-red flex items-center justify-center text-[10px] sm:text-xs font-bold text-white shadow-lg">+12K</div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex text-yellow-400 text-xs sm:text-sm mb-0.5">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-300 text-xs sm:text-sm font-medium">Trusted by happy travelers</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 sm:gap-6 pt-3 sm:pt-4" data-aos="fade-up" data-aos-delay="400">
                        <a href="#tours" class="group relative px-6 py-3.5 sm:px-8 sm:py-4 bg-brand-red text-white font-bold rounded-xl overflow-hidden shadow-[0_0_30px_rgba(122,12,22,0.4)] transition-all duration-300 hover:scale-105 hover:shadow-[0_0_50px_rgba(122,12,22,0.6)]">
                            <div class="absolute inset-0 bg-white/20 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out z-0"></div>
                            <span class="relative z-10 flex items-center gap-2 text-sm sm:text-base tracking-wide">
                                Book Your Tour
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                        
                        <a href="#experiences" class="group flex items-center gap-3 sm:gap-4 text-white hover:text-brand-red transition-colors duration-300">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center group-hover:bg-brand-red/20 group-hover:border-brand-red/50 transition-all duration-300 group-hover:scale-110 shadow-lg">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <span class="font-semibold tracking-wider uppercase text-xs sm:text-sm">Watch Video</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Floating Glassmorphism Stats Bar -->
            <div class="absolute bottom-8 left-0 right-0 z-30 px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="600" data-aos-offset="0">
                <div class="max-w-6xl mx-auto">
                    
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
                            document.body.style.overflow = 'hidden';
                        },
                        closeGallery() {
                            this.openModal = false;
                            document.body.style.overflow = 'auto';
                        }
                    }">
                    
                        <div class="bg-gradient-to-b from-white/10 to-white/5 backdrop-blur-2xl border border-white/20 rounded-3xl p-6 md:p-8 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.8)] ring-1 ring-white/10 transform translate-y-6 hover:translate-y-4 transition-transform duration-500 relative overflow-hidden">
                            <!-- Premium glass reflection -->
                            <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-white/40 to-transparent"></div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 divide-y md:divide-y-0 md:divide-x divide-white/10 relative z-10">
                                
                                <div @click="openGallery('travelers')" class="cursor-pointer group relative pt-4 md:pt-0 md:px-6 text-center transition-all duration-300 hover:-translate-y-2">
                                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-gradient-to-br from-gray-800 to-black border border-gray-600 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 z-10">
                                        <svg class="w-4 h-4 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-white to-gray-400 mb-2 group-hover:from-brand-red group-hover:to-red-400 transition-all drop-shadow-sm">12K+</div>
                                    <div class="text-[10px] sm:text-xs text-gray-300 uppercase tracking-[0.2em] font-bold group-hover:text-white flex items-center justify-center gap-1">Happy Traveler</div>
                                </div>

                                <div @click="openGallery('guides')" class="cursor-pointer group relative pt-4 md:pt-0 md:px-6 text-center transition-all duration-300 hover:-translate-y-2">
                                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-gradient-to-br from-gray-800 to-black border border-gray-600 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 z-10">
                                        <svg class="w-4 h-4 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-white to-gray-400 mb-2 group-hover:from-brand-red group-hover:to-red-400 transition-all drop-shadow-sm">850+</div>
                                    <div class="text-[10px] sm:text-xs text-gray-300 uppercase tracking-[0.2em] font-bold group-hover:text-white flex items-center justify-center gap-1">Tour Guide</div>
                                </div>

                                <div @click="openGallery('destinations')" class="cursor-pointer group relative pt-4 md:pt-0 md:px-6 text-center transition-all duration-300 hover:-translate-y-2">
                                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-gradient-to-br from-gray-800 to-black border border-gray-600 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 z-10">
                                        <svg class="w-4 h-4 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-white to-gray-400 mb-2 group-hover:from-brand-red group-hover:to-red-400 transition-all drop-shadow-sm">150+</div>
                                    <div class="text-[10px] sm:text-xs text-gray-300 uppercase tracking-[0.2em] font-bold group-hover:text-white flex items-center justify-center gap-1">Destinations</div>
                                </div>

                                <div @click="openGallery('hotels')" class="cursor-pointer group relative pt-4 md:pt-0 md:px-6 text-center transition-all duration-300 hover:-translate-y-2">
                                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-8 h-8 rounded-full bg-gradient-to-br from-gray-800 to-black border border-gray-600 flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 z-10">
                                        <svg class="w-4 h-4 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-white to-gray-400 mb-2 group-hover:from-brand-red group-hover:to-red-400 transition-all drop-shadow-sm">20+</div>
                                    <div class="text-[10px] sm:text-xs text-gray-300 uppercase tracking-[0.2em] font-bold group-hover:text-white flex items-center justify-center gap-1">Partner Hotels</div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Modal -->
                        <template x-teleport="body">
                            <div x-show="openModal" 
                                 class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/90 backdrop-blur-md"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 @keydown.escape.window="closeGallery()"
                                 x-cloak>
                                
                                <div class="relative max-w-5xl w-full bg-[#111] rounded-3xl overflow-hidden shadow-2xl border border-white/10"
                                     @click.away="closeGallery()">
                                    
                                    <button @click="closeGallery()" class="absolute top-4 right-4 text-white hover:text-brand-red bg-black/50 hover:bg-black/80 p-2.5 rounded-full transition-colors z-10">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>

                                    <div class="p-6 md:p-10 space-y-6">
                                        <h3 class="text-2xl font-bold text-white capitalize border-b border-white/10 pb-4">
                                            Gallery
                                        </h3>
                                        
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-h-[60vh] overflow-y-auto pr-2">
                                            <template x-for="(img, idx) in activeGallery" :key="idx">
                                                <div class="relative group rounded-2xl overflow-hidden aspect-video bg-neutral-800 border border-white/5 shadow-md">
                                                    <img :src="img" alt="Gallery Image" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-300"></div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>
            </div>
        </section>

        <!-- VALUE PROPOSITION SECTION -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
                    
                    <div class="max-w-2xl space-y-8" data-aos="fade-right">
                        <div class="space-y-6">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-brand-red">YOUR QUALITY TRAVEL PARTNER</p>>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                                Indo Bali Tour: Your Quality Travel Partner
                            </h2>
                            <p class="text-base leading-8 text-gray-600">
                                Discover the magic of Bali and beyond with Indo Bali Tour, your trusted travel companion since 2014. With our motto "Your Quality Travel Partner," we promise unforgettable experiences tailored to your desires.
                                Whether you're looking to explore hidden gems, immerse yourself in cultural wonders, or relax on pristine beaches, we craft tours that match your unique style. Want something special? Design your own dream itinerary with our personalized tour services. With Indo Bali Tour, every journey is as extraordinary as you are. Let's create memories together!
                            </p>
                        </div>

                        <div class="flex items-center gap-6" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('images/icon_google-review.png') }}" alt="Google Reviews" class="h-12 w-auto object-contain" />
                            <img src="{{ asset('images/icon_trip_advisor.png') }}" alt="TripAdvisor Reviews" class="h-12 w-auto object-contain" />
                        </div>
                    </div> 
                    <div class="relative overflow-hidden rounded-[2rem] bg-white shadow-[0_40px_80px_rgba(15,23,42,0.12)]" data-aos="fade-left">
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
                        Our Services
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        We provide comprehensive travel services to ensure your maximum satisfaction.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Service 1 -->
                <a href="{{ route('fun_activity') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-lg hover:shadow-2xl transition-all duration-500 block" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1533587851505-d119e13fa0d7?auto=format&fit=crop&w=800&q=80" alt="Fun Activity" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10 transition-colors duration-500"></div>
                    
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">     
                        <div class="space-y-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-semibold rounded-full">Watersport & More</span>
                            <h3 class="text-2xl font-bold text-white leading-tight">Fun Activity</h3>
                            <p class="text-gray-300 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 h-0 group-hover:h-auto overflow-hidden">
                                Enjoy various exciting and challenging activities for an unforgettable holiday experience in Bali.
                            </p>
                            <div class="flex items-center gap-2 pt-2 text-brand-red group-hover:text-white transition-colors duration-300">
                                <span class="text-sm font-semibold uppercase tracking-wider">Explore</span>
                                <span class="transform group-hover:translate-x-2 transition-transform duration-300">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </a>

                    <!-- Service 2 -->
                <a href="{{ route('package_tour') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-lg hover:shadow-2xl transition-all duration-500 block" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1518548419070-ad8e5fd552b6?auto=format&fit=crop&w=800&q=80" alt="Tour Packages" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10 transition-colors duration-500"></div>
                    
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">     
                        <div class="space-y-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-semibold rounded-full">Best Deals</span>
                            <h3 class="text-2xl font-bold text-white leading-tight">Tour Packages</h3>
                            <p class="text-gray-300 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 h-0 group-hover:h-auto overflow-hidden">
                                The most complete and affordable tour packages to explore the natural beauty and culture of Bali.
                            </p>
                            <div class="flex items-center gap-2 pt-2 text-brand-red group-hover:text-white transition-colors duration-300">
                                <span class="text-sm font-semibold uppercase tracking-wider">Explore</span>
                                <span class="transform group-hover:translate-x-2 transition-transform duration-300">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </a>

                    <!-- Service 3 -->
                 <a href="{{ route('car_rental') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-lg hover:shadow-2xl transition-all duration-500 block" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=800&q=80" alt="Car Rental" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10 transition-colors duration-500"></div>
                    
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">     
                        <div class="space-y-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-semibold rounded-full">Comfort & Safe</span>
                            <h3 class="text-2xl font-bold text-white leading-tight">Car Rental</h3>
                            <p class="text-gray-300 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 h-0 group-hover:h-auto overflow-hidden">
                                Rent a car with an experienced driver or self-drive for a more flexible and comfortable journey.
                            </p>
                            <div class="flex items-center gap-2 pt-2 text-brand-red group-hover:text-white transition-colors duration-300">
                                <span class="text-sm font-semibold uppercase tracking-wider">Explore</span>
                                <span class="transform group-hover:translate-x-2 transition-transform duration-300">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </a>

                    <!-- Service 4 -->
                <a href="{{ route('hotel_transfer') }}" class="relative group rounded-2xl overflow-hidden aspect-[3/4] shadow-lg hover:shadow-2xl transition-all duration-500 block" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?auto=format&fit=crop&w=800&q=80" alt="Transfer" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/10 transition-colors duration-500"></div>
                    
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">     
                        <div class="space-y-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-semibold rounded-full">Airport & Hotel</span>
                            <h3 class="text-2xl font-bold text-white leading-tight">Transfer</h3>
                            <p class="text-gray-300 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 h-0 group-hover:h-auto overflow-hidden">
                                Timely, safe, and hassle-free airport and hotel transfer services during your stay in Bali.
                            </p>
                            <div class="flex items-center gap-2 pt-2 text-brand-red group-hover:text-white transition-colors duration-300">
                                <span class="text-sm font-semibold uppercase tracking-wider">Explore</span>
                                <span class="transform group-hover:translate-x-2 transition-transform duration-300">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </section>

        <!-- POPULAR DESTINATIONS SECTION -->
        <section id="tours" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end mb-12" data-aos="fade-up">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                            Popular Destinations
                        </h2>
                        <p class="mt-4 text-lg text-gray-500 max-w-xl">
                            Favorite destinations for global travelers that are a must-visit when holidaying in Bali.
                        </p>
                    </div>
                    <a href="#" class="mt-6 sm:mt-0 px-6 py-3 border border-gray-300 text-gray-700 hover:text-white hover:bg-brand-red hover:border-brand-red rounded-lg font-semibold text-sm transition-all duration-300 flex-shrink-0">
                        View All Tours
                    </a>
                </div>

                <!-- Destination Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($tours as $tour)
                    <!-- Destination Card -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group" data-aos="flip-left" data-aos-delay="100">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Star Badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-yellow-600 font-bold px-3 py-1 rounded-full text-xs z-10 flex items-center space-x-1 shadow-sm">
                                <span>⭐️</span>
                                <span>4.8</span>
                            </div>
                            <img src="{{ asset('images/' . $tour->img) }}" alt="{{ $tour->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-brand-red transition-colors">{{ $tour->title }}</h3>
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Bali, Indonesia
                                </div>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-2">
                                <div>
                                    <span class="text-xs text-gray-400 block uppercase tracking-wider">Start from</span>
                                    <span class="text-lg font-extrabold text-brand-red">Rp {{ number_format((float)$tour->harga, 0, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('detail', $tour->slug) }}" class="px-4 py-2 bg-gray-100 hover:bg-brand-red text-gray-800 hover:text-white rounded-lg text-sm font-semibold transition-colors duration-200">
                                    Detail Tour
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- TESTIMONIALS SECTION -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Stories from those who have explored with us
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Honest impressions from international travelers who enjoyed the beauty of the Island of Gods.
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
                        Watch the excitement and unforgettable moments of Indo Bali Tour's loyal customers.
                    </p>
                </div>

                <!-- Custom Grid Layout (Photo Gallery) -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-16">
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

                <!-- Video List -->
                <div class="text-center max-w-3xl mx-auto mb-10">
                    <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Watch Our Videos</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Video 1 -->
                    <div class="overflow-hidden rounded-2xl bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)] border border-gray-100 group relative cursor-pointer" data-aos="fade-up">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop" alt="Video sunrise trek" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 group-hover:bg-brand-red/90 transition-all duration-300">
                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Mount Batur Sunrise Trekking</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">Experience breathtaking moments as the sun rises over the mountains.</p>
                            <span class="inline-flex items-center text-sm font-bold text-brand-red group-hover:text-red-700">Watch Video <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="overflow-hidden rounded-2xl bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)] border border-gray-100 group relative cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1530866495561-507c9faab2ed?auto=format&fit=crop&w=800&q=80" alt="Video rafting" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 group-hover:bg-brand-red/90 transition-all duration-300">
                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Ubud Adventure Rafting</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">An exciting adventure on challenging water currents with beautiful natural scenery.</p>
                            <span class="inline-flex items-center text-sm font-bold text-brand-red group-hover:text-red-700">Watch Video <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="overflow-hidden rounded-2xl bg-white shadow-[0_10px_30px_rgba(0,0,0,0.05)] border border-gray-100 group relative cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1540959733332-eab4deceeaf7?auto=format&fit=crop&w=800&q=80" alt="Video budaya Bali" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-14 h-14 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center group-hover:scale-110 group-hover:bg-brand-red/90 transition-all duration-300">
                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Balinese Culture & Tradition</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">The story of local wisdom and rituals that make the journey even more meaningful.</p>
                            <span class="inline-flex items-center text-sm font-bold text-brand-red group-hover:text-red-700">Watch Video <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                        </div>
                    </div>
                </div>

                <div class="mt-14 text-center" data-aos="fade-up">
                    <a href="{{ route('experience') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-brand-red hover:bg-red-800 rounded-xl transition-all duration-300 hover:-translate-y-1 shadow-[0_10px_20px_rgba(122,12,22,0.3)]">
                        View All Experiences
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </section>

            <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="bg-[#EAEAEA] rounded-2xl p-10 md:p-14 text-center" data-aos="zoom-in-up">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Ready to Write Your Own Story?</h2>
            <p class="text-xs md:text-sm text-gray-500 mb-8 max-w-xl mx-auto">
                Consult your dream trip with our local experts and make every moment count.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="javascript:void(0)" onclick="openBookingModal()" class="w-full sm:w-auto bg-[#7A0C16] hover:bg-[#5a0810] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Start your adventure
                </a>
                <a href="#" class="w-full sm:w-auto bg-[#333333] hover:bg-[#222222] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Contact Us
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
        
        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
                duration: 800,
                offset: 100,
            });
        </script>
    </body>
</html>
