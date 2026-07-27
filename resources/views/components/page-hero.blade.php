@props([
    'badge' => '',
    'badgeIcon' => '',
    'title' => '',
    'highlight' => '',
    'titleEnd' => '',
    'subtitle' => '',
    'bgImage' => '',
    'ctaText' => '',
    'ctaLink' => '',
    'floatingIcon' => '',
    'floatingTitle' => '',
    'floatingPrice' => '',
    'floatingPriceUnit' => '',
    'floatingFeatures' => [],
    'dividerColor' => '#FDFDFC',
    'dividerType' => 'wave'
])

<div class="relative min-h-[500px] md:min-h-[600px] w-full bg-cover bg-center flex items-center" style="background-image: url('{{ $bgImage }}');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10 w-full pt-20 pb-12 md:pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="text-left space-y-6">
                <!-- Breadcrumb -->
                <nav class="flex text-gray-300 text-sm" aria-label="Breadcrumb">
                  <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                      <a href="/" class="hover:text-white transition-colors"><i class="fa-solid fa-house mr-2"></i>Home</a>
                    </li>
                    <li>
                      <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right text-[10px] mx-2"></i>
                        <span class="text-white font-medium">{{ $badge }}</span>
                      </div>
                    </li>
                  </ol>
                </nav>



                <!-- Title & Desc -->
                <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight" data-aos="fade-up">
                    {{ $title }} 
                    @if($highlight) <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-300 to-red-500 filter drop-shadow-lg">{{ $highlight }}</span> @endif 
                    {{ $titleEnd }}
                </h1>
                
                @if($subtitle)
                <p class="text-gray-200 text-base md:text-lg max-w-xl leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                    {{ $subtitle }}
                </p>
                @endif

                <!-- CTA & Trust -->
                <div class="pt-4 flex flex-col sm:flex-row items-start sm:items-center gap-4" data-aos="fade-up" data-aos-delay="200">
                    @if($ctaText && $ctaLink)
                    <a href="{{ $ctaLink }}" class="inline-flex justify-center items-center px-8 py-3.5 bg-brand-red hover:bg-[#5A0810] text-white font-bold rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-[0_10px_20px_rgba(122,12,22,0.4)]">
                        {{ $ctaText }}
                        <i class="fa-solid fa-arrow-down ml-2"></i>
                    </a>
                    @endif
                    
                    <div class="flex items-center space-x-4 ml-0 sm:ml-4 mt-4 sm:mt-0">
                        <div class="flex -space-x-3">
                            @php
                                $testimonies = \App\Models\Testimony::where('is_approved', true)
                                    ->latest()
                                    ->take(3)
                                    ->get();
                                $bgColors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500', 'bg-teal-500'];
                            @endphp

                            @forelse($testimonies as $testimony)
                                @if($testimony->photo)
                                    <img class="w-10 h-10 rounded-full border-2 border-white object-cover bg-gray-200" src="{{ asset('storage/' . $testimony->photo) }}" alt="{{ $testimony->name }}">
                                @else
                                    @php
                                        $initial = substr($testimony->name, 0, 1);
                                        $colorIndex = abs(crc32($testimony->name)) % count($bgColors);
                                        $bgColor = $bgColors[$colorIndex];
                                    @endphp
                                    <div class="w-10 h-10 rounded-full border-2 border-white {{ $bgColor }} flex items-center justify-center text-white font-bold text-sm uppercase">
                                        {{ $initial }}
                                    </div>
                                @endif
                            @empty
                                @auth
                                    @php
                                        $initial = substr(Auth::user()->nama, 0, 1);
                                        $colorIndex = abs(crc32(Auth::user()->nama)) % count($bgColors);
                                        $bgColor = $bgColors[$colorIndex];
                                    @endphp
                                    <div class="w-10 h-10 rounded-full border-2 border-white {{ $bgColor }} flex items-center justify-center text-white font-bold text-sm uppercase">
                                        {{ $initial }}
                                    </div>
                                @endauth
                                @guest
                                    <div class="w-10 h-10 rounded-full border-2 border-white bg-blue-500 flex items-center justify-center text-white font-bold text-sm uppercase">A</div>
                                    <div class="w-10 h-10 rounded-full border-2 border-white bg-green-500 flex items-center justify-center text-white font-bold text-sm uppercase">B</div>
                                    <div class="w-10 h-10 rounded-full border-2 border-white bg-purple-500 flex items-center justify-center text-white font-bold text-sm uppercase">C</div>
                                @endguest
                            @endforelse
                        </div>
                        <div class="text-sm">
                            <div class="flex items-center text-yellow-400 text-xs mb-0.5">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <span class="text-white font-medium text-xs">500+ Happy Explorers</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-20 pointer-events-none">
        <style>
            @keyframes waveAnim1 {
                0% { transform: scaleX(-1) translateX(0); }
                50% { transform: scaleX(-1) translateX(-30px); }
                100% { transform: scaleX(-1) translateX(0); }
            }
            @keyframes waveAnim2 {
                0% { transform: translateX(0); }
                50% { transform: translateX(30px); }
                100% { transform: translateX(0); }
            }
            .wave-bg {
                animation: waveAnim1 12s ease-in-out infinite alternate;
                width: calc(100% + 60px);
                margin-left: -30px;
            }
            .wave-fg {
                animation: waveAnim2 10s ease-in-out infinite alternate;
                width: calc(100% + 60px);
                margin-left: -30px;
            }
            @keyframes hillAnim1 {
                0% { transform: scaleY(1.2) translateX(0); }
                50% { transform: scaleY(1.3) translateX(-15px); }
                100% { transform: scaleY(1.2) translateX(0); }
            }
            @keyframes hillAnim2 {
                0% { transform: scaleY(1) translateX(0); }
                50% { transform: scaleY(1.05) translateX(15px); }
                100% { transform: scaleY(1) translateX(0); }
            }
            .hill-bg {
                animation: hillAnim1 8s ease-in-out infinite alternate;
                transform-origin: bottom;
                width: calc(100% + 30px);
                margin-left: -15px;
            }
            .hill-fg {
                animation: hillAnim2 10s ease-in-out infinite alternate;
                transform-origin: bottom;
                width: calc(100% + 30px);
                margin-left: -15px;
            }
        </style>

        @if($dividerType === 'wave')
        <!-- Background wave layer for parallax effect -->
        <svg class="absolute bottom-0 left-0 block h-[40px] md:h-[60px] wave-bg opacity-30" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="{{ $dividerColor }}"></path>
        </svg>
        <!-- Foreground wave layer -->
        <svg class="relative block h-[40px] md:h-[60px] wave-fg" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="{{ $dividerColor }}"></path>
        </svg>
        @elseif($dividerType === 'hill')
        <!-- Background hill layer for parallax effect -->
        <svg class="absolute bottom-0 left-0 block h-[40px] md:h-[70px] hill-bg opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,120 C400,0 800,0 1200,120 Z" fill="{{ $dividerColor }}"></path>
        </svg>
        <!-- Foreground hill layer -->
        <svg class="relative block h-[40px] md:h-[70px] hill-fg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,120 C400,0 800,0 1200,120 Z" fill="{{ $dividerColor }}"></path>
        </svg>
        @endif
    </div>
</div>
