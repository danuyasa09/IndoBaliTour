<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Blogs &amp; News</title>
        <meta name="description" content="Discover travel tips, cultural stories, and the best destination recommendations from our local guides.">
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
        <x-navbar />
        <x-floating_contactUs />

        {{-- Hero Section --}}
        <x-page-hero
            badge="News &amp; Blogs"
            badgeIcon="fa-newspaper"
            title="Blogs &amp;"
            highlight="News"
            subtitle="Discover travel tips, cultural stories, and the best destination recommendations from our local guides."
            bgImage="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop"
            dividerType="hill"
        />

        {{-- Blog Slider Section --}}
        <section class="py-16 sm:py-20 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center max-w-2xl mx-auto mb-10" data-aos="fade-up">
                    <h2 class="text-3xl font-extrabold text-gray-900">Latest Articles</h2>
                    <div class="w-20 h-1 bg-brand-red mx-auto mt-4 rounded-full"></div>
                    <p class="text-gray-500 text-sm mt-3">Stay updated with our latest travel stories, tips & insights from Bali.</p>
                </div>

                {{-- Slider wrapper --}}
                <div x-data="{ activePage: 0, totalPages: {{ isset($blogChunks) ? $blogChunks->count() : 1 }} }" class="relative overflow-hidden w-full">

                    {{-- Slides container --}}
                    <div class="flex transition-transform duration-500 ease-in-out w-full"
                         :style="'transform: translateX(-' + (activePage * 100) + '%)'">

                        @forelse($blogChunks as $chunkIndex => $chunk)
                        <div class="w-full flex-shrink-0 px-1 pb-4">
                            {{-- Desktop: 3x3 grid | Mobile: single column, 9 cards tampil semua --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($chunk as $item)
                                <article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1 flex flex-col"
                                         data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">

                                    {{-- Thumbnail --}}
                                    <div class="relative overflow-hidden h-48 bg-gray-100 flex-shrink-0">
                                        <img
                                            src="{{ isset($item->img_url) ? $item->img_url : ($item->img ? asset('images/blogs/' . $item->img) : 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=600&auto=format&fit=crop') }}"
                                            alt="{{ $item->title }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            loading="lazy">
                                        {{-- Date badge --}}
                                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-gray-600 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow-sm">
                                            {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="p-5 flex flex-col flex-1 justify-between">
                                        <div>
                                            <div class="flex items-center gap-2 text-[10px] text-brand-red font-bold uppercase tracking-wider mb-2">
                                                <i class="fa-solid fa-newspaper text-[8px]"></i>
                                                <span>News &amp; Tips</span>
                                            </div>
                                            <h3 class="text-base font-bold text-gray-900 leading-snug mb-2 group-hover:text-brand-red transition-colors line-clamp-2">
                                                {{ $item->title }}
                                            </h3>
                                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                                            </p>
                                        </div>

                                        <a href="{{ route('blog.show', $item->slug) }}"
                                           class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-brand-red hover:text-red-800 transition-colors">
                                            Read More
                                            <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                                        </a>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        <div class="w-full text-center py-16 text-gray-400">
                            <i class="fa-solid fa-newspaper text-5xl mb-4 text-gray-200"></i>
                            <p class="text-sm">Belum ada artikel tersedia.</p>
                        </div>
                        @endforelse
                    </div>

                    {{-- Slider Controls (persis seperti halaman Team & Transfer) --}}
                    <div class="mt-10 flex justify-center items-center gap-2">
                        <button
                            @click="activePage = Math.max(0, activePage - 1)"
                            :disabled="activePage === 0"
                            class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            aria-label="Previous Page">
                            <i class="fa-solid fa-chevron-left text-xs"></i>
                        </button>

                        <template x-for="i in Math.max(1, totalPages)" :key="i">
                            <button
                                @click="activePage = i - 1"
                                :class="activePage === (i - 1) ? 'bg-[#7A0C16] text-white border-[#7A0C16]' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50'"
                                class="w-8 h-8 rounded-full flex items-center justify-center border text-xs font-medium transition-colors"
                                x-text="i">
                            </button>
                        </template>

                        <button
                            @click="activePage = Math.min(Math.max(0, totalPages - 1), activePage + 1)"
                            :disabled="activePage >= Math.max(0, totalPages - 1)"
                            class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            aria-label="Next Page">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>

                </div>
            </div>
        </section>

        <x-cta />
        <x-footer />

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ once: true, duration: 700, offset: 80 });
        </script>
    </body>
</html>
