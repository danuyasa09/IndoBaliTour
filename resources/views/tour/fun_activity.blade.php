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
        bgImage="https://images.unsplash.com/photo-1534008897995-27a23e859048?q=80&w=1200&auto=format&fit=crop"
        ctaText="Browse Activities"
        ctaLink="#activities"
        floatingIcon="fa-ticket"
        floatingTitle="Starting From"
        floatingPrice="Rp 350.000"
        floatingPriceUnit="/pax"
        :floatingFeatures="['Safety Equipment', 'Professional Instructor', 'Insurance Coverage']"
    />

        <!-- Activity Grid -->
        <div id="activities" class="max-w-7xl mx-auto px-4 py-16">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">Exciting & Challenging Activities in Bali</h2>
            
            @php $activityChunks = $activities->chunk(6); @endphp
            @if($activityChunks->count() > 0)
                <div x-data="{ activePage: 0, totalPages: {{ $activityChunks->count() }} }" class="relative overflow-hidden w-full">
                    <div class="flex transition-transform duration-500 ease-in-out w-full" :style="'transform: translateX(-' + (activePage * 100) + '%)'">
                        @foreach($activityChunks as $chunkIndex => $chunk)
                        <div class="w-full flex-shrink-0 px-1 pb-4">
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                @foreach($chunk as $activity)
                                <a href="{{ route('fun_activity.show', $activity->id ?? $activity->slug) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group block" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ asset('images/fun_activities/' . $activity->img) }}" alt="{{ $activity->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Activity</span>
                                    </div>
                                    
                                    <div class="p-5 flex-1 flex flex-col justify-between">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#7A0C16] transition-colors">{{ $activity->title }}</h3>
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
                        @endforeach
                    </div>
                    
                    @if($activityChunks->count() > 1)
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
                    No fun activities available yet.
                </div>
            @endif
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
