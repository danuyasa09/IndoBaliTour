<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta nam   e="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Tulis Cerita Mu di Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    
    <x-navbar />
          <x-floating_contactUs />

    <div class="relative h-[380px] md:h-[480px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/30 flex items-end pb-16 pl-4 md:pb-24 md:pl-24">
            <div class="max-w-7xl w-full mx-auto">
                <h1 class="text-white text-4xl md:text-5xl font-bold tracking-tight">Airport Transfer</h1>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 -mt-10 md:-mt-14 relative z-10 pb-20">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            
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
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Jimbaran</td>
                            <td class="py-5 px-6 text-gray-500">~20 Mins</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$10</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Uluwatu</td>
                            <td class="py-5 px-6 text-gray-500">~40 Mins</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$17</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Kuta</td>
                            <td class="py-5 px-6 text-gray-500">~30 Mins</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$14</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Seminyak</td>
                            <td class="py-5 px-6 text-gray-500">~45 Mins</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$20</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Ubud</td>
                            <td class="py-5 px-6 text-gray-500">~1.5 Hours</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$30</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Amed</td>
                            <td class="py-5 px-6 text-gray-500">~3.5 Hours</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$50</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">Nusa Dua</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">Lovina</td>
                            <td class="py-5 px-6 text-gray-500">~4 Hours</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">$57</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                                <a href="#" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>
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