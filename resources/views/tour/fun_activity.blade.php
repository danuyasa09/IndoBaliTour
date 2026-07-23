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

        <!-- Hero Section -->
        <div class="relative h-[400px] md:h-[550px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1530866495561-507c9faab2ed?q=80&w=1200&auto=format&fit=crop');">
            <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center px-4 text-center">
                <h1 class="text-white text-4xl md:text-5xl font-bold tracking-wide mb-4" data-aos="fade-up">Fun Activities</h1>
                <p class="text-gray-200 text-sm md:text-base max-w-2xl mb-8">Temukan petualangan tak terlupakan di Bali. Dari rafting mendebarkan hingga menikmati indahnya pantai.</p>
            </div>
        </div>

        <!-- Activity Grid -->
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10" data-aos="fade-up" data-aos-delay="100">Aktivitas Seru & Menantang di Bali</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($activities as $activity)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/' . $activity->img) }}" alt="{{ $activity->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Aktivitas</span>
                    </div>
                    
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900" data-aos="fade-up" data-aos-delay="150">{{ $activity->title }}</h3>
                            <p class="text-gray-500 text-xs mt-2 mb-4 leading-relaxed">
                                {!! \Illuminate\Support\Str::limit(strip_tags($activity->description), 100) !!}
                            </p>
                        </div>
                        
                        <div>
                            <div class="text-[#7A0C16] font-bold text-lg mb-4">
                                Rp {{ number_format((float)$activity->price, 0, ',', '.') }} <span class="text-gray-400 text-xs font-normal">/pax</span>
                            </div>
                            <button class="w-full bg-[#7A0C16] hover:bg-[#5a0810] text-white py-2 px-4 rounded text-sm font-medium transition-colors duration-200">
                                Booking Now
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="bg-gray-50 py-16 border-t border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-12" data-aos="fade-up" data-aos-delay="100">Ketentuan & Fasilitas</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🛡️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Asuransi Penuh</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            Semua aktivitas dilengkapi dengan jaminan asuransi keselamatan penuh demi kenyamanan petualangan Anda.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🍽️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Makan Siang</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            Sebagian besar paket aktivitas kami sudah termasuk makan siang prasmanan yang lezat dan higienis.
                        </p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-red-50 rounded-full mb-5 flex items-center justify-center text-brand-red font-bold text-xl">🚗</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3" data-aos="fade-up" data-aos-delay="150">Antar Jemput Hotel</h3>
                        <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                            Layanan antar-jemput dari dan ke hotel tempat Anda menginap dengan armada mobil kami yang nyaman.
                        </p>
                    </div>
                </div>
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
