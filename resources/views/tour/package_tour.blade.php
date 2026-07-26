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
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    <x-navbar />

    <x-page-hero 
        badge="Package Tour"
        badgeIcon="fa-map-location-dot"
        title="Tour Package"
        highlight="Exclusive"
        titleEnd="Bali"
        subtitle="Write your story in Bali with hassle-free holiday package options. Enjoy the best moments from cultural tourism to nature with your loved ones."
        bgImage="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?q=80&w=1200&auto=format&fit=crop"
        ctaText="Browse Packages"
        ctaLink="#tours"
        floatingIcon="fa-tags"
        floatingTitle="Start From"
        floatingPrice="Rp 500.000"
        floatingPriceUnit="/pax"
        :floatingFeatures="['Private Transport', 'Professional Guide', 'Flexible Itinerary']"
    />

    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @forelse ($tours as $tour)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('images/' . $tour->img) }}" alt="{{ $tour->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=500&auto=format&fit=crop'">
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-1.5 text-gray-400 text-[10px] font-semibold uppercase tracking-wider mb-2">
                            <i class="fa-regular fa-clock text-xs"></i>
                            <span>{{ $tour->date ?? '3 Days 2 Nights' }}</span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-2 leading-snug" data-aos="fade-up" data-aos-delay="150">
                            {{ $tour->title }}
                        </h3>

                        <div class="text-[12px] text-gray-500 mb-6 line-clamp-3">
                            {!! $tour->short ?? 'An exciting holiday package with a variety of selected tourist destinations in Bali.' !!}
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 flex items-end justify-between">
                        <div>
                            <span class="block text-[9px] text-gray-400 uppercase font-bold tracking-wider">Start From</span>
                            <span class="text-sm font-bold text-[#7A0C16]">
                                @if(is_numeric($tour->harga))
                                    RP {{ number_format($tour->harga, 0, ',', '.') }}
                                @else
                                    {{ $tour->harga ?? 'Contact Us' }}
                                @endif
                            </span>
                        </div>
                        
                        <a href="{{ route('detail', $tour->slug) }}" class="flex items-center space-x-1 text-[11px] font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors pb-0.5">
                            <span class="uppercase tracking-wider">View Details</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-12 text-gray-500">
                No tour packages available yet.
            </div>
            @endforelse

        </div>
    </div>
    <x-footer />    
</div>
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
