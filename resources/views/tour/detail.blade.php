<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="min-h-screen bg-[#F8F9FA] font-sans antialiased text-gray-800">
    
    <x-navbar />

    <div class="relative h-[400px] md:h-[500px] w-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1200&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black/40 flex items-center pl-6 md:pl-24">
            <div class="max-w-4xl">
                <h1 class="text-white text-3xl md:text-5xl font-bold tracking-tight leading-tight">
                    Ubud Tour: Cultural &<br>Nature Escape
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-12">
                
                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">About this activity</h2>
                    <div class="text-xs text-gray-500 leading-relaxed space-y-4 text-justify">
                        <p>The Sacred Monkey Forest Sanctuary is a nature reserve and temple complex in Ubud, Bali, Indonesia. It is also known as the Ubud Monkey Forest. The Sanctuary is home to over 1260 long-tailed macaques, who are considered sacred by the local Balinese people. See the amazing view of Tegalalang Rice Terraces. Relax in the refreshing waters with the cool air of Tegenungan Waterfall. Enjoy the coffee plantation of Temen Village north of Ubud.</p>
                        <p>The Sacred Monkey Forest Sanctuary is a nature reserve and temple complex in Ubud, Bali, Indonesia. It is also known as the Ubud Monkey Forest. The Sanctuary is home to over 1260 long-tailed macaques, who are considered sacred by the local Balinese people. See the amazing view of Tegalalang Rice Terraces. Relax in the refreshing waters with the cool air of Tegenungan Waterfall. Enjoy the coffee plantation of Temen Village north of Ubud.</p>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-5">Tour Highlights</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-start space-x-3.5">
                            <span class="text-[#7A0C16] text-xl mt-0.5"><i class="fa-solid fa-gopuram"></i></span>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 mb-1">Pura Dalem Agung</h3>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Jelajahi kuil utama abad ke-14 yang megah di dalam Monkey Forest, tempat di mana arsitektur kuno bertemu dengan alam liar.</p>
                            </div>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-start space-x-3.5">
                            <span class="text-[#7A0C16] text-xl mt-0.5"><i class="fa-solid fa-mountain-sun"></i></span>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 mb-1">Panorama Tegalalang</h3>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Nikmati pemandangan terasering padi yang ikonik, mahakarya petani lokal yang telah bertahan selama berabad-abad.</p>
                            </div>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-start space-x-3.5">
                            <span class="text-[#7A0C16] text-xl mt-0.5"><i class="fa-solid fa-water"></i></span>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 mb-1">Keajaiban Tegenungan</h3>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Saksikan kekuatan alam di air terjun yang dikelilingi hutan tropis rimbun, tempat sempurna untuk menyegarkan jiwa.</p>
                            </div>
                        </div>
                        <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm flex items-start space-x-3.5">
                            <span class="text-[#7A0C16] text-xl mt-0.5"><i class="fa-solid fa-mug-hot"></i></span>
                            <div>
                                <h3 class="text-sm font-bold text-gray-900 mb-1">Proses Kopi Luwak</h3>
                                <p class="text-[11px] text-gray-400 leading-relaxed">Pelajari metode tradisional pembuatan kopi termahal di dunia, mulai dari pemetikan hingga penyangraian manual.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
                    <div class="md:col-span-3">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Itinerary Journey</h2>
                        <div class="relative border-l border-gray-200 ml-3.5 space-y-6">
                            <div class="relative pl-7">
                                <div class="absolute -left-[15px] top-0 bg-[#7A0C16] text-white font-bold text-[10px] w-7 h-7 rounded-full flex items-center justify-center">01</div>
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="text-xs font-bold text-[#7A0C16]">Penjemputan Hotel</h4>
                                    <span class="text-[9px] text-gray-400 font-medium uppercase">08:30 AM</span>
                                </div>
                                <p class="text-[10px] text-gray-400 leading-relaxed">Memulai hari dengan penjemputan tepat waktu dari akomodasi Anda. Sopir kami akan memastikan kenyamanan Anda sebelum memulai perjalanan.</p>
                            </div>
                            <div class="relative pl-7">
                                <div class="absolute -left-[15px] top-0 bg-[#7A0C16] text-white font-bold text-[10px] w-7 h-7 rounded-full flex items-center justify-center">02</div>
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="text-xs font-bold text-gray-900">Sacred Monkey Forest</h4>
                                    <span class="text-[9px] text-gray-400 font-medium uppercase">09:30 AM</span>
                                </div>
                                <p class="text-[10px] text-gray-400 leading-relaxed">Menjelajahi cagar alam hutan hujan yang rimbun, rumah bagi kera ekor panjang dan tiga pura Hindu suci dari abad ke-14.</p>
                            </div>
                            <div class="relative pl-7">
                                <div class="absolute -left-[15px] top-0 bg-[#7A0C16] text-white font-bold text-[10px] w-7 h-7 rounded-full flex items-center justify-center">03</div>
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="text-xs font-bold text-gray-900">Tegalalang & Makan Siang</h4>
                                    <span class="text-[9px] text-gray-400 font-medium uppercase">12:00 PM</span>
                                </div>
                                <p class="text-[10px] text-gray-400 leading-relaxed">Menikmati keindahan sawah bertingkat yang ikonik diikuti dengan makan siang santai dengan pemandangan lembah yang menakjubkan.</p>
                            </div>
                            <div class="relative pl-7">
                                <div class="absolute -left-[15px] top-0 bg-[#7A0C16] text-white font-bold text-[10px] w-7 h-7 rounded-full flex items-center justify-center">04</div>
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="text-xs font-bold text-gray-900">Kebun Kopi & Rempah</h4>
                                    <span class="text-[9px] text-gray-400 font-medium uppercase">02:30 PM</span>
                                </div>
                                <p class="text-[10px] text-gray-400 leading-relaxed">Mengunjungi perkebunan lokal untuk melihat proses pembuatan kopi Luwak dan mencicipi berbagai varian teh herbal Bali.</p>
                            </div>
                            <div class="relative pl-7">
                                <div class="absolute -left-[15px] top-0 bg-[#7A0C16] text-white font-bold text-[10px] w-7 h-7 rounded-full flex items-center justify-center">05</div>
                                <div class="flex justify-between items-baseline mb-1">
                                    <h4 class="text-xs font-bold text-gray-900">Air Terjun Tegenungan</h4>
                                    <span class="text-[9px] text-gray-400 font-medium uppercase">04:00 PM</span>
                                </div>
                                <p class="text-[10px] text-gray-400 leading-relaxed">Menutup petualangan dengan kunjungan ke air terjun megah. Anda bisa berfoto atau sekadar menikmati udara sejuk di sekitar lembah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Apa yang Termasuk</h2>
                        <ul class="space-y-3.5 text-xs text-gray-600 font-medium">
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Transportasi pribadi AC (Avanza/Xpander)</span>
                            </li>
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Sopir/Pemandu berbahasa Inggris & Indonesia</span>
                            </li>
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Semua tiket masuk objek wisata</span>
                            </li>
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Makan siang khas Bali yang lezat</span>
                            </li>
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Air mineral & camilan ringan</span>
                            </li>
                            <li class="flex items-start space-x-2.5">
                                <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-circle-check"></i></span>
                                <span>Biaya parkir & bahan bakar</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="space-y-6">
                
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Pricing Table</span>
                    <h3 class="text-lg font-bold text-[#7A0C16] mt-0.5 mb-5">Tiered Group Rates</h3>
                    
                    <div class="divide-y divide-gray-100 text-xs font-semibold text-gray-700 mb-6">
                        <div class="py-3 flex justify-between">
                            <span class="text-gray-500 font-normal">Solo Traveler</span>
                            <span>USD $73</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-gray-500 font-normal">2 - 4 Person</span>
                            <span>USD $50 <span class="text-[10px] text-gray-400 font-normal">/pax</span></span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-gray-500 font-normal">5 - 7 Person</span>
                            <span>USD $43 <span class="text-[10px] text-gray-400 font-normal">/pax</span></span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-gray-500 font-normal">8 - 15 Person</span>
                            <span>USD $35 <span class="text-[10px] text-gray-400 font-normal">/pax</span></span>
                        </div>
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

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
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

        <div class="mt-16 pt-12 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop" class="w-full h-44 object-cover" alt="Bedugul">
                        <span class="absolute top-3 left-3 bg-white text-[9px] font-bold text-[#7A0C16] px-2.5 py-1 rounded-full uppercase shadow-sm">Top Seller</span>
                    </div>
                    <div class="p-5 flex flex-col justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Bedugul & Tanah Lot</h4>
                            <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Visit the temple on the lake and the iconic sea temple for a perfect sunset experience.</p>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3">
                            <span class="text-xs font-bold text-[#7A0C16]">USD $80 <span class="text-[9px] text-gray-400 font-normal">/pax</span></span>
                            <span class="text-gray-400 group-hover:text-[#7A0C16] transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop" class="w-full h-44 object-cover" alt="Uluwatu">
                    </div>
                    <div class="p-5 flex flex-col justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">Uluwatu Sunset Tour</h4>
                            <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Experience the magical Kecak fire dance against the backdrop of the Indian Ocean.</p>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3">
                            <span class="text-xs font-bold text-[#7A0C16]">USD $73 <span class="text-[9px] text-gray-400 font-normal">/pax</span></span>
                            <span class="text-gray-400 group-hover:text-[#7A0C16] transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=400&auto=format&fit=crop" class="w-full h-44 object-cover" alt="Nusa Penida">
                    </div>
                    <div class="p-5 flex flex-col justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-1">East Nusa Penida</h4>
                            <p class="text-[11px] text-gray-400 leading-relaxed mb-4">Discover the hidden gems of the neighboring island including Diamond Beach and Tree House.</p>
                        </div>
                        <div class="flex justify-between items-center border-t border-gray-50 pt-3">
                            <span class="text-xs font-bold text-[#7A0C16]">USD $95 <span class="text-[9px] text-gray-400 font-normal">/pax</span></span>
                            <span class="text-gray-400 group-hover:text-[#7A0C16] transition-colors"><i class="fa-solid fa-chevron-right text-xs"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-[#151515] text-gray-400 pt-16 pb-6 text-xs">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Indo Bali Tour</h3>
                <p class="leading-relaxed mb-4 text-gray-400">
                    Pengalaman perjalanan eksklusif yang dirancang khusus untuk Anda yang menghargai keindahan dan profesionalisme.
                </p>
                <div class="flex space-x-3 mt-2">
                    <a href="#" class="h-6 w-6 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors">
                        <i class="fa-brands fa-instagram text-[10px]"></i>
                    </a>
                    <a href="#" class="h-6 w-6 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-[#7A0C16] transition-colors">
                        <i class="fa-brands fa-facebook-f text-[10px]"></i>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Layanan</h4>
                <ul class="space-y-2.5">
                    <li><a href="#" class="hover:text-white transition-colors">Paket Tur</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Aktivitas Seru</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Sewa Mobil</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Antar Jemput Bandara</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Antar Jemput Hotel</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Support</h4>
                <ul class="space-y-2.5">
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Partner With Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold uppercase tracking-wider text-[11px] mb-4">Perusahaan</h4>
                <ul class="space-y-2.5 mb-4">
                    <li><a href="#" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                </ul>
                <div class="flex space-x-2">
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-globe text-[10px]"></i></span>
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-share-nodes text-[10px]"></i></span>
                    <span class="w-6 h-6 bg-zinc-800 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-envelope text-[10px]"></i></span>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto px-4 pt-6 border-t border-gray-800 text-center text-gray-500 text-[11px]">
            © 2024 Indo Bali Tour. Exotic Professionalism. All rights reserved.
        </div>
    </footer>

</div>