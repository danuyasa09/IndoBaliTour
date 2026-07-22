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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body x-data="{ isModalOpen: false }" class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    
    <x-navbar />
          <x-floating_contactUs />

    <div class="relative h-[380px] md:h-[480px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/30 flex items-end pb-16 pl-4 md:pb-24 md:pl-24">
            <div class="max-w-7xl w-full mx-auto">
                <h1 class="text-white text-4xl md:text-5xl font-bold tracking-tight">Hotel Transfer</h1>
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
                            <th class="py-5 px-6 text-center">Price (USD)</th>
                            <th class="py-5 px-6 md:px-10 text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($transfers as $transfer)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-5 px-6 md:px-10 text-gray-400 font-medium">{{ $transfer->start }}</td>
                            <td class="py-5 px-6 font-bold text-gray-900 text-base">{{ $transfer->destination }}</td>
                            <td class="py-5 px-6 text-center font-bold text-lg text-[#9B1C26]">${{ number_format($transfer->price, 0) }}</td>
                            <td class="py-5 px-6 md:px-10 text-center">
                               <a href="#" @click.prevent="isModalOpen = true" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-5 px-6 text-center text-gray-500 font-medium">No transfer data available at the moment.</td>
                        </tr>
                        @endforelse
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

  <div x-show="isModalOpen" style="display: none;" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div x-show="isModalOpen" 
         x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
         class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            
            <div x-show="isModalOpen" @click.away="isModalOpen = false"
                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl border border-gray-100">
                
                <div class="bg-white px-6 py-5 border-b border-gray-100 flex justify-between items-center sticky top-0 z-10">
                    <div class="flex items-center gap-3">
                        <div class="bg-[#9B1C26]/10 p-2.5 rounded-lg text-[#9B1C26]">
                            <i class="fa-solid fa-car-side text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900" id="modal-title">Hotel Transfer Booking</h3>
                            <p class="text-xs text-gray-500 mt-0.5">Please fill in your details to secure your ride.</p>
                        </div>
                    </div>
                    <button @click="isModalOpen = false" type="button" class="text-gray-400 hover:text-gray-600 bg-gray-50 hover:bg-gray-100 rounded-full p-2 transition-colors duration-200">
                        <i class="fa-solid fa-xmark text-lg w-5 h-5 flex items-center justify-center"></i>
                    </button>
                </div>

                <form action="#" method="POST" class="bg-gray-50/30">
                    <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                        
                        <h4 class="text-sm font-bold text-[#9B1C26] uppercase tracking-wider mb-4"><i class="fa-regular fa-id-card mr-2"></i>Contact Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-regular fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text" name="full_name" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="John Doe">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-regular fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" name="email" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="john@example.com">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone / WhatsApp</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-brands fa-whatsapp text-green-500"></i>
                                    </div>
                                    <input type="tel" name="phone" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="+62 812 3456 7890">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Total Person</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-user-group text-gray-400"></i>
                                    </div>
                                    <input type="number" name="total_person" min="1" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="e.g. 2">
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-200 mb-6">

                        <h4 class="text-sm font-bold text-[#9B1C26] uppercase tracking-wider mb-4"><i class="fa-solid fa-map-location-dot mr-2"></i>Transfer Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pick-up Location</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-hotel text-gray-400"></i>
                                    </div>
                                    <input type="text" name="current_hotel" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="Your current hotel name">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Drop-off Location</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-location-dot text-[#9B1C26]/70"></i>
                                    </div>
                                    <input type="text" name="to_hotel" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none" placeholder="Destination hotel name">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Date of Transfer</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-regular fa-calendar text-gray-400"></i>
                                    </div>
                                    <input type="date" name="transfer_date" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pick-up Time</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fa-regular fa-clock text-gray-400"></i>
                                    </div>
                                    <input type="time" name="pickup_time" required class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Special Request <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                                    <i class="fa-regular fa-comment-dots text-gray-400"></i>
                                </div>
                                <textarea name="special_request" rows="3" class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#9B1C26]/20 focus:border-[#9B1C26] text-sm text-gray-900 transition-all outline-none resize-none" placeholder="Any specific needs? (e.g. Baby seat, lots of luggage)"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="bg-white px-6 py-5 border-t border-gray-100 flex items-center justify-between sticky bottom-0 z-10 rounded-b-2xl">
                        <div class="hidden sm:flex items-center text-xs text-gray-500">
                            <i class="fa-solid fa-shield-halved mr-1.5 text-green-600"></i> Safe & Secure Booking
                        </div>
                        <button type="submit" class="w-full sm:w-auto bg-[#9B1C26] hover:bg-[#7A151D] text-white font-semibold py-3 px-8 rounded-xl shadow-lg shadow-[#9B1C26]/30 transition-all duration-200 flex items-center justify-center text-sm">
                            Confirm Booking <i class="fa-solid fa-arrow-right-long ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <x-footer />
</div>