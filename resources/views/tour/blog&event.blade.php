<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Blogs & News</title>
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

        <!-- Hero Section -->
        <x-page-hero 
            badge="News & Blogs"
            badgeIcon="fa-newspaper"
            title="Blogs &"
            highlight="News"
            subtitle="Discover travel tips, cultural stories, and the best destination recommendations from our local guides."
            bgImage="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop"
            dividerType="hill"
        />

        <!-- Blog Grid -->
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($blogs as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden h-48">
                        <img src="{{ $item->img ? asset('images/blogs/' . $item->img) : 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=600&auto=format&fit=crop' }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 text-[10px] text-gray-400 font-semibold mb-3">
                                <span class="uppercase tracking-wider">NEWS</span>
                                <span>•</span>
                                <span>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-red transition-colors" data-aos="fade-up" data-aos-delay="150">
                                {{ $item->title }}
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}
                            </p>
                        </div>
                        
                        <a href="{{ route('blog.show', $item->slug) }}" class="inline-flex items-center text-xs font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors">
                            Read More <span class="ml-1">&rarr;</span>
                        </a>
                    </div>
                </div>
                @endforeach
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
