<!-- Font Awesome (needed for footer icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <footer id="contact" class="bg-[#111111] text-gray-400 py-16 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mb-16">
            
            <div class="space-y-6">
                <h3 class="text-white text-2xl font-extrabold tracking-tight">Indo Bali Tour</h3>
                <p class="text-sm leading-relaxed text-gray-500">
                    Your trusted travel partner in Bali. We are ready to help you create unforgettable memories on the Island of Gods.
                </p>
                <div class="flex space-x-3 pt-2">
                    <a href="https://www.instagram.com/indobalitourcom/" class="h-9 w-9 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/indobalitour" class="h-9 w-9 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/@indobalitourcom" class="h-9 w-9 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors duration-300">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Our Services</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Tour Packages</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Car Rental</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Custom Tours</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Activity Bookings</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Airport Transfer</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Excellent Review From</h4>
                <img src="{{ asset('images/tripadvisor.png') }}" alt="Excellent Review From - Tripadvisor" class="h-20 sm:h-30 w-auto object-contain opacity-80 hover:opacity-100 transition-opacity duration-300">
            </div>

            <div class="space-y-6">
                <div>
                    <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start space-x-3">
                            <span class="text-[#7A0C16] text-lg mt-0.5"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="leading-relaxed">Jl. Sunset Road No. 888, Seminyak, Kuta, Bali</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="text-[#7A0C16] text-lg"><i class="fa-solid fa-phone"></i></span>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="text-[#7A0C16] text-lg"><i class="fa-solid fa-envelope"></i></span>
                            <span>info@indobalitour.com</span>
                        </li>
                    </ul>
                </div>
                
                <div class="pt-2">
                    <button onclick="openTestimoniModal()" class="group relative inline-flex items-center gap-2 px-5 py-3 bg-[#7A0C16] hover:bg-[#5a0810] text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-300 w-full justify-center overflow-hidden">
                        <span class="relative z-10">Share Your Experience</span>
                        <i class="fa-solid fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>

        </div>

        <div class="pt-8 border-t border-zinc-800/80 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
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