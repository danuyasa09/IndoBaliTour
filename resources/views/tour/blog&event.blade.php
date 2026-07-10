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
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
        <x-navbar />

        <!-- Hero Section -->
        <div class="relative h-[400px] md:h-[550px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h1 class="text-4xl md:text-5xl font-bold tracking-wide mb-4">Blogs & News</h1>
                    <p class="text-sm md:text-base text-gray-200 max-w-md mx-auto">
                        Temukan tips perjalanan, cerita budaya, dan rekomendasi destinasi terbaik dari pemandu lokal kami.
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=600&auto=format&fit=crop" alt="Hidden Beaches in Bali" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 text-[10px] text-gray-400 font-semibold mb-3">
                                <span>TRAVEL TIPS</span>
                                <span>•</span>
                                <span>10 Juli 2026</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-red transition-colors">
                                5 Pantai Tersembunyi di Bali Selatan yang Wajib Dikunjungi
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed mb-4">
                                Bosan dengan pantai yang ramai? Temukan pantai pasir putih tersembunyi di balik tebing Pecatu yang masih sangat alami.
                            </p>
                        </div>
                        
                        <a href="#" class="inline-flex items-center text-xs font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors">
                            Baca Selengkapnya <span class="ml-1">&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Blog 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1540959733332-eab4deceeaf7?q=80&w=600&auto=format&fit=crop" alt="Nyepi in Bali" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 text-[10px] text-gray-400 font-semibold mb-3">
                                <span>CULTURE</span>
                                <span>•</span>
                                <span>8 Juli 2026</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-red transition-colors">
                                Panduan Lengkap Menghadiri Hari Raya Nyepi di Bali
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed mb-4">
                                Pahami aturan, makna spiritual, dan apa saja yang boleh serta tidak boleh dilakukan wisatawan saat pulau Bali hening total.
                            </p>
                        </div>
                        
                        <a href="#" class="inline-flex items-center text-xs font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors">
                            Baca Selengkapnya <span class="ml-1">&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Blog 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1589308078059-be1415eab4c3?q=80&w=600&auto=format&fit=crop" alt="Balinese Food" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-2 text-[10px] text-gray-400 font-semibold mb-3">
                                <span>CULINARY</span>
                                <span>•</span>
                                <span>5 Juli 2026</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-brand-red transition-colors">
                                Kuliner Tradisional Bali Selain Bebek yang Menggugah Selera
                            </h3>
                            <p class="text-gray-500 text-xs leading-relaxed mb-4">
                                Dari Nasi Ayam Kedewatan hingga Sate Lilit autentik, inilah rekomendasi kuliner wajib coba di warung lokal Bali.
                            </p>
                        </div>
                        
                        <a href="#" class="inline-flex items-center text-xs font-bold text-[#7A0C16] hover:text-[#5A0810] transition-colors">
                            Baca Selengkapnya <span class="ml-1">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="bg-gray-50 py-16 border-t border-b border-gray-100">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Dapatkan Informasi Promosi & Tips Menarik</h2>
                <p class="text-xs text-gray-500 mb-8 max-w-md mx-auto">
                    Berlangganan buletin mingguan kami untuk panduan liburan terlengkap ke Bali langsung di email Anda.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-3">
                    <input type="email" placeholder="Alamat Email Anda" class="w-full sm:w-80 px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-red">
                    <button class="w-full sm:w-auto bg-[#7A0C16] hover:bg-[#5a0810] text-white py-3 px-6 rounded-lg text-sm font-semibold transition-colors duration-200">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-[#151515] text-gray-400 pt-16 pb-6 text-xs">
            <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Indo Bali Tour</h3>
                    <p class="leading-relaxed mb-4 text-gray-400">
                        Pengalaman perjalanan eksklusif yang dirancang khusus untuk Anda yang menghargai keindahan dan profesionalisme.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Layanan</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('package_tour') }}" class="hover:text-white transition-colors">Paket Tur</a></li>
                        <li><a href="{{ route('fun_activity') }}" class="hover:text-white transition-colors">Aktivitas Seru</a></li>
                        <li><a href="{{ route('car_rental') }}" class="hover:text-white transition-colors">Rental Mobil</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Dukungan</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="hover:text-white transition-colors">Bantuan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Hubungi Kami</h4>
                    <p class="leading-relaxed mb-2 text-gray-400">📍 Jl. Sunset Road No. 888, Seminyak, Kuta, Bali</p>
                    <p class="leading-relaxed mb-2 text-gray-400">📞 +62 812-3456-7890</p>
                    <p class="leading-relaxed text-gray-400">✉️ info@indobalitour.com</p>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 pt-8 border-t border-zinc-800 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} Indo Bali Tour. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
