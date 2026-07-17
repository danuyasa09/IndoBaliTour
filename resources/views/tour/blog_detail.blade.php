<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | {{ $blog['title'] }}</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- FontAwesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
        <x-navbar />
        <x-floating_contactUs />    

        <!-- Blog Hero Section -->
        <div class="relative h-[350px] md:h-[480px] w-full bg-cover bg-center" style="background-image: url('{{ $blog['image'] }}');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/45 to-black/20 flex items-end">
                <div class="max-w-7xl mx-auto px-4 w-full pb-10 md:pb-16">
                    <div class="max-w-3xl">
                        <!-- Breadcrumbs -->
                        <div class="flex items-center space-x-2 text-xs text-gray-300 mb-4 font-medium uppercase tracking-wider">
                            <a href="{{ route('tour.index') }}" class="hover:text-white transition-colors">Home</a>
                            <span>/</span>
                            <a href="{{ route('blog_event') }}" class="hover:text-white transition-colors">Blogs</a>
                            <span>/</span>
                            <span class="text-white truncate max-w-[200px]">{{ $blog['category'] }}</span>
                        </div>

                        <!-- Blog Title & Metadata -->
                        <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                            {{ $blog['title'] }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 text-xs md:text-sm text-gray-300">
                            <div class="flex items-center space-x-2">
                                <span class="bg-brand-red text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                                    {{ $blog['category'] }}
                                </span>
                            </div>
                            <span class="hidden md:inline text-gray-500">•</span>
                            <div class="flex items-center space-x-1.5">
                                <i class="fa-regular fa-calendar text-xs"></i>
                                <span>{{ $blog['date'] }}</span>
                            </div>
                            <span>•</span>
                            <div class="flex items-center space-x-1.5">
                                <i class="fa-regular fa-user text-xs"></i>
                                <span>Oleh {{ $blog['author'] }}</span>
                            </div>
                            <span>•</span>
                            <div class="flex items-center space-x-1.5">
                                <i class="fa-regular fa-clock text-xs"></i>
                                <span>{{ $blog['read_time'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-4 py-12 md:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Left Column: Blog Content -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 md:p-10 mb-8">
                        <!-- Content render -->
                        <div class="prose max-w-none text-gray-600 text-sm leading-relaxed space-y-6">
                            {!! $blog['content'] !!}
                        </div>

                        <!-- Share Section -->
                        <div class="border-t border-gray-100 mt-10 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Bagikan Artikel Ini:</span>
                            <div class="flex items-center space-x-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-blue-50 hover:bg-blue-100 text-blue-600 flex items-center justify-center transition-colors text-sm">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog['title']) }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-sky-50 hover:bg-sky-100 text-sky-500 flex items-center justify-center transition-colors text-sm">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($blog['title'] . ' - ' . request()->url()) }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-green-50 hover:bg-green-100 text-green-600 flex items-center justify-center transition-colors text-sm">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject={{ rawurlencode($blog['title']) }}&body={{ rawurlencode(request()->url()) }}" class="w-8 h-8 rounded-full bg-gray-50 hover:bg-gray-100 text-gray-600 flex items-center justify-center transition-colors text-sm">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Back Navigation Button -->
                    <div class="mb-10 lg:mb-0">
                        <a href="{{ route('blog_event') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-brand-red hover:text-brand-dark-red transition-colors group">
                            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                            <span>Kembali ke Blogs & News</span>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="space-y-8">
                    <!-- WhatsApp Call to Action Card -->
                    <div class="bg-gradient-to-br from-brand-red to-brand-dark-red text-white rounded-2xl p-8 shadow-md relative overflow-hidden group">
                        <div class="absolute -right-8 -bottom-8 opacity-10 text-9xl transform -rotate-12 transition-transform duration-500 group-hover:scale-110">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-3">Rencanakan Liburan Anda Sekarang!</h3>
                        <p class="text-xs text-white/80 leading-relaxed mb-6">
                            Konsultasikan rencana perjalanan Anda secara gratis dengan tim berpengalaman kami. Dapatkan penawaran harga terbaik untuk petualangan seru Anda di Bali.
                        </p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center w-full bg-white hover:bg-gray-50 text-brand-red font-bold text-xs py-3.5 px-6 rounded-xl transition-colors shadow-sm">
                            <i class="fa-brands fa-whatsapp text-sm mr-2"></i> Hubungi Kami
                        </a>
                    </div>

                    <!-- Recommended Blogs -->
                    @if(count($otherBlogs) > 0)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-sm font-extrabold text-gray-900 uppercase tracking-wider mb-5 pb-3 border-b border-gray-50">
                            Artikel Rekomendasi
                        </h3>
                        <div class="space-y-5">
                            @foreach($otherBlogs as $otherSlug => $otherItem)
                            <a href="{{ route('blog.show', $otherSlug) }}" class="flex items-start space-x-3 group block">
                                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100">
                                    <img src="{{ $otherItem['image'] }}" alt="{{ $otherItem['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="block text-[9px] font-bold text-brand-red uppercase tracking-wider mb-1">
                                        {{ $otherItem['category'] }}
                                    </span>
                                    <h4 class="text-xs font-bold text-gray-900 group-hover:text-brand-red transition-colors line-clamp-2 leading-snug">
                                        {{ $otherItem['title'] }}
                                    </h4>
                                    <span class="block text-[9px] text-gray-400 mt-1">
                                        {{ $otherItem['date'] }}
                                    </span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <x-footer />
    </body>
</html>
