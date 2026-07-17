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
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans"></body>

<div class="min-h-screen bg-white font-sans antialiased">
    
    <x-navbar />
          <x-floating_contactUs />

    <div class="relative h-[400px] md:h-[550px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <h1 class="text-white text-4xl md:text-5xl font-bold tracking-wide">Car Rental</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-10">Armada mewah dan terawat</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=400&auto=format&fit=crop" alt="Toyota Alphard" class="w-full h-48 object-cover">
                    <span class="absolute top-2 left-2 bg-[#7A0C16] text-white text-[10px] px-2 py-0.5 rounded font-semibold uppercase tracking-wider">Premium</span>
                </div>
                
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Toyota Alphard</h3>
                        <div class="flex items-center text-gray-500 text-xs mt-1.5 mb-5">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-2.533-4.65l-.221-.075.221-.074A4.125 4.125 0 0023.25 8.552c0-.65-.112-1.273-.317-1.85a9.337 9.337 0 00-4.122-.951 9.38 9.38 0 00-2.625.372M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            6 orang
                        </div>
                    </div>
                    
                    <div>
                        <div class="text-[#7A0C16] font-bold text-lg">
                            Rp 2.500.000 <span class="text-gray-400 text-xs font-normal">/12 jam</span>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-0.5 mb-4">Includes/Excludes driver & bbm</p>
                        
                        <button class="w-full bg-[#7A0C16] hover:bg-[#5a0810] text-white py-2 px-4 rounded text-sm font-medium transition-colors duration-200">
                            Booking Now
                        </button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div class="bg-gray-50 py-16 border-t border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-12">Mengapa Sewa di Indo Bali Tour?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++)
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-gray-200 rounded-full mb-5 flex items-center justify-center">
                        <span class="text-gray-400 text-xs">Icon</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Armada Terawat</h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                        Setiap kendaraan kami selalu dalam kondisi bersih, wangi, dan melewati servis rutin berkala demi keamanan berkendara.
                    </p>
                </div>
                @endfor
            </div>
        </div>
    </div>

     <x-footer />
</div>

</html>