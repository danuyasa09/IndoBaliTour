
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Hubungi Kami</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#F4F5F7] text-slate-900 antialiased font-sans">
<div class="min-h-screen bg-[#F8F9FA] font-sans antialiased text-gray-800">
    
    <x-navbar />

    <div class="relative h-[450px] md:h-[600px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/30 flex items-center pl-6 md:pl-24">
            <div class="max-w-3xl">
                <h1 class="text-white text-4xl md:text-5xl font-bold tracking-tight mb-6 leading-tight">
                    Pengalaman Tak<br>Terlupakan
                </h1>
                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-sm font-semibold px-6 py-3 rounded transition-colors duration-200">
                    Book Your Tour
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white py-6 border-b border-gray-100 shadow-sm">
        <div class="flex justify-center space-x-8 text-sm font-medium">
            <a href="#" class="text-gray-900 border-b-2 border-gray-900 pb-1">Foto</a>
            <a href="#" class="text-gray-400 hover:text-gray-600 pb-1 transition-colors">Video</a>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-6">
                <div class="overflow-hidden rounded-2xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?q=80&w=600&auto=format&fit=crop" alt="Mount Batur Sunrise" class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="overflow-hidden rounded-2xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1544644181-1484b3fdfc62?q=80&w=600&auto=format&fit=crop" alt="Rafting" class="w-full h-[340px] object-cover hover:scale-105 transition-transform duration-300">
                </div>
            </div>

            <div class="space-y-6">
                <div class="overflow-hidden rounded-2xl shadow-sm">
                    <img src="https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?q=80&w=600&auto=format&fit=crop" alt="Floating Breakfast" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="overflow-hidden rounded-2xl shadow-sm">
                        <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ca1?q=80&w=400&auto=format&fit=crop" alt="Balinese Dancer" class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="overflow-hidden rounded-2xl shadow-sm">
                        <img src="https://images.unsplash.com/photo-1573843981267-be1999ff37cd?q=80&w=400&auto=format&fit=crop" alt="Canang Sari" class="w-full h-56 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-white py-16 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-10">Apa kata mereka</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @for ($i = 0; $i < 3; $i++)
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex space-x-1 text-amber-400 mb-4 text-xs">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-xs text-gray-500 italic leading-relaxed mb-6">
                            "The cultural depth they provided was amazing. We weren't just tourists, we felt like honored guests. The itinerary was perfectly balanced between activity and relaxation."
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-black flex-shrink-0"></div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">I MADE DANUYASA</h4>
                            <p class="text-[10px] text-gray-400">Indonesia</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="bg-[#EAEAEA] rounded-2xl p-10 md:p-14 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Siap Menulis Cerita Anda Sendiri ?</h2>
            <p class="text-xs md:text-sm text-gray-500 mb-8 max-w-xl mx-auto">
                Konsultasikan perjalanan impian Anda dengan pakar lokal kami dan buat setiap momen berharga.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#" class="w-full sm:w-auto bg-[#7A0C16] hover:bg-[#5a0810] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Mulai petualangan anda
                </a>
                <a href="#" class="w-full sm:w-auto bg-[#333333] hover:bg-[#222222] text-white text-xs font-medium px-6 py-3 rounded transition-colors duration-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-[#151515] text-gray-400 pt-16 pb-6 text-xs">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Indo Bali Tour</h3>
                <p class="leading-relaxed mb-4 text-gray-400">
                    Pengalaman perjalanan eksklusif yang dirancang khusus untuk Anda yang menghargai keindahan dan profesionalisme.
                </p>
                <div class="flex space-x-3 mt-2">
                    <a href="#" class="h-6 w-6 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors">
                        <i class="fa-brands fa-instagram text-[10px]"></i>
                    </a>
                    <a href="#" class="h-6 w-6 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors">
                        <i class="fa-brands fa-facebook-f text-[10px]"></i>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Layanan</h4>
                <ul class="space-y-2.5">
                    <li><a href="#" class="hover:text-white transition-colors">Paket Tur</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Aktivitas Seru</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Sewa Mobil</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Antar Jemput Bandara</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Antar Jemput Hotel</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Support</h4>
                <ul class="space-y-2.5">
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Partner With Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Perusahaan</h4>
                <ul class="space-y-2.5 mb-4">
                    <li><a href="#" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                </ul>
                <div class="flex space-x-2">
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-globe text-[10px]"></i></span>
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-share-nodes text-[10px]"></i></span>
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-envelope text-[10px]"></i></span>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4 pt-6 border-t border-gray-800 text-center text-gray-500 text-[11px]">
            © 2024 Indo Bali Tour. Exotic Professionalism. All rights reserved.
        </div>
    </footer>

</div>