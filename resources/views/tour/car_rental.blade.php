<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Car Rental</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">

<div class="min-h-screen bg-white font-sans antialiased">
    
    <x-navbar />
    <x-floating_contactUs />

    <x-page-hero 
        badge="Car Rental"
        badgeIcon="fa-car"
        title="Car"
        highlight="Rental"
        subtitle="Explore Bali freely and comfortably. We provide a variety of luxurious and well-maintained fleet options for your journey."
        bgImage="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?q=80&w=1200&auto=format&fit=crop"
        ctaText="Browse Fleet"
        ctaLink="#fleet"
        floatingIcon="fa-car-side"
        floatingTitle="Starting From"
        floatingPrice="Rp 300.000"
        floatingPriceUnit="/day"
        :floatingFeatures="['Well-Maintained Fleet', 'Driver Included', 'Clean & Comfortable']"
    />

    <div id="fleet" class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">Luxurious and well-maintained fleet</h2>
        
        @php $carChunks = $cars->chunk(6); @endphp
        @if($carChunks->count() > 0)
            <div x-data="{ activePage: 0, totalPages: {{ $carChunks->count() }} }" class="relative overflow-hidden w-full">
                <!-- Slider Container -->
                <div class="flex transition-transform duration-500 ease-in-out w-full" :style="'transform: translateX(-' + (activePage * 100) + '%)'">
                    @foreach($carChunks as $chunkIndex => $chunk)
                    <div class="w-full flex-shrink-0 px-1 pb-4">
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                            @foreach($chunk as $car)
                            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="relative">
                                    <img src="{{ asset('images/' . $car->img) }}" alt="{{ $car->title }}" class="w-full h-48 object-cover" onerror="this.src='https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=400&auto=format&fit=crop'">
                                    <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Premium</span>
                                </div>
                                
                                <div class="p-5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">{{ $car->title }}</h3>
                                        <div class="text-gray-500 text-xs mt-1.5 mb-5 line-clamp-3">
                                            {!! $car->content !!}
                                        </div>
                                    </div>
                                    @php
                                        $waNumber = preg_replace('/[^0-9]/', '', \App\Models\Pengaturan::first()->phone ?? '6285858777754');
                                    @endphp
                                    <div class="mt-4 pt-4 border-t border-gray-100 flex gap-2">
                                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Indo%20Bali%20Tour,%20saya%20ingin%20sewa%20mobil%20{{ urlencode($car->title) }}" class="w-full block text-center bg-[#7A0C16] hover:bg-[#5a0810] text-white py-2 px-4 rounded text-sm font-medium transition-colors duration-200">
                                            Booking via WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination Controls -->
                @if($carChunks->count() > 1)
                <div class="flex justify-center items-center mt-10 gap-2">
                    <button @click="activePage = Math.max(0, activePage - 1)" :disabled="activePage === 0" class="w-10 h-10 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    
                    <template x-for="i in totalPages" :key="i">
                        <button @click="activePage = i - 1" :class="activePage === (i - 1) ? 'bg-[#7A0C16] text-white border-[#7A0C16]' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50'" class="w-10 h-10 rounded-full flex items-center justify-center border text-sm font-medium transition-colors" x-text="i"></button>
                    </template>

                    <button @click="activePage = Math.min(totalPages - 1, activePage + 1)" :disabled="activePage === totalPages - 1" class="w-10 h-10 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>
                @endif
            </div>
        @else
            <div class="text-center text-gray-500 py-10 w-full">
                Car rental data is not yet available.
            </div>
        @endif
</div>

     <x-footer />
</div>
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