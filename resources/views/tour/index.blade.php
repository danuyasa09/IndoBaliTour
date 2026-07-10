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

        <!-- HERO SECTION -->
        <section class="relative h-[650px] md:h-[700px] overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1920&q=80" alt="Bali Temple Sunset" class="w-full h-full object-cover">
                <!-- Dark Overlay to Match Sunset Mood and Ensure Text Contrast -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            </div>

            <!-- Hero Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                <div class="max-w-2xl text-white space-y-6">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                        Tulis cerita mu<br>di Bali
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
                    <img src="https://images.unsplash.com/photo-1505993597083-3bd19f7c839b?auto=format&fit=crop&w=800&q=80" alt="Tour Packages" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    
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

        <!-- STAT BANNER -->
        <section class="bg-brand-red text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold mb-1">12+</div>
                        <div class="text-xs sm:text-sm text-red-100 uppercase tracking-widest">Happy Traveler</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold mb-1">850+</div>
                        <div class="text-xs sm:text-sm text-red-100 uppercase tracking-widest">Total Tour Guide</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold mb-1">150+</div>
                        <div class="text-xs sm:text-sm text-red-100 uppercase tracking-widest">Destinations</div>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold mb-1">20+</div>
                        <div class="text-xs sm:text-sm text-red-100 uppercase tracking-widest">Partner Hotels</div>
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
            <x-footer />
        </section>
    </body>
</html>
