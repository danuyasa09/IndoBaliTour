<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $activity->title }} | Indo Bali Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .content-wrapper h3 { font-size: 1.25rem; font-weight: 700; color: #111827; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .content-wrapper h4 { font-size: 1rem; font-weight: 700; color: #111827; margin-top: 1rem; margin-bottom: 0.5rem; }
        .content-wrapper p { margin-bottom: 1rem; }
        .content-wrapper ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
        .content-wrapper li { margin-bottom: 0.5rem; }
        .content-wrapper b { font-weight: 700; color: #374151; }
    </style>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased text-gray-800">
    <x-navbar />
    <x-floating_contactUs />

    <div class="relative h-[400px] md:h-[500px] w-full bg-cover bg-center" style="background-image: url('{{ asset('images/' . $activity->img) }}');">
        <div class="absolute inset-0 bg-black/40 flex items-center pl-6 md:pl-24">
            <div class="max-w-4xl">
                <span class="bg-[#7A0C16] text-white text-xs px-3 py-1 rounded font-semibold uppercase tracking-wider mb-4 inline-block" data-aos="fade-up">Fun Activity</span>
                <h1 class="text-white text-3xl md:text-5xl font-bold tracking-tight leading-tight" data-aos="fade-up" data-aos-delay="100">
                    {{ $activity->title }}
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-12">
                <div class="bg-white p-6 md:p-10 rounded-2xl border border-gray-100 shadow-sm" data-aos="fade-up">
                    
                    @if($activity->description)
                        <div class="content-wrapper text-sm text-gray-600 leading-relaxed text-justify mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 mt-0">Description</h3>
                            {!! $activity->description !!}
                        </div>
                    @endif

                    @if($activity->content)
                        <div class="content-wrapper text-sm text-gray-600 leading-relaxed text-justify">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Complete Information</h3>
                            {!! $activity->content !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Pricing Info</span>
                    <h3 class="text-lg font-bold text-[#7A0C16] mt-0.5 mb-5">Price & Packages</h3>
                    
                    <div class="text-[#7A0C16] font-bold text-2xl mb-4">
                        Rp {{ number_format((float)$activity->price, 0, ',', '.') }} <span class="text-gray-400 text-sm font-normal">/pax</span>
                    </div>

                    @if($activity->pricelist)
                        <div class="content-wrapper text-xs text-gray-700 mb-6 border-t border-gray-100 pt-4 mt-4">
                            {!! $activity->pricelist !!}
                        </div>
                    @endif

                    @php
                        $pengaturan = \App\Models\Pengaturan::first();
                        $waPhone = preg_replace('/[^0-9]/', '', $pengaturan->phone ?? '6285858777754');
                        $displayPhone = $pengaturan->phone ?? '+6285858777754';
                        $emailAddress = $pengaturan->email ?? 'enjoy@indobalitour.com';
                    @endphp
                    <form action="#" method="POST" onsubmit="submitInlineActivityToWhatsApp(event)" class="space-y-4 border-t border-gray-100 pt-5 mt-5">
                        <h4 class="text-sm font-bold text-gray-900 mb-3">Quick Booking</h4>
                        
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Full Name</label>
                            <input type="text" name="full_name" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Date</label>
                                <input type="date" name="activity_date" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Total Pax</label>
                                <input type="number" name="total_person" min="1" required placeholder="e.g. 2" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Pick-up Location</label>
                            <input type="text" name="pickup_location" required placeholder="Hotel Name, Address, or Google Maps Link" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Special Request (Optional)</label>
                            <textarea id="summernote_activity" name="special_request"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors mt-2">
                            <i class="fa-brands fa-whatsapp text-base"></i>
                            <span>Book via WhatsApp</span>
                        </button>
                    </form>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-sm font-bold text-gray-900 mb-2">Need Help?</h3>
                    <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Do not hesitate to give us a call. We are an expert team and happy to talk to you.</p>
                    
                    <div class="space-y-3 text-xs font-semibold text-gray-700">
                        <div class="flex items-center space-x-3">
                            <span class="text-[#7A0C16]"><i class="fa-solid fa-phone"></i></span>
                            <span>{{ $displayPhone }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-[#7A0C16]"><i class="fa-solid fa-envelope"></i></span>
                            <span class="text-gray-600">{{ $emailAddress }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="mt-12">
            <a href="{{ route('fun_activity') }}" class="inline-flex items-center text-[#7A0C16] text-sm font-bold hover:underline">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Activity List
            </a>
        </div>
    </div>

    <x-footer />  

    <!-- jQuery and Summernote JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 100,
        });

        $(document).ready(function() {
            $('#summernote_activity').summernote({
                placeholder: 'Any dietary requirements or specific places to visit?',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                ]
            });
        });

        function submitInlineActivityToWhatsApp(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            
            let message = `Halo Admin, saya ingin memesan fun activity *{{ $activity->title }}*.\nBerikut detail pesanan saya:\n\n`;
            message += `*Nama:* ${formData.get('full_name')}\n`;
            message += `*Tanggal:* ${formData.get('activity_date')}\n`;
            message += `*Jumlah Peserta:* ${formData.get('total_person')}\n`;
            message += `*Lokasi Jemput:* ${formData.get('pickup_location') || '-'}\n`;
            
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
