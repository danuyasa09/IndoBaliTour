<div class="fixed bottom-6 right-6 z-50 flex flex-col-reverse items-center gap-3 group">
    
    <button onclick="toggleContactMenu()" id="mainContactBtn" class="w-14 h-14 bg-[#7A0C16] text-white rounded-full shadow-xl flex items-center justify-center hover:bg-[#5a0810] transition-all duration-300 transform hover:scale-105 focus:outline-none relative">
        <svg xmlns="http://www.w3.org/2000/svg" id="openIcon" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" id="closeIcon" class="h-6 w-6 hidden transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div id="contactMenu" class="flex flex-col items-center gap-3 opacity-0 scale-75 pointer-events-none transition-all duration-300 origin-bottom translate-y-4">
        
        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="w-12 h-12 bg-[#25D366] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#20ba59] transition-all duration-200 transform hover:scale-110" title="WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397 0 11.948 0c3.179.001 6.161 1.24 8.402 3.486 2.242 2.246 3.476 5.232 3.476 8.411 0 6.554-5.337 11.902-11.89 11.902-1.996-.001-3.96-.5-5.717-1.449L0 24zm6.59-4.846c1.657.983 3.284 1.5 5.292 1.5 5.4 0 9.794-4.41 9.798-9.836.002-2.628-1.018-5.1-2.872-6.958C16.953 1.904 14.484 .88 11.946.88c-5.405 0-9.802 4.411-9.806 9.837-.001 2.023.522 3.655 1.523 5.304l-.999 3.65 3.738-.981zm10.744-6.415c-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347z"/>
            </svg>
        </a>
        
        <a href="mailto:kamu@example.com" class="w-12 h-12 bg-[#EA4335] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#d63426] transition-all duration-200 transform hover:scale-110" title="Gmail">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </a>
        
        <a href="tel:+6281234567890" class="w-12 h-12 bg-[#007AFF] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#0062cc] transition-all duration-200 transform hover:scale-110" title="Telepon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
        </a>

        <button onclick="triggerBookingFromFab()" class="w-12 h-12 bg-[#7A0C16] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#5a0810] transition-all duration-200 transform hover:scale-110" title="Book Now Form">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </button>

    </div>
</div>

<div id="bookingModal" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto transition-opacity duration-300">
    <div class="relative bg-white w-full max-w-3xl rounded-xl shadow-2xl border-t-8 border-[#7A0C16] overflow-hidden max-h-[90vh] flex flex-col transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
        
        <button type="button" onclick="closeBookingModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl font-bold">&times;</button>
        
        <form action="#" method="POST" class="p-6 md:p-8 overflow-y-auto space-y-6 text-left">
            @csrf
            
            <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    <h2>Personal Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Full Name</label>
                        <input type="text" name="full_name" placeholder="John Doe" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Email Address</label>
                        <input type="email" name="email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Phone Number</label>
                        <input type="text" name="phone" placeholder="+1 234 567 890" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Nationality</label>
                        <input type="text" name="nationality" placeholder="e.g. Australian" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7" /></svg>
                    <h2>Tour Details</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Tour Package</label>
                        <select name="tour_package" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] text-gray-500 text-sm bg-white">
                            <option value="" disabled selected>Select a package</option>
                            <option value="ubud">Ubud Cultural Tour</option>
                            <option value="uluwatu">Uluwatu Sunset Tour</option>
                            <option value="nusa-penida">Nusa Penida Adventure</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Date of Tour / Activity</label>
                        <input type="date" name="tour_date" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] text-gray-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Total Person</label>
                        <input type="number" name="total_person" placeholder="2" min="1" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Your Hotel Name Stay in Bali</label>
                        <input type="text" name="hotel_name" placeholder="e.g. Alila Villas Uluwatu" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm">
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z" /></svg>
                    <h2>Additional Details</h2>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Booking / Comment / Message Details</label>
                    <textarea name="message" rows="4" placeholder="Share any special requirements or preferences for your trip..." class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] placeholder-gray-400 text-sm resize-none"></textarea>
                </div>
            </div>

            <div class="text-center pt-4 space-y-3">
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-[#7A0C16] hover:bg-[#5a0810] text-white font-medium rounded-md shadow-md transition-colors duration-300 w-full sm:w-auto">
                    <span>Send Message</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-[-45deg]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                </button>
                <p class="text-xs text-gray-500 italic">Our response time is typically within 12 hours.</p>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi Buka/Tutup Menu Kontak Melayang
    function toggleContactMenu() {
        const menu = document.getElementById('contactMenu');
        const openIcon = document.getElementById('openIcon');
        const closeIcon = document.getElementById('closeIcon');
        const isHidden = menu.classList.contains('pointer-events-none');
        
        if (isHidden) {
            menu.classList.remove('opacity-0', 'scale-75', 'pointer-events-none', 'translate-y-4');
            menu.classList.add('opacity-100', 'scale-100', 'translate-y-0');
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            menu.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
            menu.classList.add('opacity-0', 'scale-75', 'pointer-events-none', 'translate-y-4');
            closeIcon.classList.add('hidden');
            openIcon.classList.remove('hidden');
        }
    }

    // Fungsi Khusus: Dipicu dari Tombol Baru di Menu Melayang
    function triggerBookingFromFab() {
        toggleContactMenu(); // Sembunyikan menu melayang terlebih dahulu
        setTimeout(() => {
            openBookingModal(); // Buka form popup booking
        }, 200);
    }

    // Fungsi Membuka Modal Form
    function openBookingModal() {
        const modal = document.getElementById('bookingModal');
        const content = document.getElementById('modalContent');
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }

    // Fungsi Menutup Modal Form
    function closeBookingModal() {
        const modal = document.getElementById('bookingModal');
        const content = document.getElementById('modalContent');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Klik di luar area form untuk menutup modal
    window.onclick = function(event) {
        const modal = document.getElementById('bookingModal');
        if (event.target == modal) {
            closeBookingModal();
        }
    }
</script>