<!-- Font Awesome (needed for footer icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<footer id="contact" class="bg-[#111111] text-gray-400 pt-20 pb-10 border-t border-zinc-800 relative overflow-hidden">
    <!-- Premium Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-1/2 bg-[#7A0C16]/5 blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-4 gap-y-12 lg:gap-12 mb-12">
            
            <!-- Brand Section -->
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left space-y-6 col-span-2 lg:col-span-1 order-1 lg:order-1">
                <h3 class="text-white text-3xl font-extrabold tracking-tight">Indo Bali Tour</h3>
                <p class="text-sm leading-relaxed text-gray-500 max-w-xs">
                    Your trusted travel partner in Bali. We are ready to help you create unforgettable memories on the Island of Gods.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="https://www.instagram.com/indobalitourcom/" class="h-10 w-10 rounded-full bg-zinc-800/80 hover:bg-[#7A0C16] border border-white/5 flex items-center justify-center text-white transition-all duration-300 hover:scale-110 hover:shadow-[0_0_15px_rgba(122,12,22,0.5)]">
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/indobalitour" class="h-10 w-10 rounded-full bg-zinc-800/80 hover:bg-[#7A0C16] border border-white/5 flex items-center justify-center text-white transition-all duration-300 hover:scale-110 hover:shadow-[0_0_15px_rgba(122,12,22,0.5)]">
                        <i class="fa-brands fa-facebook-f text-lg"></i>
                    </a>
                    <a href="https://www.youtube.com/@indobalitourcom" class="h-10 w-10 rounded-full bg-zinc-800/80 hover:bg-[#7A0C16] border border-white/5 flex items-center justify-center text-white transition-all duration-300 hover:scale-110 hover:shadow-[0_0_15px_rgba(122,12,22,0.5)]">
                        <i class="fa-brands fa-youtube text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Services Section -->
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left col-span-1 lg:col-span-1 order-2 lg:order-2">
                <h4 class="text-white font-bold text-sm uppercase tracking-[0.15em] mb-6">Our Services</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="{{ route('package_tour') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Tour Packages</a></li>
                    <li><a href="{{ route('car_rental') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Car Rental</a></li>
                    <li><a href="{{ route('fun_activity') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Fun Activities</a></li>
                    <li><a href="{{ route('airport_transfer') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Airport Transfer</a></li>
                    <li><a href="{{ route('hotel_transfer') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Hotel Transfer</a></li>
                </ul>
            </div>

            <!-- Review Section -->
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left col-span-2 lg:col-span-1 order-4 lg:order-3">
                <h4 class="text-white font-bold text-sm uppercase tracking-[0.15em] mb-6">Review From</h4>
                <a href="https://www.tripadvisor.co.id/Attraction_Review-g12997472-d28485128-Reviews-Nanta_Bali_Tour-South_Kuta_Badung_Regency_Bali.html" class="inline-block hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/icons/tripadvisor.png') }}" alt="Excellent Review From - Tripadvisor" class="h-28 sm:h-32 lg:h-36 w-auto object-contain drop-shadow-lg mx-auto lg:mx-0">
                </a>
            </div>

            <!-- Contact Section -->
            <div class="flex flex-col items-center lg:items-start text-center lg:text-left space-y-6 col-span-1 lg:col-span-1 order-3 lg:order-4">
                <div class="w-full flex flex-col items-center lg:items-start">
                    <h4 class="text-white font-bold text-sm uppercase tracking-[0.15em] mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-sm text-gray-400 w-full">
                        <li class="flex flex-row items-start space-x-3 text-left">
                            <div class="h-6 w-6 rounded-full bg-[#7A0C16]/20 text-[#7A0C16] flex items-center justify-center text-[10px] shrink-0 mt-0.5">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <span class="leading-relaxed">Jl. Ganetri IV No.4, Tonja, Denpasar Utara, Bali 80237</span>
                        </li>
                        <li class="flex flex-row items-start space-x-3 text-left">
                            <div class="h-6 w-6 rounded-full bg-[#7A0C16]/20 text-[#7A0C16] flex items-center justify-center text-[10px] shrink-0 mt-0.5">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                            <a href="https://wa.me/6282144814593" target="_blank" class="hover:text-white transition-colors duration-200 font-medium">+6282144814593</a>
                        </li>
                        <li class="flex flex-row items-start space-x-3 text-left">
                            <div class="h-6 w-6 rounded-full bg-[#7A0C16]/20 text-[#7A0C16] flex items-center justify-center text-[10px] shrink-0 mt-0.5">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <a href="mailto:enjoy@indobalitour.com" class="hover:text-white transition-colors duration-200 font-medium">enjoy@indobalitour.com</a>
                        </li>
                    </ul>
                </div>
                <div class="pt-2 w-full lg:w-auto flex justify-center lg:justify-start">
                    <button onclick="openTestimoniModal()" class="group relative inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-[#7A0C16] to-[#5a0810] text-white text-sm font-semibold rounded-xl shadow-[0_5px_15px_rgba(122,12,22,0.4)] transition-all duration-300 w-[280px] sm:w-[320px] justify-center overflow-hidden hover:scale-105">
                        <span class="relative z-10">Share Experience</span>
                        <i class="fa-solid fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- Divider & Copyright -->
        <div class="pt-8 border-t border-zinc-800/80 flex flex-col justify-center items-center gap-4 text-xs text-gray-500 font-medium tracking-wide">
            <p>&copy; {{ date('Y') }} Indo Bali Tour. All rights reserved.</p>
        </div>
    </div>
</footer>

        <div id="testimoniModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto transition-opacity duration-300">
            <div class="relative bg-white w-full max-w-4xl rounded-xl shadow-2xl border-t-8 border-[#7A0C16] overflow-hidden max-h-[90vh] flex flex-col transform scale-95 opacity-0 transition-all duration-300" id="testimoniModalContent">
                
                <button type="button" onclick="closeTestimoniModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none text-3xl font-bold z-10">&times;</button>
                
                <div class="overflow-y-auto w-full p-2">
                    <x-testimoni />
                </div>
                
            </div>
        </div>

        <script>
            function openTestimoniModal() {
                const modal = document.getElementById('testimoniModal');
                const content = document.getElementById('testimoniModalContent');
                
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                
                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
                
                // Mencegah background scroll saat modal terbuka
                document.body.style.overflow = 'hidden';
            }

            function closeTestimoniModal() {
                const modal = document.getElementById('testimoniModal');
                const content = document.getElementById('testimoniModalContent');
                
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
                
                setTimeout(() => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                    // Mengembalikan scroll pada body
                    document.body.style.overflow = 'auto';
                }, 300);
            }

            // Menutup modal jika user klik area gelap di luar form
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('testimoniModal');
                if (event.target == modal) {
                    closeTestimoniModal();
                }
            });
        </script>