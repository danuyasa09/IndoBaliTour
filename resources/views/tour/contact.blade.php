<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Hubungi Kami</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body class="bg-[#F4F5F7] text-slate-900 antialiased font-sans">

        <x-navbar />
        <x-floating_contactUs />

        <section class="relative h-[440px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80" alt="Bali pool resort" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-slate-900/60"></div>
            </div>

            <div class="relative flex h-full items-center justify-center px-4 text-center">
                <div class="max-w-3xl">
                    <h1 class="text-4xl sm:text-5xl font-bold text-white" data-aos="fade-up">Hubungi Kami</h1>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.95fr_1.05fr] items-start">
                    
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#7A0C16]">Mari saling terhubung</p>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900" data-aos="fade-up" data-aos-delay="100">
                                Indo Bali Tour: Your Quality Travel Partner
                            </h2>
                            <p class="max-w-xl text-base leading-8 text-slate-600">
                                Hubungi tim kami untuk merencanakan perjalanan Anda di Bali. Ceritakan kebutuhan perjalanan, tanggal, dan destinasi impian Anda, lalu biarkan kami mewujudkan pengalaman liburan terbaik.
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-3xl bg-slate-900 text-white">
                                        <i class="fa-solid fa-location-dot text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Location</p>
                                        <p class="mt-1 text-sm leading-6 text-slate-500">{{ $pengaturan->address }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-3xl bg-[#25D366] text-white">
                                        <i class="fa-brands fa-whatsapp text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">WhatsApp</p>
                                        <p class="mt-1 text-sm leading-6 text-slate-500">{{ $pengaturan->phone }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-3xl bg-slate-900 text-white">
                                        <i class="fa-solid fa-envelope text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Email</p>
                                        <p class="mt-1 text-sm leading-6 text-slate-500">{{ $pengaturan->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200 hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-3xl bg-[#7A0C16] text-white">
                                        <i class="fa-solid fa-clock text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Jam Operasional</p>
                                        <p class="mt-1 text-sm leading-6 text-slate-500">Senin - Minggu, 08:00 - 20:00 WITA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-[1.5rem] bg-white p-8 shadow-[0_40px_80px_rgba(15,23,42,0.08)] border border-gray-200" data-aos="fade-up" data-aos-delay="200">
                            <form action="#" method="POST" class="space-y-8">
                                @csrf
                                
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <label class="block">
                                        <span class="text-sm font-semibold text-slate-900">Nama Lengkap</span>
                                        <input type="text" name="name" required placeholder="Masukkan nama anda" class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#7A0C16] focus:ring-2 focus:ring-[#7A0C16]/10" />
                                    </label>
                                    <label class="block">
                                        <span class="text-sm font-semibold text-slate-900">Alamat Email</span>
                                        <input type="email" name="email" required placeholder="email@gmail.com" class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#7A0C16] focus:ring-2 focus:ring-[#7A0C16]/10" />
                                    </label>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-2">
                                    <label class="block">
                                        <span class="text-sm font-semibold text-slate-900">Nomor Telepon</span>
                                        <input type="tel" name="phone" required placeholder="+62....." class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#7A0C16] focus:ring-2 focus:ring-[#7A0C16]/10" />
                                    </label>
                                    <label class="block">
                                        <span class="text-sm font-semibold text-slate-900">Subjek</span>
                                        <input type="text" name="subject" required placeholder="Reservasi tur" class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#7A0C16] focus:ring-2 focus:ring-[#7A0C16]/10" />
                                    </label>
                                </div>

                                <label class="block">
                                    <span class="text-sm font-semibold text-slate-900">Pesan Anda</span>
                                    <textarea name="message" required rows="5" placeholder="Ceritakan detail rencana perjalanan anda..." class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 outline-none transition focus:border-[#7A0C16] focus:ring-2 focus:ring-[#7A0C16]/10 resize-none"></textarea>
                                </label>

                                <button type="submit" class="w-full rounded-xl bg-[#7A0C16] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#5a0810] shadow-md hover:shadow-lg">
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>

                        <div class="rounded-[1.5rem] bg-white p-6 md:p-8 shadow-[0_40px_80px_rgba(15,23,42,0.08)] border border-gray-200 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                            <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#7A0C16]/10 blur-2xl transition-all group-hover:bg-[#7A0C16]/20"></div>
                            
                            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="flex text-yellow-400 text-sm">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                        </div>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Guestbook</span>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-bold text-slate-900 mb-1" data-aos="fade-up" data-aos-delay="150">Pernah liburan bersama kami?</h3>
                                    <p class="text-sm text-slate-600 max-w-sm">
                                        Bantu traveler lain merencanakan liburan impian mereka di Bali.
                                    </p>
                                </div>
                                <button onclick="openTestimoniModal()" type="button" class="flex-shrink-0 inline-flex items-center justify-center gap-2 rounded-xl bg-[#7A0C16] px-6 py-3.5 text-sm font-semibold text-white shadow-lg transition-all duration-300 hover:bg-[#5a0810] hover:-translate-y-1">
                                    <i class="fa-solid fa-pen-nib"></i> Tulis Cerita Anda
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>

            <div class="mt-16 overflow-hidden rounded-[2rem] border border-gray-200 shadow-sm [&>iframe]:w-full [&>iframe]:h-[420px] [&>iframe]:border-0">
                {!! $pengaturan->map !!}
            </div>
            </div>
        </section>

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