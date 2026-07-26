<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Fun Activity</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
        <x-navbar />
              <x-floating_contactUs />

    <x-page-hero 
        badge="Fun Activity"
        badgeIcon="fa-person-swimming"
        title="Fun"
        highlight="Activities"
        subtitle="Find unforgettable adventures in Bali. From thrilling rafting to enjoying the beautiful beaches."
        bgImage="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?q=80&w=1200&auto=format&fit=crop"
        ctaText="Browse Activities"
        ctaLink="#activities"
        floatingIcon="fa-ticket"
        floatingTitle="Starting From"
        floatingPrice="Rp 350.000"
        floatingPriceUnit="/pax"
        :floatingFeatures="['Safety Equipment', 'Professional Instructor', 'Insurance Coverage']"
    />

        <!-- Activity Grid -->
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">Exciting & Challenging Activities in Bali</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($activities as $activity)
                <a href="{{ route('fun_activity.show', $activity->id ?? $activity->slug) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group block" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/' . $activity->img) }}" alt="{{ $activity->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Activity</span>
                    </div>
                    
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#7A0C16] transition-colors" data-aos="fade-up" data-aos-delay="150">{{ $activity->title }}</h3>
                            <p class="text-gray-500 text-xs mt-2 mb-4 leading-relaxed">
                                {!! \Illuminate\Support\Str::limit(strip_tags($activity->description), 100) !!}
                            </p>
                        </div>
                        
                        <div>
                            <div class="text-[#7A0C16] font-bold text-lg mb-4">
                                Rp {{ number_format((float)$activity->price, 0, ',', '.') }} <span class="text-gray-400 text-xs font-normal">/pax</span>
                            </div>
                            <span class="w-full bg-[#7A0C16] hover:bg-[#5a0810] text-white py-2 px-4 rounded text-sm font-medium transition-colors duration-200 inline-block text-center">
                                View Details
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gray-50 py-16 border-t border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-12" data-aos="fade-up" data-aos-delay="100">Terms & Facilities</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🛡️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Full Insurance</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            All activities are equipped with full safety insurance coverage for the comfort of your adventure.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🍽️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Lunch</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            Most of our activity packages include a delicious and hygienic buffet lunch.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🚗</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Hotel Transfer</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            Transfer service to and from your hotel with our comfortable car fleet.
                        </p>
                    </div>
                </div>
            </div>
        </div>

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
