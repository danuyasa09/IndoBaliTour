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

                    <div class="space-y-3">
                        <a href="https://wa.me/6281234567890?text=Halo%20Indo%20Bali%20Tour,%20saya%20ingin%20booking%20{{ urlencode($activity->title) }}" target="_blank" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors">
                            <i class="fa-brands fa-whatsapp text-base"></i>
                            <span>WhatsApp Booking</span>
                        </a>
                        <a href="#" class="w-full bg-white border border-[#7A0C16] text-[#7A0C16] hover:bg-gray-50 text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors">
                            <i class="fa-regular fa-calendar-days"></i>
                            <span>Booking Form</span>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-sm font-bold text-gray-900 mb-2">Need Help?</h3>
                    <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Do not hesitate to give us a call. We are an expert team and happy to talk to you.</p>
                    
                    <div class="space-y-3 text-xs font-semibold text-gray-700">
                        <div class="flex items-center space-x-3">
                            <span class="text-[#7A0C16]"><i class="fa-solid fa-phone"></i></span>
                            <span>+6282144814593</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-[#7A0C16]"><i class="fa-solid fa-envelope"></i></span>
                            <span class="text-gray-600">enjoy@indobalitour.com</span>
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
