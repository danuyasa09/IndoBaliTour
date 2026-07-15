<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private function getBlogs()
    {
        return [
            'pantai-tersembunyi-bali-selatan' => [
                'title' => '5 Pantai Tersembunyi di Bali Selatan yang Wajib Dikunjungi',
                'category' => 'TRAVEL TIPS',
                'date' => '10 Juli 2026',
                'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=800&auto=format&fit=crop',
                'excerpt' => 'Bosan dengan pantai yang ramai? Temukan pantai pasir putih tersembunyi di balik tebing Pecatu yang masih sangat alami.',
                'author' => 'Gede Danuyasa',
                'read_time' => '5 min read',
                'content' => '
                    <p class="mb-6">Bali Selatan terkenal dengan tebing-tebing kapur yang megah yang berbatasan langsung dengan Samudra Hindia. Di balik tebing-tebing terjal ini, tersembunyi pantai-pantai pasir putih berair kristal yang belum banyak dijamah wisatawan massal. Jika Anda bosan dengan keramaian Kuta atau Seminyak, berikut adalah 5 pantai tersembunyi di Bali Selatan yang wajib masuk dalam daftar perjalanan Anda:</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Pantai Nyang Nyang</h3>
                    <p class="mb-4">Pantai Nyang Nyang adalah hamparan pasir putih bersih sepanjang 1,5 km yang terletak di bawah tebing tinggi di Pecatu. Untuk mencapai pantai ini, Anda harus menuruni ratusan anak tangga atau menggunakan akses jalan tanah yang cukup curam. Kelelahan Anda akan terbayar lunas begitu melihat garis pantai yang luas, bangkai kapal ikonik yang dihiasi grafiti, serta ombak yang cocok untuk berselancar.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. Pantai Green Bowl</h3>
                    <p class="mb-4">Terkenal sebagai surga tersembunyi bagi para peselancar berpengalaman, Pantai Green Bowl menawarkan keindahan mangkuk karang hijau alami yang terlihat jelas saat air surut. Dinamakan Green Bowl karena saat air surut, terumbu karang yang dipenuhi lumut hijau membentuk kolam dangkal menyerupai mangkuk hijau. Anda harus menuruni sekitar 300 anak tangga dari tebing dekat kuil lokal untuk sampai ke sini.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Pantai Gunung Payung</h3>
                    <p class="mb-4">Pantai ini menawarkan suasana tenang dengan air laut biru kehijauan yang tenang dan pasir putih yang sangat halus. Letaknya tidak jauh dari Pantai Pandawa, namun jauh lebih sunyi. Saat ini sudah tersedia fasilitas shuttle untuk menuruni tebing jika Anda tidak ingin berjalan kaki. Pantai ini sangat ideal untuk berenang santai atau berfoto dengan latar tebing hijau yang asri.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Pantai Melasti (Sisi Tersembunyi)</h3>
                    <p class="mb-4">Meskipun Pantai Melasti sekarang cukup terkenal dengan jalan aspal mulus di sela-sela tebing kapur raksasa, ada area di bagian ujung barat dan timur yang masih sangat tenang dan jarang dikunjungi. Di sini Anda bisa menikmati pemandangan matahari terbenam yang memukau tanpa terganggu oleh keramaian beach club di sekitarnya.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">5. Pantai Suluban (Blue Point Beach)</h3>
                    <p class="mb-4">Pantai Suluban sangat unik karena Anda harus berjalan melewati celah-celah tebing batu sempit dan gua-gua kapur yang eksotis untuk mencapainya. Dinamakan Suluban dari kata bahasa Bali "mesulub" yang berarti berjalan di bawah sesuatu. Gua batu kapur yang dramatis ini membuka jalan langsung ke perairan biru jernih yang menjadi surga dunia bagi para peselancar profesional.</p>
                    
                    <div class="bg-gray-50 border-l-4 border-brand-red p-4 my-8 rounded-r-lg">
                        <p class="italic text-gray-600">"Perjalanan ke pantai-pantai ini memerlukan stamina ekstra karena akses turun tebing yang menantang. Pastikan memakai alas kaki yang nyaman, membawa air minum yang cukup, dan menjaga kebersihan dengan tidak membuang sampah sembarangan."</p>
                    </div>
                '
            ],
            'panduan-nyepi-bali' => [
                'title' => 'Panduan Lengkap Menghadiri Hari Raya Nyepi di Bali',
                'category' => 'CULTURE',
                'date' => '8 Juli 2026',
                'image' => 'https://images.unsplash.com/photo-1540959733332-eab4deceeaf7?q=80&w=800&auto=format&fit=crop',
                'excerpt' => 'Pahami aturan, makna spiritual, dan apa saja yang boleh serta tidak boleh dilakukan wisatawan saat pulau Bali hening total.',
                'author' => 'Wayan Sudarta',
                'read_time' => '6 min read',
                'content' => '
                    <p class="mb-6">Hari Raya Nyepi merupakan hari paling suci dan unik bagi masyarakat Hindu Bali. Selama 24 jam penuh, seluruh pulau Bali benar-benar berhenti beraktivitas untuk pemurnian diri dan alam semesta. Bagi wisatawan yang kebetulan berada di Bali saat Nyepi, momen ini menawarkan pengalaman sekali seumur hidup untuk menikmati keheningan total dan langit malam bertabur bintang yang tiada duanya. Namun, ada aturan ketat yang wajib dipatuhi.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Makna Spiritual Nyepi</h3>
                    <p class="mb-4">Nyepi menandai pergantian Tahun Baru Saka. Tujuannya adalah untuk memohon kepada Tuhan Yang Maha Esa guna menyucikan Bhuana Alit (diri manusia) dan Bhuana Agung (alam semesta). Umat Hindu melaksanakan ritual Catur Brata Penyepian, yaitu empat larangan utama:</p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li><strong>Amati Geni:</strong> Tidak boleh menyalakan api atau lampu, termasuk amarah/nafsu.</li>
                        <li><strong>Amati Karya:</strong> Tidak boleh melakukan aktivitas fisik atau bekerja.</li>
                        <li><strong>Amati Lelunganan:</strong> Tidak boleh bepergian ke luar rumah atau lingkungan hotel.</li>
                        <li><strong>Amati Lelanguan:</strong> Tidak boleh menikmati hiburan atau bersenang-senang.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Aturan untuk Wisatawan</h3>
                    <p class="mb-4">Jika Anda berada di Bali saat Nyepi, berikut beberapa hal penting yang harus Anda ketahui:</p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li><strong>Tetap Berada di Area Hotel:</strong> Anda dilarang keras meninggalkan pekarangan hotel/penginapan Anda mulai pukul 06.00 pagi hingga pukul 06.00 pagi keesokan harinya.</li>
                        <li><strong>Pencahayaan Minimal:</strong> Pada malam hari, semua lampu luar hotel akan dimatikan. Anda diperbolehkan menyalakan lampu kamar dengan tirai yang ditutup rapat agar tidak ada cahaya yang terlihat dari luar.</li>
                        <li><strong>Suara Tenang:</strong> Jaga volume suara Anda di dalam hotel agar tidak menimbulkan kebisingan yang mengganggu kesunyian sekitar.</li>
                        <li><strong>Bandara Ditutup:</strong> Bandara Internasional I Gusti Ngurah Rai ditutup total selama Nyepi, tidak ada penerbangan komersial yang beroperasi kecuali untuk keadaan darurat medis (dengan pengawalan Pecalang/Polisi Adat).</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">Tips Menikmati Nyepi</h3>
                    <p class="mb-4">Gunakan kesempatan langka ini untuk bermeditasi, beristirahat total, atau menikmati keindahan langit malam. Karena tidak ada polusi cahaya sama sekali di seluruh pulau, Anda akan dapat melihat gugusan bintang Bima Sakti (Milky Way) secara jelas dengan mata telanjang jika langit sedang cerah.</p>
                    
                    <div class="bg-gray-50 border-l-4 border-brand-red p-4 my-8 rounded-r-lg">
                        <p class="italic text-gray-600">"Satu hari sebelum Nyepi, Anda dapat menyaksikan parade patung ogoh-ogoh yang megah di malam hari. Ini adalah festival kebudayaan yang luar biasa dan merupakan bagian dari ritual pengusiran roh jahat sebelum hari keheningan dimulai."</p>
                    </div>
                '
            ],
            'kuliner-tradisional-bali' => [
                'title' => 'Kuliner Tradisional Bali Selain Bebek yang Menggugah Selera',
                'category' => 'CULINARY',
                'date' => '5 Juli 2026',
                'image' => 'https://images.unsplash.com/photo-1589308078059-be1415eab4c3?q=80&w=800&auto=format&fit=crop',
                'excerpt' => 'Dari Nasi Ayam Kedewatan hingga Sate Lilit autentik, inilah rekomendasi kuliner wajib coba di warung lokal Bali.',
                'author' => 'Made Artana',
                'read_time' => '4 min read',
                'content' => '
                    <p class="mb-6">Bali bukan hanya tentang pantai yang indah dan budaya yang eksotis, tetapi juga tentang surga kuliner yang kaya akan bumbu rempah tradisional (Base Gede). Kebanyakan wisatawan sangat akrab dengan kuliner Bebek Bengil atau Bebek Tepi Sawah. Namun, petualangan kuliner Bali jauh lebih luas dari itu. Mari kita intip kuliner tradisional Bali yang wajib Anda coba saat berlibur:</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Nasi Campur Bali & Nasi Ayam Kedewatan</h3>
                    <p class="mb-4">Nasi Campur Bali menyajikan sepiring nasi putih hangat dengan berbagai macam lauk pauk khas Bali dalam porsi kecil. Mulai dari sate lilit, ayam suwir betutu, telur bumbu genep, urab sayur, kacang goreng, kulit ayam renyah, dan sambal matah atau sambal mbe. Nasi Ayam Kedewatan di Ubud adalah salah satu versi nasi ayam paling legendaris dengan cita rasa pedas gurih yang autentik.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. Sate Lilit</h3>
                    <p class="mb-4">Berbeda dari sate pada umumnya yang menggunakan potongan daging tusuk, Sate Lilit terbuat dari daging cincang halus (bisa berupa ikan, ayam, atau babi) yang dicampur dengan parutan kelapa muda, santan, jeruk nipis, bawang merah, dan ramuan Base Gede. Adonan ini kemudian dililitkan pada batang serai atau bambu lebar sebelum dipanggang di atas arang. Batang serai memberikan aroma wangi khas yang meresap ke dalam daging.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Ayam Betutu</h3>
                    <p class="mb-4">Ayam Betutu adalah makanan tradisional dengan bumbu betutu yang sangat kaya rempah. Proses pembuatannya sangat unik: ayam utuh diisi dengan daun singkong dan bumbu dasar genep di dalamnya, kemudian dibungkus daun pisang atau pelepah pinang, lalu dipanggang di dalam sekam menyala selama berjam-jam hingga dagingnya sangat empuk dan bumbunya meresap sampai ke tulang.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Lawar</h3>
                    <p class="mb-4">Lawar adalah hidangan campuran sayur-sayuran rebus (biasanya kacang panjang atau nangka muda), kelapa parut, daging cincang, dan bumbu rempah khas Bali. Ada dua jenis lawar: Lawar Putih (tanpa campuran darah hewan) dan Lawar Merah (menggunakan darah segar yang dicampur bumbu untuk cita rasa gurih ekstra). Lawar sangat nikmat disantap sebagai pendamping nasi hangat.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">5. Rujak Kuah Pindang</h3>
                    <p class="mb-4">Bagi pecinta kuliner unik dengan rasa kontras, Rujak Kuah Pindang wajib dicoba. Rujak buah segar (mangga muda, kedondong, pepaya setengah matang) disiram dengan kuah kaldu ikan pindang hangat yang asin pedas manis. Kombinasi rasa segar buah, asin gurih kaldu ikan, serta pedas cabai rawit menciptakan sensasi rasa segar yang luar biasa.</p>
                    
                    <div class="bg-gray-50 border-l-4 border-brand-red p-4 my-8 rounded-r-lg">
                        <p class="italic text-gray-600">"Jika Anda mencari kuliner halal, Nasi Ayam Kedewatan Ibu Mangku, Nasi Campur Wardani, dan Ayam Betutu Khas Gilimanuk adalah opsi yang sangat populer dan terjamin kehalalannya bagi wisatawan Muslim."</p>
                    </div>
                '
            ],
        ];
    }

    public function index()
    {
        $blogs = $this->getBlogs();
        return view('tour.blog&event', compact('blogs'));
    }

    public function show($slug)
    {
        $blogs = $this->getBlogs();
        
        if (!array_key_exists($slug, $blogs)) {
            abort(404);
        }
        
        $blog = $blogs[$slug];
        
        // Exclude current blog from other recommendations, limit to 2 or 3
        $otherBlogs = array_filter($blogs, function($key) use ($slug) {
            return $key !== $slug;
        }, ARRAY_FILTER_USE_KEY);

        return view('tour.blog_detail', compact('blog', 'otherBlogs'));
    }
}
