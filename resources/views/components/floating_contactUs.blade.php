@php
    $pengaturan = \App\Models\Pengaturan::first();
    $waPhone = preg_replace('/[^0-9]/', '', $pengaturan->phone ?? '6285858777754');
    $callPhone = preg_replace('/[^0-9+]/', '', $pengaturan->phone ?? '+6285858777754');
    $emailAddress = $pengaturan->email ?? 'info@indobalitour.com';
@endphp
<!-- Floating Contact Button & Menu -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col-reverse items-end gap-3 group">
    
    <button onclick="toggleContactMenu()" id="mainContactBtn" class="flex items-center gap-2 px-5 h-14 bg-[#7A0C16] text-white rounded-full shadow-[0_10px_25px_-5px_rgba(122,12,22,0.5)] hover:bg-[#5a0810] transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-red-300">
        <svg xmlns="http://www.w3.org/2000/svg" id="openIcon" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12 3 7.582 7.03 4 12 4s9 3.582 9 8z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" id="closeIcon" class="h-6 w-6 hidden transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <span id="btnText" class="font-semibold text-sm whitespace-nowrap">Need Help?</span>
    </button>

    <div id="contactMenu" class="flex flex-col items-end gap-3 opacity-0 pointer-events-none transition-all duration-300 origin-bottom translate-y-4">
        
        <!-- Book Tour -->
        <div class="flex items-center gap-3 translate-x-8 opacity-0 transition-all duration-300" id="menuItem4">
            <span class="bg-white text-gray-800 px-3 py-2 rounded-xl shadow-md text-xs font-bold border border-gray-100 whitespace-nowrap">
                Book a Tour
            </span>
            <button onclick="triggerBookingFromFab()" class="w-12 h-12 bg-[#7A0C16] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#5a0810] transition-transform duration-200 hover:scale-110" title="Book Now">
                <i class="fa-solid fa-calendar-check text-lg"></i>
            </button>
        </div>

        <!-- Phone -->
        <div class="flex items-center gap-3 translate-x-8 opacity-0 transition-all duration-300" id="menuItem3">
            <span class="bg-white text-gray-800 px-3 py-2 rounded-xl shadow-md text-xs font-bold border border-gray-100 whitespace-nowrap">
                {{ $pengaturan->phone ?? '+62 858-5877-7754' }}
            </span>
            <a href="tel:{{ $callPhone }}" class="w-12 h-12 bg-[#007AFF] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#0062cc] transition-transform duration-200 hover:scale-110" title="Telepon">
                <i class="fa-solid fa-phone text-lg"></i>
            </a>
        </div>

        <!-- Email -->
        <div class="flex items-center gap-3 translate-x-8 opacity-0 transition-all duration-300" id="menuItem2">
            <span class="bg-white text-gray-800 px-3 py-2 rounded-xl shadow-md text-xs font-bold border border-gray-100 whitespace-nowrap">
                {{ $emailAddress }}
            </span>
            <a href="mailto:{{ $emailAddress }}" class="w-12 h-12 bg-[#EA4335] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#d63426] transition-transform duration-200 hover:scale-110" title="Email">
                <i class="fa-solid fa-envelope text-lg"></i>
            </a>
        </div>
        
        <!-- WhatsApp (Primary) -->
        <div class="flex items-center gap-3 translate-x-8 opacity-0 transition-all duration-300 relative group/wa" id="menuItem1">
            <!-- Label -->
            <div class="bg-white px-4 py-2 rounded-2xl shadow-xl border border-gray-100 flex flex-col items-end">
                <span class="text-gray-900 text-sm font-bold whitespace-nowrap">Ask Local Expert</span>
            </div>
            <!-- Button -->
            <a href="https://wa.me/{{ $waPhone }}" target="_blank" rel="noopener noreferrer" class="w-14 h-14 bg-[#25D366] text-white rounded-full shadow-[0_8px_20px_-4px_rgba(37,211,102,0.5)] flex items-center justify-center hover:bg-[#20ba59] transition-transform duration-200 transform hover:scale-110 z-10" title="WhatsApp">
                <i class="fa-brands fa-whatsapp text-3xl"></i>
            </a>
        </div>

    </div>
</div>

<!-- Booking Modal -->
<div id="bookingModal" class="fixed inset-0 z-[100] hidden bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto transition-opacity duration-300 opacity-0">
    <!-- Modal Container (2 Columns) -->
    <div class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row transform scale-95 opacity-0 transition-all duration-300" id="modalContent">
        
        <!-- Close Button (Mobile) -->
        <button type="button" onclick="closeBookingModal()" class="md:hidden absolute top-4 right-4 z-20 text-white bg-black/20 hover:bg-black/40 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none transition-colors">&times;</button>
        
        <!-- Left Side: Trust & Visual -->
        <div class="w-full md:w-2/5 bg-gradient-to-br from-[#7A0C16] to-[#4A050A] text-white p-8 relative overflow-hidden flex flex-col justify-between">
            <!-- Background Decoration -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-black/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <h3 class="text-3xl font-extrabold mb-3">Plan Your<br>Bali Dream</h3>
                <p class="text-white/80 text-sm mb-8 leading-relaxed">Tell us your preferences and our local experts will craft the perfect itinerary for you without hassle.</p>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-map-location-dot text-lg text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-white">Local Experts</h4>
                            <p class="text-xs text-white/70 mt-0.5">Born and raised in Bali</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-bolt text-lg text-yellow-400"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-white">Fast Response</h4>
                            <p class="text-xs text-white/70 mt-0.5">Usually replies in 5 mins</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-shield-check text-lg text-green-400"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-white">Trusted Service</h4>
                            <p class="text-xs text-white/70 mt-0.5">500+ happy explorers</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative z-10 mt-10 md:mt-0 pt-8 border-t border-white/10">
                <p class="text-xs text-white/60 text-center md:text-left">By Indo Bali Tour</p>
            </div>
        </div>
        
        <!-- Right Side: Form -->
        <div class="w-full md:w-3/5 bg-gray-50 relative">
            <!-- Close Button (Desktop) -->
            <button type="button" onclick="closeBookingModal()" class="hidden md:flex absolute top-4 right-4 z-20 text-gray-400 hover:text-gray-800 bg-white shadow-sm hover:bg-gray-100 rounded-full w-8 h-8 items-center justify-center focus:outline-none transition-colors"><i class="fa-solid fa-xmark"></i></button>

            <form action="{{ route('bookings.store') }}" method="POST" class="p-6 md:p-8 max-h-[85vh] overflow-y-auto space-y-6 text-left">
                @csrf
                <input type="hidden" name="type" id="booking_type" value="tour">
                
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                <!-- Personal Info -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-base mb-4 border-b border-gray-50 pb-3">
                        <i class="fa-solid fa-user-circle"></i>
                        <h2>Personal Information</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Full Name</label>
                            <input type="text" name="full_name" placeholder="John Doe" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Phone Number (WhatsApp)</label>
                            <input type="text" name="phone" placeholder="+1 234 567 890" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Nationality</label>
                            <input type="text" name="nationality" placeholder="e.g. Australian" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                    </div>
                </div>

                <!-- Tour Details -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center gap-2 text-[#7A0C16] font-bold text-base mb-4 border-b border-gray-50 pb-3">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                        <h2>Tour Details</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Package / Service</label>
                            <select name="item_title" id="item_title_select" onchange="updateBookingType(this)" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow bg-white appearance-none">
                                <option value="" disabled selected>Select a package or service</option>
                                <optgroup label="Tours">
                                    @php $all_tours = \App\Models\Tour::all(); @endphp
                                    @foreach($all_tours as $t)
                                        <option value="{{ $t->title }}" data-type="tour">{{ $t->title }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Fun Activities">
                                    @php $all_activities = \App\Models\Funactivity::all(); @endphp
                                    @foreach($all_activities as $a)
                                        <option value="{{ $a->title }}" data-type="fun_activity">{{ $a->title }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Car Rentals">
                                    @php $all_cars = \App\Models\Car::all(); @endphp
                                    @foreach($all_cars as $c)
                                        <option value="{{ $c->title }}" data-type="car_rental">{{ $c->title }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Pick-up Location</label>
                            <input type="text" name="current_hotel" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="https://maps.app.goo.gl/... or Hotel Name">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Drop-off Location</label>
                            <input type="text" name="to_hotel" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-sm text-gray-900 transition-all" placeholder="https://maps.app.goo.gl/... or Hotel Name">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Date</label>
                            <input type="date" name="booking_date" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Total Person</label>
                            <input type="number" name="total_person" placeholder="2" min="1" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-gray-700 text-sm transition-shadow">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Special Request (Optional)</label>
                        <textarea id="summernote_tour" name="special_request"></textarea>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full bg-[#7A0C16] hover:bg-[#5A0810] text-white font-bold py-3.5 px-6 rounded-xl shadow-[0_8px_20px_-6px_rgba(122,12,22,0.5)] transform transition-all duration-300 hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        Submit Booking <i class="fa-solid fa-paper-plane text-sm"></i>
                    </button>
                    
                    <button type="button" onclick="submitTourToWhatsApp(event)" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold py-3.5 px-6 rounded-xl shadow-[0_8px_20px_-6px_rgba(37,211,102,0.5)] transform transition-all duration-300 hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-lg"></i> Book via WhatsApp
                    </button>
                </div>
                <p class="text-center text-[11px] text-gray-400 mt-2">
                    We will get back to you within 5-10 minutes.
                </p>
            </form>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    // Initialize summernote for tour booking
    $(document).ready(function() {
        if($('#summernote_tour').length) {
            $('#summernote_tour').summernote({
                placeholder: 'Any dietary requirements or specific places to visit?',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                ]
            });
        }
    });

    function toggleContactMenu() {
        const menu = document.getElementById('contactMenu');
        const openIcon = document.getElementById('openIcon');
        const closeIcon = document.getElementById('closeIcon');
        const btnText = document.getElementById('btnText');
        const items = [
            document.getElementById('menuItem1'), // WhatsApp
            document.getElementById('menuItem2'), // Email
            document.getElementById('menuItem3'), // Call
            document.getElementById('menuItem4')  // Book Tour
        ];
        
        if (menu.classList.contains('opacity-0')) {
            // Open Menu
            menu.classList.remove('hidden');
            // small delay to allow display block to take effect before animating opacity
            setTimeout(() => {
                menu.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                if(btnText) btnText.innerText = 'Close';
                
                // Stagger Items
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.remove('translate-x-8', 'opacity-0');
                    }, index * 80);
                });
            }, 10);
            
        } else {
            // Close Menu
            items.reverse().forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('translate-x-8', 'opacity-0');
                }, index * 50);
            });
            
            setTimeout(() => {
                menu.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                if(btnText) btnText.innerText = 'Need Help?';
            }, items.length * 50 + 50);
        }
    }

    function triggerBookingFromFab() {
        // Automatically close the contact menu
        if (!document.getElementById('contactMenu').classList.contains('opacity-0')) {
            toggleContactMenu();
        }
        
        const modal = document.getElementById('bookingModal');
        const modalContent = document.getElementById('modalContent');
        
        // Show modal backdrop
        modal.classList.remove('hidden');
        
        // Trigger animations
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeBookingModal() {
        const modal = document.getElementById('bookingModal');
        const modalContent = document.getElementById('modalContent');
        
        // Reverse animations
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        
        // Hide modal completely after animation finishes
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    
    // Close modal when clicking outside
    document.getElementById('bookingModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeBookingModal();
        }
    });

    function updateBookingType(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const type = selectedOption.getAttribute('data-type');
        if (type) {
            document.getElementById('booking_type').value = type;
        }
    }

    function submitTourToWhatsApp(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        const formData = new FormData(form);
        
        let typeStr = 'layanan';
        if (formData.get('type') === 'tour') typeStr = 'paket tour';
        if (formData.get('type') === 'fun_activity') typeStr = 'aktivitas';
        if (formData.get('type') === 'car_rental') typeStr = 'sewa mobil';

        let message = `Halo Admin, saya ingin memesan ${typeStr} *${formData.get('item_title') || '-'}*.\nBerikut detail pesanan saya:\n\n`;
        message += `*Nama:* ${formData.get('full_name')}\n`;
        message += `*Email:* ${formData.get('email')}\n`;
        message += `*Telepon/WA:* ${formData.get('phone')}\n`;
        message += `*Kewarganegaraan:* ${formData.get('nationality')}\n`;
        message += `*Tanggal:* ${formData.get('booking_date')}\n`;
        message += `*Jumlah Peserta:* ${formData.get('total_person')}\n`;
        message += `*Lokasi Jemput:* ${formData.get('current_hotel') || '-'}\n`;
        message += `*Lokasi Antar:* ${formData.get('to_hotel') || '-'}\n`;
        
        let specialReqHtml = formData.get('special_request') || '';
        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = specialReqHtml;
        let specialReqText = tempDiv.textContent || tempDiv.innerText || "-";
        
        message += `*Special Request:* ${specialReqText}\n`;

        const phoneNumber = "{{ $waPhone }}";
        const waUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(waUrl, '_blank');
    }
</script>