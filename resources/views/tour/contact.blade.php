<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Hubungi Kami</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#F4F5F7] text-slate-900 antialiased font-sans">

        <x-navbar />

        <section class="relative h-[440px] overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80" alt="Bali pool resort" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-slate-900/60"></div>
            </div>

            <div class="relative flex h-full items-center justify-center px-4 text-center">
                <div class="max-w-3xl">
                    <h1 class="text-4xl sm:text-5xl font-bold text-white">Hubungi Kami</h1>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.95fr_1.05fr] items-start">
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-red">Mari saling terhubung</p>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                                Indo Bali Tour: Your Quality Travel Partner
                            </h2>
                            <p class="max-w-xl text-base leading-8 text-slate-600">
                                Hubungi tim kami untuk merencanakan perjalanan Anda di Bali. Ceritakan kebutuhan perjalanan, tanggal, dan destinasi impian Anda, lalu biarkan kami mewujudkan pengalaman liburan terbaik.
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-900 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Location</p>
                                        <p class="mt-2 text-sm leading-6 text-slate-500">Jl. Ganetri IV No.4, Tonja, Kec. Denpasar Utara, Kota Denpasar, Bali 80237</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 items-center justify-center rounded-3xl bg-[#25D366] text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16.5 3.5a11.68 11.68 0 00-10.8 6.5A11.68 11.68 0 006 16.5l-1.2 4.5 4.5-1.2a11.68 11.68 0 005.5 1.3h.2A11.68 11.68 0 0020.5 7.5a11.68 11.68 0 00-4-4z"/><path d="M15 10.5a2.5 2.5 0 01-3.5 2.5l-1-.5a1 1 0 00-1.3.3l-.8 1.1"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Whatsapps</p>
                                        <p class="mt-2 text-sm leading-6 text-slate-500">+62 812-3456-7890</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-900 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Email</p>
                                        <p class="mt-2 text-sm leading-6 text-slate-500">info@indobalitour.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.75rem] bg-white p-6 shadow-[0_35px_70px_rgba(15,23,42,0.05)] border border-gray-200">
                                <div class="flex items-start gap-4">
                                    <div class="mt-1 flex h-12 w-12 items-center justify-center rounded-3xl bg-brand-red text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">Jam Operasional</p>
                                        <p class="mt-2 text-sm leading-6 text-slate-500">Senin - Minggu, 08:00 - 20:00 WITA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2rem] bg-white p-8 shadow-[0_40px_80px_rgba(15,23,42,0.08)] border border-gray-200">
                        <form class="space-y-6">
                            <div class="grid gap-4 sm:grid-cols-2">
                                <label class="block">
                                    <span class="text-sm font-semibold text-slate-900">Nama Lengkap</span>
                                    <input type="text" placeholder="Masukkan nama anda" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10" />
                                </label>
                                <label class="block">
                                    <span class="text-sm font-semibold text-slate-900">Alamat email</span>
                                    <input type="email" placeholder="email@gmail.com" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10" />
                                </label>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <label class="block">
                                    <span class="text-sm font-semibold text-slate-900">Nomor Telepon</span>
                                    <input type="tel" placeholder="+62....." class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10" />
                                </label>
                                <label class="block">
                                    <span class="text-sm font-semibold text-slate-900">Subjek</span>
                                    <input type="text" placeholder="Reservasi tur" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10" />
                                </label>
                            </div>

                            <label class="block">
                                <span class="text-sm font-semibold text-slate-900">Pesan Anda</span>
                                <textarea rows="6" placeholder="Ceritakan detail rencana perjalanan anda" class="mt-2 w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-900 outline-none transition focus:border-brand-red focus:ring-2 focus:ring-brand-red/10"></textarea>
                            </label>

                            <button type="submit" class="w-full rounded-2xl bg-brand-red px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#7a0c16]">
                                Book Your Tour
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-16 overflow-hidden rounded-[2rem] border border-gray-200 shadow-sm">
                    <iframe class="h-[420px] w-full border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.840113463601!2d115.21680827423931!3d-8.648083193360208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240b87f0e5b49%3A0x87b9050190b20f04!2sDenpasar%2C%20Bali%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1715294216270!5m2!1sen!2sus" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <x-footer />
    </body>
</html>