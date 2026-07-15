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
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    <x-navbar />

    <div class="relative h-[450px] md:h-[550px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/40 flex items-center pl-6 md:pl-24">
            <div class="max-w-3xl">
                <h1 class="text-white text-4xl md:text-5xl font-bold tracking-tight mb-6 leading-tight">
                    Paket Tour Eksklusif<br>Bali
                </h1>
                <a href="#" class="inline-block bg-[#7A0C16] hover:bg-[#5A0810] text-white text-sm font-semibold px-6 py-3 rounded transition-colors duration-200">
                    Book Your Tour
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @for ($i = 0; $i < 4; $i++)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group">
                
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=500&auto=format&fit=crop" alt="Bali Cultural Heritage" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-1.5 text-gray-400 text-[10px] font-semibold uppercase tracking-wider mb-2">
                            <i class="fa-regular fa-clock text-xs"></i>
                            <span>3 Hari 2 Malam</span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-4 leading-snug">
                            Bali Cultural<br>Heritage
                        </h3>

                        <ul class="space-y-2 mb-6">
                            <li class="flex items-start space-x-2 text-[11px] text-gray-500 font-medium">
                                <span class="text-[#7A0C16] mt-0.5"><i class="fa-regular fa-circle-check"></i></span>
                                <span>Pura Uluwatu dan kecak</span>
                            </li>
                            <li class="flex items-start space-x-2 text-[11px] text-gray-500 font-medium">
                                <span class="text-[#7A0C16] mt-0.5"><i class="fa-regular fa-circle-check"></i></span>
                                <span>Pura Uluwatu dan kecak</span>
                            </li>
                            <li class="flex items-start space-x-2 text-[11px] text-gray-500 font-medium">
                                <span class="text-[#7A0C16] mt-0.5"><i class="fa-regular fa-circle-check"></i></span>
                                <span>Pura Uluwatu dan kecak</span>
                            </li>
                        </ul>
                    </div>

                    <div class="border-t border-gray-100 pt-4 flex items-end justify-between">
                        <div>
                            <span class="block text-[9px] text-gray-400 uppercase font-bold tracking-wider">Mulai Dari</span>
                            <span class="text-sm font-bold text-[#7A0C16]">RP 2.500.000</span>
                        </div>
                        
                        <a href="#" class="flex items-center space-x-1 text-[11px] font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors pb-0.5">
                            <span class="uppercase tracking-wider">Lihat Detail</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
            @endfor

        </div>
    </div>
    <x-footer />    
</div>