<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Team & Career - Indo Bali Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans flex flex-col min-h-screen" x-data="{ showForm: {{ ($errors->any() || session('success')) ? 'true' : 'false' }}, showBiodata: false, selectedMember: null }">

    <x-navbar />

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80" alt="Team Work" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6" data-aos="fade-up" data-aos-delay="100">
                The People Behind <span class="text-brand-red">Your Dream Vacation</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto font-light leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="200">
                Our passionate team of local experts is dedicated to making every moment of your Bali journey unforgettable.
            </p>
            <div data-aos="fade-up" data-aos-delay="300" class="mt-8">
                <p class="text-gray-300 text-lg">
                    Tertarik bergabung? Klik <button type="button" @click="showForm = true" class="text-blue-400 hover:text-blue-300 font-medium transition-colors focus:outline-none underline relative z-50 cursor-pointer">Join the Team</button>
                </p>
            </div>
        </div>
    </section>

    <!-- TEAM GRID SECTION (Slider 3x3 Desktop & 1x9 Mobile) -->
    <section class="py-16 sm:py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-gray-900">Our Professional Team</h2>
                <div class="w-20 h-1 bg-brand-red mx-auto mt-4 rounded-full"></div>
                <p class="text-gray-500 text-sm mt-3">Kenali tim profesional kami yang berdedikasi menemani setiap momen petualangan Anda di Bali.</p>
            </div>

            <!-- Team Slider (Sama Persis Seperti Halaman Transfer) -->
            <div x-data="{ activePage: 0, totalPages: {{ isset($teamChunks) ? $teamChunks->count() : 1 }} }" class="relative overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out w-full" :style="'transform: translateX(-' + (activePage * 100) + '%)'">
                    @forelse($teamChunks as $chunkIndex => $chunk)
                    <div class="w-full flex-shrink-0 px-1 pb-4">
                        <!-- Desktop: 3x3 | Mobile: 1x9 -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($chunk as $memberIndex => $member)
                            <div class="group cursor-pointer bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-200 transition-all duration-300 transform hover:-translate-y-1 sm:hover:-translate-y-2 flex flex-row sm:flex-col items-center sm:items-stretch p-4 sm:p-0" 
                                 @click='selectedMember = @json($member); showBiodata = true;'>
                                <div class="relative w-20 h-20 sm:w-full sm:h-auto sm:aspect-square flex-shrink-0 rounded-full sm:rounded-none overflow-hidden bg-gray-100 border sm:border-0 border-gray-200">
                                    @if(isset($member->foto_url) && $member->foto_url)
                                        <img src="{{ $member->foto_url }}" alt="{{ $member->nama }}" class="w-full h-full object-cover transition-transform duration-500 sm:group-hover:scale-110">
                                    @elseif($member->img && file_exists(public_path('images/teams/' . $member->img)))
                                        <img src="{{ asset('images/teams/' . $member->img) }}" alt="{{ $member->nama }}" class="w-full h-full object-cover transition-transform duration-500 sm:group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400">
                                            <i class="fa-solid fa-user text-3xl sm:text-5xl"></i>
                                        </div>
                                    @endif
                                    <div class="hidden sm:block absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                <div class="ml-4 sm:ml-0 p-0 sm:p-6 flex-1 text-left sm:text-center">
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-0.5 sm:mb-1 group-hover:text-brand-red transition-colors line-clamp-1">{{ $member->nama }}</h3>
                                    <p class="text-xs sm:text-sm font-medium text-gray-600 sm:text-brand-red mb-1 sm:mb-3 sm:uppercase sm:tracking-wider line-clamp-1">{{ $member->posisi }}</p>
                                    @if($member->bahasa)
                                    <div class="inline-flex items-center justify-center gap-1.5 text-xs text-white bg-[#00d2ff] sm:bg-gray-50 sm:text-gray-500 py-1 px-3 rounded-full font-medium">
                                        <span class="hidden sm:inline"><i class="fa-solid fa-language"></i></span> {{ $member->bahasa }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center py-10 text-gray-500">
                        Tim kami sedang dalam proses pembaruan.
                    </div>
                    @endforelse
                </div>

                <!-- Slider Controls Persis Seperti Halaman Transfer -->
                <div class="mt-10 flex justify-center items-center gap-2">
                    <button @click="activePage = Math.max(0, activePage - 1)" :disabled="activePage === 0" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed" aria-label="Previous Page">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    
                    <template x-for="i in Math.max(1, totalPages)" :key="i">
                        <button @click="activePage = i - 1" :class="activePage === (i - 1) ? 'bg-[#7A0C16] text-white border-[#7A0C16]' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50'" class="w-8 h-8 rounded-full flex items-center justify-center border text-xs font-medium transition-colors" x-text="i"></button>
                    </template>

                    <button @click="activePage = Math.min(Math.max(0, totalPages - 1), activePage + 1)" :disabled="activePage >= Math.max(0, totalPages - 1)" class="w-8 h-8 rounded-full flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-[#7A0C16] hover:text-white hover:border-[#7A0C16] transition-colors disabled:opacity-50 disabled:cursor-not-allowed" aria-label="Next Page">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BIODATA MODAL -->
    <div x-show="showBiodata" 
         style="display: none;"
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="biodata-title" role="dialog" aria-modal="true">
        
        <div x-show="showBiodata" 
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/40 transition-opacity backdrop-blur-sm"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div x-show="showBiodata" @click.away="showBiodata = false"
                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-md border border-gray-100 p-6 sm:p-8">
                
                <button @click="showBiodata = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none z-10 bg-gray-50 hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>

                <div class="text-center">
                    <div class="w-24 h-24 rounded-full mx-auto overflow-hidden bg-gray-100 border-4 border-gray-50 shadow-sm mb-4">
                        <template x-if="selectedMember && selectedMember.foto_url">
                            <img :src="selectedMember.foto_url" :alt="selectedMember.nama" class="w-full h-full object-cover">
                        </template>
                        <template x-if="selectedMember && !selectedMember.foto_url && selectedMember.img">
                            <img :src="'{{ asset('images/teams') }}/' + selectedMember.img" :alt="selectedMember.nama" class="w-full h-full object-cover">
                        </template>
                        <template x-if="selectedMember && !selectedMember.foto_url && !selectedMember.img">
                            <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400">
                                <i class="fa-solid fa-user text-4xl"></i>
                            </div>
                        </template>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mb-1" x-text="selectedMember ? selectedMember.nama : ''"></h3>
                    <p class="text-brand-red font-medium mb-4 uppercase tracking-wide text-sm" x-text="selectedMember ? selectedMember.posisi : ''"></p>
                    
                    <div class="bg-gray-50 rounded-xl p-4 text-left space-y-3 mb-6">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-language text-gray-400 mt-1 w-5 text-center"></i>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Bahasa</p>
                                <p class="text-gray-800 text-sm font-medium" x-text="selectedMember && selectedMember.bahasa ? selectedMember.bahasa : '-'"></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-gray-400 mt-1 w-5 text-center"></i>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Asal</p>
                                <p class="text-gray-800 text-sm font-medium" x-text="selectedMember && selectedMember.asal ? selectedMember.asal : '-'"></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope text-gray-400 mt-1 w-5 text-center"></i>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Email</p>
                                <template x-if="selectedMember && selectedMember.email">
                                    <a :href="'mailto:' + selectedMember.email" class="text-brand-red hover:underline text-sm font-medium" x-text="selectedMember.email"></a>
                                </template>
                                <template x-if="!selectedMember || !selectedMember.email">
                                    <p class="text-gray-800 text-sm font-medium">-</p>
                                </template>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-brands fa-whatsapp text-gray-400 mt-1 w-5 text-center text-lg"></i>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">WhatsApp</p>
                                <template x-if="selectedMember && selectedMember.whatsapp">
                                    <a :href="'https://wa.me/' + selectedMember.whatsapp.replace(/[^0-9]/g, '')" target="_blank" class="text-green-600 hover:underline text-sm font-medium" x-text="selectedMember.whatsapp"></a>
                                </template>
                                <template x-if="!selectedMember || !selectedMember.whatsapp">
                                    <p class="text-gray-800 text-sm font-medium">-</p>
                                </template>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-link text-gray-400 mt-1 w-5 text-center"></i>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Sosial Media</p>
                                <template x-if="selectedMember && selectedMember.sosial_media">
                                    <a :href="selectedMember.sosial_media" target="_blank" class="text-blue-600 hover:underline text-sm font-medium truncate inline-block max-w-[200px]" x-text="selectedMember.sosial_media"></a>
                                </template>
                                <template x-if="!selectedMember || !selectedMember.sosial_media">
                                    <p class="text-gray-800 text-sm font-medium">-</p>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div x-show="selectedMember && selectedMember.profile" class="text-left text-sm text-gray-600 border-t border-gray-100 pt-4 mt-2">
                        <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Profil Singkat</p>
                        <p x-html="selectedMember ? selectedMember.profile : ''" class="leading-relaxed"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CAREER FORM MODAL -->
    <div x-show="showForm" 
         style="display: none;"
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <!-- Backdrop -->
        <div x-show="showForm" 
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/10 transition-opacity backdrop-blur-md"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Panel -->
            <div x-show="showForm" @click.away="showForm = false"
                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-4xl border border-gray-100">
                
                <!-- Close Button -->
                <button @click="showForm = false" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 focus:outline-none z-10 bg-gray-50 hover:bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>

                <div class="p-8 sm:p-10 relative">
                    <div class="text-center mb-8">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-red-100 text-brand-red text-sm font-bold tracking-wider uppercase mb-4">
                            Join Our Team
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">
                            Formulir Pendaftaran
                        </h2>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-start gap-3 mb-6">
                            <i class="fa-solid fa-circle-check mt-0.5"></i>
                            <div>
                                <p class="font-bold">Thank You!</p>
                                <p class="text-sm mt-1">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                            <ul class="list-disc list-inside text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('team.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_lengkap" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Nama Lengkap">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nama Panggilan <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_panggilan" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Nama Panggilan">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Nomor Telepon <span class="text-red-500">*</span></label>
                                <input type="text" name="nomor_telepon" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Nomor Telepon">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Email (Opsional)</label>
                                <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Email">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Profesi <span class="text-red-500">*</span></label>
                                <input type="text" name="profesi" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Profesi">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Link Sosial Media (Opsional)</label>
                                <input type="url" name="sosial_media" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Link Sosmed">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Bahasa yang Dikuasai <span class="text-red-500">*</span></label>
                                <input type="text" name="bahasa" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Contoh: English, Indonesian">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Alamat / Asal <span class="text-red-500">*</span></label>
                                <input type="text" name="alamat" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white" placeholder="Contoh: Gianyar, Bali">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Profil Singkat <span class="text-red-500">*</span></label>
                            <textarea name="profil_singkat" required rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white resize-none" placeholder="Ceritakan tentang diri Anda..."></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Unggah Foto Profil (Bebas Rapi) <span class="text-red-500">*</span></label>
                            <input type="file" name="foto_profil" required accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-800">
                            <p class="text-[10px] text-gray-400 mt-1">note: max. 2MB (IMAGE)</p>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1.5">Unggah CV <span class="text-red-500">*</span></label>
                            <input type="file" name="cv" required accept="image/*" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-800">
                            <p class="text-[10px] text-gray-400 mt-1">note: max. 2MB (IMAGE)</p>
                        </div>

                        <button type="submit" class="w-full bg-brand-red hover:bg-red-800 text-white font-bold py-4 px-6 rounded-xl shadow-[0_10px_20px_-5px_rgba(122,12,22,0.4)] transform transition-all duration-300 hover:-translate-y-1 mt-4">
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOATING CONTACT (Hidden on this page but component included for consistency if needed, or maybe just remove it here) -->
    <!-- Let's include the footer -->
    <main class="flex-grow"></main>
    <x-footer />
    
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
