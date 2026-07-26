<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tour->title }} | Indo Bali Tour</title>
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

    <div class="relative h-[400px] md:h-[500px] w-full bg-cover bg-center" style="background-image: url('{{ asset('images/' . $tour->img) }}');">
        <div class="absolute inset-0 bg-black/40 flex items-center pl-6 md:pl-24">
            <div class="max-w-4xl">
                <h1 class="text-white text-3xl md:text-5xl font-bold tracking-tight leading-tight" data-aos="fade-up">
                    {{ $tour->title }}
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-12">
                <div class="bg-white p-6 md:p-10 rounded-2xl border border-gray-100 shadow-sm" data-aos="fade-up">
                    <div class="content-wrapper text-sm text-gray-600 leading-relaxed text-justify">
                        {!! $tour->content !!}
                    </div>
                    
                    @if($tour->harga_detail)
                    <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <p class="text-xs text-gray-600 font-medium">
                            <i class="fa-solid fa-circle-info text-[#7A0C16] mr-1"></i> {{ $tour->harga_detail }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Pricing Info</span>
                    <h3 class="text-lg font-bold text-[#7A0C16] mt-0.5 mb-5">Price & Packages</h3>
                    
                    <div class="content-wrapper text-xs text-gray-700 mb-6">
                        {!! $tour->pricelist !!}
                    </div>

                    <div class="space-y-3">
                        <a href="#" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors">
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

        @if(isset($related_tours) && $related_tours->count() > 0)
        <div class="mt-16 pt-12 border-t border-gray-200">
            <h2 class="text-xl font-bold text-gray-900 mb-6" data-aos="fade-up">Other Tour Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related_tours as $rt)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative">
                        <img src="{{ asset('images/' . $rt->img) }}" class="w-full h-44 object-cover" alt="{{ $rt->title }}" onerror="this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop'">
                    </div>
                    <div class="p-5 flex flex-col justify-between h-full">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">{{ $rt->title }}</h4>
                            <div class="text-[11px] text-gray-400 leading-relaxed mb-4 line-clamp-2">{!! $rt->short !!}</div>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3 mt-auto">
                            <span class="text-xs font-bold text-[#7A0C16]">
                                @if(is_numeric($rt->harga))
                                    RP {{ number_format($rt->harga, 0, ',', '.') }}
                                @else
                                    {{ $rt->harga ?? 'Contact Us' }}
                                @endif
                            </span>
                            <a href="{{ route('detail', $rt->slug) }}" class="text-gray-400 group-hover:text-[#7A0C16] transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
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
