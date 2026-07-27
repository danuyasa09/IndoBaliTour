@props([
    'adventureLink' => 'javascript:void(0)',
    'adventureOnclick' => ''
])

<!-- CALL TO ACTION (CTA) SECTION -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="relative rounded-2xl overflow-hidden shadow-xl" data-aos="zoom-in-up">
        <!-- Background Image -->
        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1200&q=80" alt="Bali Beach" loading="lazy" class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition-transform duration-1000">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/40"></div>
        
        <!-- Content -->
        <div class="relative z-10 p-8 md:p-10 flex flex-col lg:flex-row items-center justify-between gap-6 text-center lg:text-left">
            <div class="max-w-2xl">
                <span class="inline-block px-3 py-1 bg-brand-red/20 text-brand-red border border-brand-red/30 text-[10px] font-bold uppercase tracking-widest rounded-full mb-3">Let's Go!</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-2 tracking-tight">Ready to Write Your Own Story in Bali?</h2>
                <p class="text-sm md:text-base text-gray-300 leading-relaxed">
                    Consult your dream trip with our local experts. We'll help you craft an unforgettable journey.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto shrink-0">
                <a href="{{ $adventureLink }}" @if($adventureOnclick) onclick="{{ $adventureOnclick }}" @endif class="w-full sm:w-auto bg-brand-red hover:bg-red-700 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 shadow-[0_0_15px_rgba(122,12,22,0.4)] hover:-translate-y-0.5 text-sm">
                    Start Adventure
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 text-sm">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
