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

<div class="min-h-screen bg-white font-sans antialiased" data-aos="fade-up" data-aos-delay="200">
    
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

    <div class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">Luxurious and well-maintained fleet</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($cars as $car)
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="{{ asset('images/' . $car->img) }}" alt="{{ $car->title }}" class="w-full h-48 object-cover" onerror="this.src='https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=400&auto=format&fit=crop'">
                    <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Premium</span>
                </div>
                
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900" data-aos="fade-up" data-aos-delay="150">{{ $car->title }}</h3>
                        <div class="text-gray-500 text-xs mt-1.5 mb-5 line-clamp-3">
                            {!! $car->content !!}
                        </div>
                    </div>
                    
                    <div>
                        <a href="https://wa.me/6281234567890?text=Halo%20Indo%20Bali%20Tour,%20saya%20ingin%20sewa%20mobil%20{{ urlencode($car->title) }}" class="w-full block text-center bg-[#7A0C16] hover:bg-[#5a0810] text-white py-2 px-4 rounded text-sm font-medium transition-colors duration-200">
                            Booking Now
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-10">
                Car rental data is not yet available.
            </div>
            @endforelse
        </div>
    </div>

    <div class="bg-gray-50 py-16 border-t border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-12" data-aos="fade-up" data-aos-delay="100">Why Rent from Indo Bali Tour?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++)
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gray-200 rounded-full mb-5 flex items-center justify-center">
                        <span class="text-gray-400 text-xs">Icon</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Well-Maintained Fleet</h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                        Every vehicle of ours is always clean, fragrant, and undergoes regular routine service for driving safety.
                    </p>
                </div>
                @endfor
            </div>
        </div>
    </div>

     <x-footer />
</div>

</html>
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