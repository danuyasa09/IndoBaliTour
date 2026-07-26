<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta nam   e="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Airport Transfer</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    
    <x-navbar />
          <x-floating_contactUs />

    <x-page-hero 
        badge="Airport Transfer"
        badgeIcon="fa-plane-arrival"
        title="Airport"
        highlight="Transfer"
        subtitle="Start your journey in Bali comfortably. On-time airport transfer service with clean fleet and professional drivers."
        bgImage="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=1200&auto=format&fit=crop"
        ctaText="Book Transfer"
        ctaLink="#transfer"
        floatingIcon="fa-plane"
        floatingTitle="Reliable Transfer"
        floatingPrice="On-Time"
        floatingPriceUnit="Guarantee"
        :floatingFeatures="['Meet & Greet Service', 'Flight Tracking', 'No Hidden Costs']"
    />

    <div class="max-w-6xl mx-auto px-4 -mt-10 md:-mt-14 relative z-10 pb-20">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#F8F9FA] border-b border-gray-100 text-[11px] font-bold uppercase tracking-wider text-gray-500">
                            <th class="py-5 px-6 md:px-10">From</th>
                            <th class="py-5 px-6">To Destination</th>
                            <th class="py-5 px-6">Estimated Time</th>
                            <th class="py-5 px-6 text-center">Price (USD)</th>
                            <th class="py-5 px-6 md:px-10 text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($airports as $airport)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">{{ $airport->start }}</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">{{ $airport->destination }}</td>
                            <td class="py-5 px-6 text-gray-500">Varies</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">Rp {{ number_format((float)$airport->price, 0, ',', '.') }}</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="https://wa.me/6281234567890?text=Hi,%20I%20want%20to%20book%20an%20airport%20transfer%20from%20{{ $airport->start }}%20to%20{{ $airport->destination }}" target="_blank" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-[#F8F9FA] px-6 py-4 md:px-10 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-xs text-gray-400">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Prices subject to change based on seasonal availability and local fuel costs.
                </div>
                <div class="flex items-center space-x-2 text-[10px] text-gray-600 font-medium">
                    <span class="bg-white border border-gray-200 px-2.5 py-1 rounded-full">Luxury SUV +$15</span>
                    <span class="bg-white border border-gray-200 px-2.5 py-1 rounded-full">Mini Van +$25</span>
                </div>
            </div>

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
