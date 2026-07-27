<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Primary Meta Tags -->
        <title>Indo Bali Tour | Hotel Transfer</title>
        <meta name="title" content="Indo Bali Tour | Hotel Transfer">
        <meta name="description" content="Seamless and comfortable hotel transfer services in Bali. We offer reliable point-to-point transportation with professional drivers.">
        <meta name="keywords" content="Bali hotel transfer, Bali transportation, private driver Bali, hotel pickup Bali">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Indo Bali Tour | Hotel Transfer">
        <meta property="og:description" content="Seamless and comfortable hotel transfer services in Bali. We offer reliable point-to-point transportation with professional drivers.">
        <meta property="og:image" content="{{ asset('images/logo.png') }}">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="Indo Bali Tour | Hotel Transfer">
        <meta property="twitter:description" content="Seamless and comfortable hotel transfer services in Bali. We offer reliable point-to-point transportation with professional drivers.">
        <meta property="twitter:image" content="{{ asset('images/logo.png') }}">
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- Summernote CSS -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    </head>
    <body x-data="{ isModalOpen: false, selectedStart: '', selectedDest: '' }" class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">
    
    <x-navbar />
          <x-floating_contactUs />

    <x-page-hero 
        badge="Hotel Transfer"
        badgeIcon="fa-hotel"
        title="Hotel"
        highlight="Transfer"
        subtitle="Transfer between hotels or areas in Bali stress-free. We serve inter-destination transfers with maximum comfort."
        bgImage="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200&auto=format&fit=crop"
        ctaText="Book Transfer"
        ctaLink="#transfer"
        floatingIcon="fa-map-pin"
        floatingTitle="Anywhere in Bali"
        floatingPrice="Door-to-Door"
        floatingPriceUnit="Service"
        :floatingFeatures="['Direct Hotel Transfer', 'Spacious Vehicles', 'Fixed Pricing']"
    />

    <div id="transfer" class="max-w-6xl mx-auto px-4 -mt-10 md:-mt-14 relative z-30 pb-20">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            
            <div class="overflow-x-auto hidden md:block">
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
                               <a href="#" @click.prevent="selectedStart = '{{ $transfer->start }}'; selectedDest = '{{ $transfer->destination }}'; isModalOpen = true" class="inline-block bg-[#9B1C26] hover:bg-[#7A151D] text-white text-xs font-semibold px-5 py-2.5 rounded transition-colors duration-200">Booking Form</a>
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

            <!-- Mobile Card View -->
            <div class="grid grid-cols-1 gap-4 p-4 bg-gray-50 md:hidden">
                @forelse($transfers as $transfer)
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5 flex flex-col gap-3 relative">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">From</p>
                            <p class="font-medium text-gray-600 text-sm">{{ $transfer->start }}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">Price</p>
                            <p class="font-bold text-xl text-[#9B1C26]">${{ number_format($transfer->price, 0) }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">To Destination</p>
                        <p class="font-bold text-gray-900 text-base">{{ $transfer->destination }}</p>
                    </div>
                    <div class="mt-2 pt-4 border-t border-gray-100">
                        <a href="#" @click.prevent="selectedStart = '{{ $transfer->start }}'; selectedDest = '{{ $transfer->destination }}'; isModalOpen = true" class="inline-flex items-center justify-center bg-[#9B1C26] hover:bg-[#7A151D] text-white text-sm font-semibold px-5 py-3 rounded-lg transition-colors duration-200 w-full shadow-sm shadow-red-900/20">
                            <i class="fa-solid fa-car-side mr-2"></i> Book This Transfer
                        </a>
                    </div>
                </div>
                @empty
                <div class="text-center py-10 bg-white rounded-xl border border-gray-100 text-gray-500 text-sm">
                    No transfer data available at the moment.
                </div>
                @endforelse
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
         class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            
            <div x-show="isModalOpen" @click.away="isModalOpen = false"
                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row text-left">
                
                <!-- Close Button (Mobile) -->
                <button type="button" @click="isModalOpen = false" class="md:hidden absolute top-4 right-4 z-20 text-white bg-black/20 hover:bg-black/40 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none transition-colors">&times;</button>
                
                <!-- Left Side: Trust & Visual -->
                <div class="w-full md:w-2/5 bg-gradient-to-br from-[#7A0C16] to-[#4A050A] text-white p-8 relative overflow-hidden flex flex-col justify-between">
                    <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-black/20 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-3xl font-extrabold mb-3">Hotel<br>Transfer</h3>
                        <p class="text-white/80 text-sm mb-8 leading-relaxed">Book your comfortable and safe hotel transfer with our professional drivers.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-car text-lg text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-white">Clean & Safe</h4>
                                    <p class="text-xs text-white/70 mt-0.5">Well-maintained fleet</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-clock text-lg text-yellow-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-white">On-time Guarantee</h4>
                                    <p class="text-xs text-white/70 mt-0.5">Punctual pickup service</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-map-location-dot text-lg text-green-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-white">Door to Door</h4>
                                    <p class="text-xs text-white/70 mt-0.5">Direct to your destination</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Form -->
                <div class="w-full md:w-3/5 bg-gray-50 relative">
                    <!-- Close Button (Desktop) -->
                    <button type="button" @click="isModalOpen = false" class="hidden md:flex absolute top-4 right-4 z-20 text-gray-400 hover:text-gray-800 bg-white shadow-sm hover:bg-gray-100 rounded-full w-8 h-8 items-center justify-center focus:outline-none transition-colors"><i class="fa-solid fa-xmark"></i></button>

                    <form action="#" method="POST" onsubmit="submitTransferToWhatsApp(event, 'Hotel Transfer')" class="p-6 md:p-8 max-h-[85vh] overflow-y-auto space-y-6 text-left">
                        
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-base mb-4 border-b border-gray-50 pb-3">
                                <i class="fa-solid fa-user-circle"></i>
                                <h2>Contact Details</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Full Name</label>
                                    <input type="text" name="full_name" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="John Doe">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Email Address</label>
                                    <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="john@example.com">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Phone / WhatsApp</label>
                                    <input type="tel" name="phone" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="+62 812 3456 7890">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Total Person</label>
                                    <input type="number" name="total_person" min="1" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="e.g. 2">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-base mb-4 border-b border-gray-50 pb-3">
                                <i class="fa-solid fa-car"></i>
                                <h2>Transfer Details</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Pick-up Location</label>
                                    <input type="text" name="current_hotel" x-model="selectedStart" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="https://maps.app.goo.gl/... or Airport/Hotel Name">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Drop-off Location</label>
                                    <input type="text" name="to_hotel" x-model="selectedDest" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="https://maps.app.goo.gl/... or Airport/Hotel Name">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Date of Transfer</label>
                                    <input type="date" name="transfer_date" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Pick-up Time</label>
                                    <input type="time" name="pickup_time" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Special Request (Optional)</label>
                                <textarea id="summernote" name="special_request"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-[#7A0C16] hover:bg-[#5A0810] text-white font-bold py-3.5 px-6 rounded-xl shadow-[0_8px_20px_-6px_rgba(122,12,22,0.5)] transform transition-all duration-300 hover:-translate-y-0.5 flex justify-center items-center gap-2">
                            Confirm Booking <i class="fa-solid fa-arrow-right-long ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <x-footer />
</div>
        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <!-- jQuery and Summernote JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>
            AOS.init({
                once: true,
                duration: 800,
                offset: 100,
            });

            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Any specific needs? (e.g. Baby seat, lots of luggage)',
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                      ['style', ['bold', 'italic', 'underline', 'clear']],
                      ['para', ['ul', 'ol']],
                    ]
                });
            });

            function submitTransferToWhatsApp(event, type) {
                event.preventDefault();
                const form = event.target;
                const formData = new FormData(form);
                
                let message = `Halo Admin, saya tertarik untuk memesan layanan Hotel Transfer.\nBerikut detail pesanan saya:\n\n`;
                message += `*Rute:* ${formData.get('current_hotel')} ➡️ ${formData.get('to_hotel')}\n`;
                message += `*Nama:* ${formData.get('full_name')}\n`;
                message += `*Email:* ${formData.get('email')}\n`;
                message += `*Telepon/WA:* ${formData.get('phone')}\n`;
                message += `*Jumlah Penumpang:* ${formData.get('total_person')}\n`;
                message += `*Tanggal Transfer:* ${formData.get('transfer_date')}\n`;
                
                if (formData.get('flight_number')) {
                    message += `*Nomor Penerbangan:* ${formData.get('flight_number')}\n`;
                }
                
                message += `*Waktu Jemput:* ${formData.get('pickup_time')}\n\n`;
                
                // Get plain text from summernote
                let specialReqHtml = formData.get('special_request') || '';
                let tempDiv = document.createElement("div");
                tempDiv.innerHTML = specialReqHtml;
                let specialReqText = tempDiv.textContent || tempDiv.innerText || "-";
                
                message += `*Special Request:* ${specialReqText}\n`;

                const phoneNumber = "{{ preg_replace('/[^0-9]/', '', \App\Models\Pengaturan::first()->phone ?? '6285858777754') }}";
                const waUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
                window.open(waUrl, '_blank');
            }
        </script>

    </body>
</html>
