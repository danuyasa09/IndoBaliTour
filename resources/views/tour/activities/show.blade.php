<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ $activity->title }} | Indo Bali Tour</title>
    
    <!-- Google / Bing / Yandex SEO Meta Tags -->
    <meta name="description" content="{{ $activity->meta_description ?? ($activity->description ? strip_tags(substr($activity->description, 0, 160)) : 'Booking tour & activity in Bali with best price.') }}">
    <meta name="keywords" content="{{ $activity->meta_keywords ?? ('Bali tour, ' . $activity->title . ', adventure, ' . str_replace(' ', ', ', $activity->title)) }}">
    <meta name="author" content="Indo Bali Tour">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $activity->title }} | Indo Bali Tour">
    <meta property="og:description" content="{{ $activity->meta_description ?? ($activity->description ? strip_tags(substr($activity->description, 0, 160)) : 'Booking tour & activity in Bali with best price.') }}">
    <meta property="og:image" content="{{ $activity->img ? asset('images/fun_activities/' . $activity->img) : asset('images/logo/logo-google.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $activity->title }} | Indo Bali Tour">
    <meta property="twitter:description" content="{{ $activity->meta_description ?? ($activity->description ? strip_tags(substr($activity->description, 0, 160)) : 'Booking tour & activity in Bali with best price.') }}">
    <meta property="twitter:image" content="{{ $activity->img ? asset('images/fun_activities/' . $activity->img) : asset('images/logo/logo-google.png') }}">

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

    <div class="relative h-[400px] md:h-[500px] w-full bg-cover bg-center" style="background-image: url('{{ asset('images/fun_activities/' . $activity->img) }}');">
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
                            @php
                                $parsedContent = $activity->content;
                                
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
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Pricing Info</span>
                    <h3 class="text-lg font-bold text-[#7A0C16] mt-0.5 mb-5">Price & Packages</h3>
                    
                    <div class="text-[#7A0C16] font-bold text-2xl mb-4">
                        <span x-data x-html="$store.currency.format({{ $activity->price }})">$ {{ number_format((float)$activity->price, 2) }}</span> <span class="text-gray-400 text-sm font-normal">/pax</span>
                    </div>

                    @if($activity->pricelist)
                        <div class="prose prose-sm max-w-none text-gray-600">
                            {!! \App\Helpers\CurrencyHelper::formatHtml($activity->pricelist) !!}
                        </div>
                    @endif

                    @php
                        $pengaturan = \App\Models\Pengaturan::first();
                        $waPhone = preg_replace('/[^0-9]/', '', $pengaturan->phone ?? '6285858777754');
                        $displayPhone = $pengaturan->phone ?? '+6285858777754';
                        $emailAddress = $pengaturan->email ?? 'enjoy@indobalitour.com';
                    @endphp
                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-4 border-t border-gray-100 pt-5 mt-5">
                        @csrf
                        <input type="hidden" name="type" value="fun_activity">
                        <input type="hidden" name="item_title" value="{{ $activity->title }}">
                        
                        <h4 class="text-sm font-bold text-gray-900 mb-3">Quick Booking</h4>
                        
                        @if(session('success'))
                            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Full Name</label>
                            <input type="text" name="full_name" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Phone / WhatsApp</label>
                            <input type="text" name="phone" required class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
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

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Pick-up Location</label>
                                <input type="text" name="pickup_location" required placeholder="Hotel Name / Address" class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Google Maps Link (Optional)</label>
                                <input type="url" name="pickup_maps_link" placeholder="https://maps.app.goo.gl/..." class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#7A0C16]/20 focus:border-[#7A0C16] text-xs text-gray-700">
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">Special Request (Optional)</label>
                            <textarea id="summernote_activity" name="special_request"></textarea>
                        </div>

                        <div class="flex flex-col gap-2 mt-4">
                            <button type="submit" class="w-full bg-[#7A0C16] hover:bg-[#5a0810] text-white text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors">
                                <i class="fa-solid fa-paper-plane text-base"></i>
                                <span>Submit Booking</span>
                            </button>

                            <button type="button" onclick="submitInlineActivityToWhatsApp(event)" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-xs font-bold py-3 px-4 rounded-xl flex items-center justify-center space-x-2 transition-colors">
                                <i class="fa-brands fa-whatsapp text-base"></i>
                                <span>Book via WhatsApp</span>
                            </button>
                        </div>
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

        @if(isset($related_activities) && $related_activities->count() > 0)
        <div class="mt-16 pt-12 border-t border-gray-200">
            <h2 class="text-xl font-bold text-gray-900 mb-6" data-aos="fade-up">Other Fun Activities</h2>
            <div class="flex overflow-x-auto gap-4 sm:gap-6 pb-4 snap-x snap-mandatory hide-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;">
                <style>
                    .hide-scrollbar::-webkit-scrollbar {
                        display: none;
                    }
                </style>
                @foreach($related_activities as $ra)
                <div class="min-w-[280px] sm:min-w-[320px] max-w-[280px] sm:max-w-[320px] shrink-0 snap-start bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group flex flex-col" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-44 overflow-hidden">
                        <img src="{{ asset('images/fun_activities/' . $ra->img) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $ra->title }}" onerror="this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop'">
                    </div>
                    <div class="p-5 flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1 line-clamp-2" title="{{ $ra->title }}">{{ $ra->title }}</h4>
                            <div class="text-[11px] text-gray-400 leading-relaxed mb-4 line-clamp-2">{!! $ra->short ?? 'Experience an unforgettable fun activity with us.' !!}</div>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3 mt-auto">
                            <span class="text-xs font-bold text-[#7A0C16]">
                                @if(is_numeric($ra->harga))
                                    <span x-data x-html="$store.currency.format({{ $ra->harga }})">$ {{ number_format($ra->harga, 2) }}</span>
                                @else
                                    {{ $ra->harga ?? 'Contact Us' }}
                                @endif
                            </span>
                            <a href="{{ route('fun_activity.show', $ra->id ?? $ra->slug) }}" class="text-gray-400 group-hover:text-[#7A0C16] transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
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
            const form = event.target.closest('form');
            const formData = new FormData(form);
            
            let message = `Halo Admin, saya ingin memesan fun activity *{{ $activity->title }}*.\nBerikut detail pesanan saya:\n\n`;
            message += `*Nama:* ${formData.get('full_name')}\n`;
            message += `*Phone:* ${formData.get('phone')}\n`;
            message += `*Tanggal:* ${formData.get('activity_date')}\n`;
            message += `*Jumlah Peserta:* ${formData.get('total_person')}\n`;
            message += `*Lokasi Jemput:* ${formData.get('pickup_location') || '-'}\n`;
            if (formData.get('pickup_maps_link')) {
                message += `*Google Maps Link:* ${formData.get('pickup_maps_link')}\n`;
            }
            
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
