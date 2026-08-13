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

    <div class="relative h-[400px] md:h-[500px] w-full bg-cover bg-center" style="background-image: url('{{ asset('images/tours/' . $tour->img) }}');">
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
                        @php
                            $parsedContent = $tour->content;
                            
                            // 1. Dual Map Widget (2D + 360)
                            $parsedContent = preg_replace_callback(
                                '/(\[map\s+(?:(?!\[map).)*?\])((?:(?!\[map).)*?)\[\/map\]/is',
                                function ($matches) {
                                    $openTag = html_entity_decode(strip_tags($matches[1]), ENT_QUOTES);
                                    $innerHtml = $matches[2];
                                    
                                    preg_match('/lat="([^"]+)"/', $openTag, $latM);
                                    preg_match('/lng="([^"]+)"/', $openTag, $lngM);
                                    
                                    $lat = $latM[1] ?? '';
                                    $lng = $lngM[1] ?? '';
                                    
                                    if (preg_match('/(https:\/\/www\.google\.com\/maps\/embed\?[^"\'>\s&]+)/i', $innerHtml, $srcM)) {
                                        $embedUrl = html_entity_decode($srcM[1], ENT_QUOTES);
                                    } else {
                                        $embedUrl = trim(html_entity_decode(strip_tags($innerHtml), ENT_QUOTES));
                                    }

                                    if ($lat && $lng && $embedUrl) {
                                        $map2d = '<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$lat.','.$lng.'&t=&z=14&ie=UTF8&iwloc=&output=embed" class="w-full"></iframe>';
                                        $map360 = '<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$embedUrl.'" class="w-full"></iframe>';
                                        
                                        return '
                                        <div x-data="{ view: \'2d\' }" class="my-8" data-aos="fade-up">
                                            <div class="flex justify-center mb-5">
                                                <div class="inline-flex bg-gray-100/80 backdrop-blur-sm p-1 rounded-full">
                                                    <button @click="view = \'2d\'" :class="view === \'2d\' ? \'bg-white shadow-sm text-gray-900 font-medium\' : \'text-gray-500 hover:text-gray-700\'" class="px-5 py-2 text-sm rounded-full transition-all duration-300 flex items-center gap-2">
                                                        <i class="fa-solid fa-map-location-dot"></i> Peta Lokasi
                                                    </button>
                                                    <button @click="view = \'360\'" :class="view === \'360\' ? \'bg-white shadow-sm text-gray-900 font-medium\' : \'text-gray-500 hover:text-gray-700\'" class="px-5 py-2 text-sm rounded-full transition-all duration-300 flex items-center gap-2">
                                                        <i class="fa-solid fa-street-view"></i> 360 View
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="relative rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50 bg-gray-50">
                                                <div x-show="view === \'2d\'" x-transition.opacity.duration.400ms>
                                                    '.$map2d.'
                                                </div>
                                                <div x-show="view === \'360\'" x-transition.opacity.duration.400ms style="display: none;">
                                                    '.$map360.'
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    return $matches[0];
                                },
                                $parsedContent
                            );

                            // 2. Standalone 2D Map
                            $parsedContent = preg_replace_callback(
                                '/\[map\s+.*?\]/is',
                                function ($matches) {
                                    $clean = html_entity_decode(strip_tags($matches[0]), ENT_QUOTES);
                                    preg_match('/lat="([^"]+)"/', $clean, $latM);
                                    preg_match('/lng="([^"]+)"/', $clean, $lngM);
                                    $is360 = strpos($clean, 'type="360"') !== false;
                                    
                                    if (!empty($latM[1]) && !empty($lngM[1])) {
                                        if ($is360) {
                                            return '<div class="my-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50" data-aos="fade-up"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?layer=c&cbll='.$latM[1].','.$lngM[1].'&output=svembed" class="w-full"></iframe></div>';
                                        } else {
                                            return '<div class="my-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50" data-aos="fade-up"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$latM[1].','.$lngM[1].'&t=&z=14&ie=UTF8&iwloc=&output=embed" class="w-full"></iframe></div>';
                                        }
                                    }
                                    return $matches[0];
                                },
                                $parsedContent
                            );

                            // 3. Standalone 360 Embed
                            $parsedContent = preg_replace_callback(
                                '/\[map_embed\](.*?)\[\/map_embed\]/is',
                                function ($matches) {
                                    if (preg_match('/(https:\/\/www\.google\.com\/maps\/embed\?[^"\'>\s&]+)/i', $matches[1], $srcM)) {
                                        $url = html_entity_decode($srcM[1], ENT_QUOTES);
                                    } else {
                                        $url = trim(html_entity_decode(strip_tags($matches[1]), ENT_QUOTES));
                                    }
                                    return '<div class="my-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50" data-aos="fade-up"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$url.'" class="w-full"></iframe></div>';
                                },
                                $parsedContent
                            );
                            $parsedContent = \App\Helpers\CurrencyHelper::formatHtml($parsedContent);
                        @endphp
                        {!! $parsedContent !!}
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
                    
                    <div class="prose prose-sm max-w-none text-gray-600">
                        {!! \App\Helpers\CurrencyHelper::formatHtml($tour->pricelist) !!}
                    </div>

                    @php
                        $pengaturan = \App\Models\Pengaturan::first();
                        $waPhone = preg_replace('/[^0-9]/', '', $pengaturan->phone ?? '6285858777754');
                        $waMessage = urlencode("Hello, I'm interested in booking the tour package: " . $tour->title);
                        $displayPhone = $pengaturan->phone ?? '+6285858777754';
                        $emailAddress = $pengaturan->email ?? 'enjoy@indobalitour.com';
                    @endphp
                    <form action="#" method="POST" onsubmit="submitInlineTourToWhatsApp(event)" class="space-y-4 border-t border-gray-100 pt-5 mt-5">
                        <h4 class="text-sm font-bold text-gray-900 mb-3">Quick Booking</h4>
                        
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Full Name</label>
                            <input type="text" name="full_name" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Date</label>
                                <input type="date" name="tour_date" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
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
                            <textarea id="summernote_detail" name="special_request"></textarea>
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

        @if(isset($related_tours) && $related_tours->count() > 0)
        <div class="mt-16 pt-12 border-t border-gray-200">
            <h2 class="text-xl font-bold text-gray-900 mb-6" data-aos="fade-up">Other Tour Packages</h2>
            <div class="flex overflow-x-auto gap-4 sm:gap-6 pb-4 snap-x snap-mandatory hide-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;">
                <style>
                    .hide-scrollbar::-webkit-scrollbar {
                        display: none;
                    }
                </style>
                @foreach($related_tours as $rt)
                <div class="min-w-[280px] sm:min-w-[320px] max-w-[280px] sm:max-w-[320px] shrink-0 snap-start bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group flex flex-col" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative">
                        <img src="{{ asset('images/tours/' . $rt->img) }}" class="w-full h-44 object-cover" alt="{{ $rt->title }}" onerror="this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop'">
                    </div>
                    <div class="p-5 flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">{{ $rt->title }}</h4>
                            <div class="text-[11px] text-gray-400 leading-relaxed mb-4 line-clamp-2">{!! $rt->short !!}</div>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3 mt-auto">
                            <span class="text-xs font-bold text-[#7A0C16]">
                                @if(is_numeric($rt->harga))
                                    <span x-data x-html="$store.currency.format({{ $rt->harga }})">$ {{ number_format($rt->harga, 2) }}</span>
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
            $('#summernote_detail').summernote({
                placeholder: 'Any dietary requirements or specific places to visit?',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                ]
            });
        });

        function submitInlineTourToWhatsApp(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            
            let message = `Halo Admin, saya ingin memesan paket tour *{{ $tour->title }}*.\nBerikut detail pesanan saya:\n\n`;
            message += `*Nama:* ${formData.get('full_name')}\n`;
            message += `*Tanggal:* ${formData.get('tour_date')}\n`;
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
