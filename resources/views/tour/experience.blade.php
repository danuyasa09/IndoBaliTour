<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Experiences</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            html { scroll-behavior: smooth; }
        </style>
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#F4F5F7] text-slate-900 antialiased font-sans">
<div class="min-h-screen bg-[#F8F9FA] font-sans antialiased text-gray-800">
    
    <x-navbar />
          <x-floating_contactUs />
    <x-page-hero 
        badge="Experience"
        badgeIcon="fa-compass"
        title="Experiences"
        highlight="Unforgettable"
        subtitle="Explore authentic culture, stunning nature, and exciting adventures in Bali with our experienced local guides."
        bgImage="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=1200&auto=format&fit=crop"
        ctaText="Discover More"
        ctaLink="#experiences"
        floatingIcon="fa-camera"
        floatingTitle="Best Experiences"
        floatingPrice="100+"
        floatingPriceUnit="Destinations"
        :floatingFeatures="['Local Guides', 'Authentic Culture', 'Hidden Gems']"
        dividerType="hill"
    />


    <div class="bg-white py-6 border-b border-gray-100 shadow-sm" data-aos="fade-up" data-aos-delay="200">
        <div class="flex justify-center space-x-8 text-sm font-medium">
            <a href="#foto" class="text-gray-900 border-b-2 border-gray-900 pb-1">Photos</a>
            <a href="#video" class="text-gray-400 hover:text-gray-600 pb-1 transition-colors">Videos</a>
        </div>
    </div>

    <div id="foto" class="max-w-6xl mx-auto px-4 py-16 scroll-mt-24">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-3 mb-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#9B1C26] mb-2">Photo Gallery</p>
                <h2 class="text-2xl font-bold text-gray-900" data-aos="fade-up" data-aos-delay="100">Collection of your best travel moments</h2>
            </div>
            <p class="text-sm text-gray-500 max-w-xl">See the visual side of our colorful, cultural, and adventurous experiences.</p>
        </div>

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @forelse($albums as $album)
                @if($album->img && file_exists(public_path('images/' . $album->img)))
                    <div class="overflow-hidden rounded-2xl shadow-sm break-inside-avoid">
                        <img src="{{ asset('images/' . $album->img) }}" alt="{{ $album->title }}" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                @endif
                @foreach($album->fotos as $foto)
                    @if($foto->img && file_exists(public_path('images/' . $foto->img)))
                        <div class="overflow-hidden rounded-2xl shadow-sm break-inside-avoid">
                            <img src="{{ asset('images/' . $foto->img) }}" alt="{{ $album->title }}" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                @endforeach
            @empty
                <div class="text-center py-10 text-gray-500 col-span-full">
                    Belum ada foto yang ditambahkan.
                </div>
            @endforelse
        </div>
    </div>

    <div id="video" class="max-w-6xl mx-auto px-4 py-16 scroll-mt-24">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-3 mb-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#9B1C26] mb-2">Video Gallery</p>
                <h2 class="text-2xl font-bold text-gray-900" data-aos="fade-up" data-aos-delay="100">Watch the excitement of the journey in video</h2>
            </div>
            <p class="text-sm text-gray-500 max-w-xl">Explore our travel moments through these videos.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($videos as $video)
                @php
                    $ytId = '';
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?|shorts)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $video->source, $match)) {
                        $ytId = $match[1];
                    } elseif (strlen($video->source) == 11 && !str_contains($video->source, '.')) {
                        $ytId = $video->source;
                    }
                @endphp
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                    @if($ytId)
                        <iframe class="w-full h-48 object-cover" src="https://www.youtube.com/embed/{{ $ytId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        <img src="{{ Str::startsWith($video->source, 'http') ? $video->source : asset('images/' . $video->source) }}" alt="{{ $video->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $video->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ Str::limit($video->content, 100) }}</p>
                        @if($ytId)
                            <a href="https://www.youtube.com/watch?v={{ $ytId }}" target="_blank" class="inline-flex items-center text-sm font-semibold text-[#9B1C26] hover:text-[#7A151D]">Watch on YouTube</a>
                        @else
                            <a href="{{ $video->source }}" target="_blank" class="inline-flex items-center text-sm font-semibold text-[#9B1C26] hover:text-[#7A151D]">Watch Video</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500">
                    Belum ada video yang ditambahkan.
                </div>
            @endforelse
        </div>

        @if($short_videos->count() > 0)
        <div class="mt-16 pt-12 border-t border-gray-200">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-3 mb-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900" data-aos="fade-up" data-aos-delay="100">Shorts</h3>
                </div>
                <p class="text-sm text-gray-500 max-w-xl">Bite-sized vertical videos showcasing the best highlights of our tours.</p>
            </div>
    
            <div x-data="{ 
                    isDown: false, 
                    startX: 0, 
                    scrollLeft: 0,
                    mousedown(e) { 
                        this.isDown = true; 
                        this.startX = e.pageX - this.$refs.slider.offsetLeft; 
                        this.scrollLeft = this.$refs.slider.scrollLeft; 
                    },
                    mouseleave() { 
                        this.isDown = false; 
                    },
                    mouseup() { 
                        this.isDown = false; 
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
                
                <div x-ref="slider"
                     @mousedown="mousedown"
                     @mouseleave="mouseleave"
                     @mouseup="mouseup"
                     @mousemove="mousemove"
                     class="flex gap-6 overflow-x-auto hide-scroll cursor-grab active:cursor-grabbing w-full pb-4 px-1"
                     style="scrollbar-width: none; -ms-overflow-style: none;">
                     
                    @foreach($short_videos as $video)
                        @php
                            $ytId = '';
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?|shorts)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $video->source, $match)) {
                                $ytId = $match[1];
                            } elseif (strlen($video->source) == 11 && !str_contains($video->source, '.')) {
                                $ytId = $video->source;
                            }
                        @endphp
                        <div class="w-[200px] sm:w-[240px] flex-shrink-0 overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="200">
                            @if($ytId)
                                <iframe class="w-full aspect-[9/16] object-cover bg-black" src="https://www.youtube.com/embed/{{ $ytId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                                <img src="{{ Str::startsWith($video->source, 'http') ? $video->source : asset('images/' . $video->source) }}" alt="{{ $video->title }}" class="w-full aspect-[9/16] object-cover bg-black">
                            @endif
                            <div class="p-4 flex flex-col flex-grow justify-between select-none">
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1 line-clamp-1" title="{{ $video->title }}">{{ $video->title }}</h3>
                                    <p class="text-xs text-gray-500 mb-3 line-clamp-2" title="{{ $video->content }}">{{ $video->content }}</p>
                                </div>
                                @if($ytId)
                                    <a href="https://www.youtube.com/watch?v={{ $ytId }}" target="_blank" class="inline-flex items-center text-xs font-semibold text-[#9B1C26] hover:text-[#7A151D] mt-auto">Watch on YouTube <i class="fa-solid fa-arrow-right ml-1"></i></a>
                                @else
                                    <a href="{{ $video->source }}" target="_blank" class="inline-flex items-center text-xs font-semibold text-[#9B1C26] hover:text-[#7A151D] mt-auto">Watch Video <i class="fa-solid fa-arrow-right ml-1"></i></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="bg-white py-16 border-t border-gray-100" data-aos="fade-up" data-aos-delay="200">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">What they say</h2>
            
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
                                    <div class="flex space-x-1 text-amber-400 mb-4 text-lg">
                                        @for($i = 0; $i < $testimony->rating; $i++)
                                            <span>★</span>
                                        @endfor
                                        @for($i = $testimony->rating; $i < 5; $i++)
                                            <span class="text-gray-300">★</span>
                                        @endfor
                                    </div>
                                    <p class="text-gray-600 text-sm italic leading-relaxed line-clamp-4 pointer-events-none">
                                        "{{ $testimony->message }}"
                                    </p>
                                </div>
                                <div class="flex items-center space-x-3 pt-6 mt-6 border-t border-gray-50 pointer-events-none">
                                    @if($testimony->photo)
                                        <img src="{{ asset('storage/' . $testimony->photo) }}" alt="{{ $testimony->name }}" class="h-10 w-10 rounded-full object-cover">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-zinc-800 flex items-center justify-center text-white font-bold text-sm uppercase flex-shrink-0">
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
                        No testimonials yet.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-cta adventureLink="{{ route('contact') }}" />
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
