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
        bgImage="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=1200&auto=format&fit=crop"
        ctaText="Browse Packages"
        ctaLink="#tours"
        floatingIcon="fa-tags"
        floatingTitle="Start From"
        floatingPrice="Rp 500.000"
        floatingPriceUnit="/pax"
        :floatingFeatures="['Private Transport', 'Professional Guide', 'Flexible Itinerary']"
    />

    <div id="tours" class="max-w-6xl mx-auto px-4 py-16">
        @php $tourChunks = $tours->chunk(6); @endphp
        @if($tourChunks->count() > 0)
            <div x-data="{ activePage: 0, totalPages: {{ $tourChunks->count() }} }" class="relative overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out w-full" :style="'transform: translateX(-' + (activePage * 100) + '%)'">
                    @foreach($tourChunks as $chunkIndex => $chunk)
                    <div class="w-full flex-shrink-0 px-1 pb-4">
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                            @foreach($chunk as $tour)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group h-full" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="relative h-32 sm:h-48 overflow-hidden">
                                    <img src="{{ asset('images/tours/' . $tour->img) }}" alt="{{ $tour->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=500&auto=format&fit=crop'">
                                </div>

                                <div class="p-3 sm:p-5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center space-x-1.5 text-gray-400 text-[10px] font-semibold uppercase tracking-wider mb-1.5 sm:mb-2">
                                            <i class="fa-regular fa-clock text-xs"></i>
                                            <span>{{ $tour->date ?? '3 Days 2 Nights' }}</span>
                                        </div>

                                        <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-1.5 sm:mb-2 leading-snug line-clamp-2 sm:line-clamp-none" title="{{ $tour->title }}">
                                            {{ $tour->title }}
                                        </h3>

                                        <div class="text-[10px] sm:text-[12px] text-gray-500 mb-3 sm:mb-6 line-clamp-2">
                                            {!! $tour->short ?? 'An exciting holiday package with a variety of selected tourist destinations in Bali.' !!}
                                        </div>
                                    </div>

                                    <div class="border-t border-gray-100 pt-3 sm:pt-4 flex items-end justify-between">
                                        <div>
                                            <span class="block text-[8px] sm:text-[9px] text-gray-400 uppercase font-bold tracking-wider">Start From</span>
                                            <span class="text-xs sm:text-sm font-bold text-[#7A0C16]">
                                                @if(is_numeric($tour->harga))
                                                    <span x-data x-html="$store.currency.format({{ $tour->harga }})">$ {{ number_format($tour->harga, 2) }}</span>
                                                @else
                                                    {{ $tour->harga ?? 'Contact Us' }}
                                                @endif
                                            </span>
                                        </div>
                                        
                                        <a href="{{ route('detail', $tour->slug) }}" class="flex items-center space-x-1 text-[10px] sm:text-[11px] font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors pb-0.5">
                                            <span class="uppercase tracking-wider">Details</span>
                                            <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($tourChunks->count() > 1)
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
            <div class="w-full text-center py-12 text-gray-500">
                No tour packages available yet.
            </div>
        @endif
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
