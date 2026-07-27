<section class="py-16 bg-[#FDFDFC]">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Bagikan Ceritamu!</h2>
            <p class="mt-3 text-sm text-gray-500 max-w-xl mx-auto">
                Terima kasih telah memilih Indo Bali Tour. Ceritakan pengalaman liburanmu dan bantu traveler lain merencanakan petualangan mereka di Bali.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @auth
            <div class="flex items-center gap-4 mb-8 p-5 bg-gray-50 border border-gray-100 rounded-xl">
                <div class="bg-[#7A0C16] text-white w-12 h-12 rounded-full flex items-center justify-center font-bold shadow-sm flex-shrink-0 text-xl">
                    {{ substr(Auth::user()->nama, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-900">Halo, {{ Auth::user()->nama }}!</h3>
                    <p class="text-xs text-gray-500 mt-0.5">Bagikan pengalaman seru Anda bersama kami di bawah ini.</p>
                </div>
            </div>

            <form action="{{ route('testimony.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-2">Nama Lengkap / Pasangan</label>
                        <input type="text" name="name" value="{{ Auth::user()->nama }}" placeholder="Contoh: Sarah & David" required 
                               class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] focus:ring-1 focus:ring-[#7A0C16] placeholder-gray-400 text-sm transition-colors bg-gray-50/50 focus:bg-white">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-2">Asal Negara</label>
                        <input type="text" name="nationality" placeholder="Contoh: Australia" required 
                               class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] focus:ring-1 focus:ring-[#7A0C16] placeholder-gray-400 text-sm transition-colors bg-gray-50/50 focus:bg-white">
                    </div>
                </div>

                <div x-data="{ rating: 0, hoverRating: 0 }" class="pt-2">
                    <label class="block text-xs font-bold text-gray-700 mb-2">Penilaian Kamu</label>
                    <div class="flex items-center gap-1">
                        <template x-for="i in 5">
                            <button type="button" 
                                    @click="rating = i" 
                                    @mouseover="hoverRating = i" 
                                    @mouseleave="hoverRating = 0"
                                    class="focus:outline-none transition-transform hover:scale-110">
                                <svg class="w-8 h-8 transition-colors duration-200" 
                                     :class="(hoverRating >= i || (!hoverRating && rating >= i)) ? 'text-yellow-400' : 'text-gray-300'"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </button>
                        </template>
                    </div>
                    <input type="hidden" name="rating" :value="rating" required>
                    <p x-show="rating === 0" class="text-xs text-red-500 mt-1">Mohon berikan penilaian bintang.</p>
                </div>



                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">Cerita Pengalaman Anda</label>
                    <textarea name="message" rows="4" required placeholder="Ceritakan keseruan tour Anda, pemandu wisata kami, atau tempat favorit yang Anda kunjungi..." 
                              class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:border-[#7A0C16] focus:ring-1 focus:ring-[#7A0C16] placeholder-gray-400 text-sm resize-none transition-colors bg-gray-50/50 focus:bg-white"></textarea>
                </div>

                <div class="pt-4 text-center sm:text-left">
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-8 py-3.5 bg-[#7A0C16] hover:bg-[#5a0810] text-white text-sm font-semibold rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                        Kirim Testimoni
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                    <p class="mt-3 text-xs text-gray-500">Testimoni Anda akan ditinjau oleh tim kami sebelum ditampilkan di website.</p>
                </div>
            </form>
            @else
            <div class="text-center py-10 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-800">Silakan Login Terlebih Dahulu</h3>
                <p class="text-sm text-gray-500 mt-1 mb-5">Anda perlu masuk ke akun Anda untuk dapat membagikan cerita liburan dan mengirim testimoni.</p>
                <a href="{{ route('login') }}" class="inline-flex justify-center items-center px-6 py-2.5 bg-[#7A0C16] hover:bg-[#5a0810] text-white text-sm font-semibold rounded-md shadow-md hover:shadow-lg transition-all duration-300">
                    Login / Register
                </a>
            </div>
            @endauth
        </div>
    </div>
</section>