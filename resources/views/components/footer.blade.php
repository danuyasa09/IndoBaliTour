<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indo Bali Tour | Tulis Cerita Mu di Bali</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine JS for light interactivity like mobile menu and dropdowns -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body class="bg-[#FDFDFC] text-gray-900 antialiased font-sans">


<!-- FOOTER -->
        <footer id="contact" class="bg-brand-dark text-gray-400 py-16 border-t border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <!-- Brand info -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 text-white">
                            <!-- Custom SVG Temple Logo matching the footer style -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto group-hover:scale-105 transition-transform duration-200" />
                        </div>
                        <p class="text-sm leading-relaxed">
                            Penyedia jasa pariwisata profesional terkemuka di Bali. Menemani petualangan dan menghidupkan mimpi liburan tropis Anda.
                        </p>
                        <div class="flex space-x-4 pt-2">
                            <!-- Social icons -->
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="#" class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-white hover:bg-brand-red transition-colors">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Column 2: Services -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Services</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Tour Packages</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Car Rental</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Custom Tours</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Activity Bookings</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Airport Transfer</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Support -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Support</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Terms & Conditions</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">F.A.Q.</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Contact Support</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Affiliate Program</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Contact -->
                    <div>
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-6">Contact Us</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li class="flex items-start space-x-3">
                                <span>📍</span>
                                <span>Jl. Sunset Road No. 888, Seminyak, Kuta, Bali, Indonesia</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <span>📞</span>
                                <span>+62 812-3456-7890</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <span>✉️</span>
                                <span>info@indobalitour.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright row -->
                <div class="pt-8 border-t border-zinc-800 text-center text-xs text-gray-500">
                    <p>&copy; {{ date('Y') }} Indo Bali Tour. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </body>
</html>
