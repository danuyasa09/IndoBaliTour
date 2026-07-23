<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Tulis Cerita Mu di Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    <x-navbar />

    <div class="relative h-[400px] md:h-[550px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center px-4 text-center">
            <h1 class="text-white text-4xl md:text-5xl font-bold tracking-wide mb-4" data-aos="fade-up">Paket Tour Eksklusif Bali</h1>
            
            <p class="text-gray-200 text-sm md:text-base max-w-2xl mb-8">Tulis ceritamu di Bali dengan pilihan paket liburan tanpa ribet. Nikmati momen terbaik dari wisata budaya hingga alam bersama orang tersayang.</p>
        
        </div>
    </div>

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
                            <span>{{ $tour->date ?? '3 Hari 2 Malam' }}</span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-2 leading-snug" data-aos="fade-up" data-aos-delay="150">
                            {{ $tour->title }}
                        </h3>

                        <div class="text-[12px] text-gray-500 mb-6 line-clamp-3">
                            {!! $tour->short ?? 'Paket liburan menarik dengan berbagai destinasi wisata pilihan di Bali.' !!}
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 flex items-end justify-between">
                        <div>
                            <span class="block text-[9px] text-gray-400 uppercase font-bold tracking-wider">Mulai Dari</span>
                            <span class="text-sm font-bold text-[#7A0C16]">
                                @if(is_numeric($tour->harga))
                                    RP {{ number_format($tour->harga, 0, ',', '.') }}
                                @else
                                    {{ $tour->harga ?? 'Hubungi Kami' }}
                                @endif
                            </span>
                        </div>
                        
                        <a href="{{ route('detail') }}" class="flex items-center space-x-1 text-[11px] font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors pb-0.5">
                            <span class="uppercase tracking-wider">Lihat Detail</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-12 text-gray-500">
                Belum ada paket tour tersedia.
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
