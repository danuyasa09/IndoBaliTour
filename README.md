# Indo Bali Tour - Exploring Paradise Together

Indo Bali Tour adalah platform web modern, responsif, dan dinamis yang dibangun untuk agen perjalanan dan wisata yang berbasis di Bali. Website ini dirancang untuk memberikan pengalaman pemesanan yang mulus dan premium bagi pengguna untuk paket tur, aktivitas seru, penyewaan mobil, dan layanan antar-jemput.

## 🚀 Fitur Utama

- **UI/UX Premium:** Dibangun dengan Tailwind CSS dan Alpine.js, menampilkan animasi halus (AOS), elemen desain *glassmorphism*, dan *slider hero Ken Burns* yang dinamis.
- **Siap Global:** 
  - **Multi-Bahasa:** Terintegrasi dengan mulus menggunakan Google Translate untuk pengunjung internasional.
  - **Multi-Mata Uang:** Konversi harga dinamis secara *real-time* (USD, IDR) yang didukung oleh Open Exchange Rates API.
- **Integrasi Pemesanan via WhatsApp:** Sistem pemesanan terpadu yang menangkap input pengguna dan secara otomatis memformatnya menjadi pesan WhatsApp yang siap dikirim untuk komunikasi instan dengan pakar lokal.
- **Floating Contact Action:** Tombol Aksi Melayang (FAB) yang sangat mudah diakses untuk panggilan langsung, email, dan obrolan WhatsApp.
- **Panel Admin Komprehensif:** Dasbor *backend* yang aman untuk mengelola paket tur, armada kendaraan, galeri visual, dan testimoni pelanggan dengan mudah.

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel 11 (PHP)
- **Frontend:** Blade Templating, Tailwind CSS, Alpine.js
- **Pustaka Tambahan:**
  - Swiper.js (untuk korsel yang ramah seluler)
  - AOS (Animate On Scroll)
  - Summernote (Editor WYSIWYG untuk permintaan pemesanan khusus)
  - FontAwesome

## 💻 Instalasi & Pengaturan

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Clone repositori:**
   ```bash
   git clone <url-repositori-anda>
   cd IndoBaliTour
   ```

2. **Instal dependensi PHP:**
   ```bash
   composer install
   ```

3. **Instal dependensi Node.js:**
   ```bash
   npm install
   ```

4. **Pengaturan Environment:**
   Salin file `.env.example` menjadi `.env` dan konfigurasi pengaturan database Anda.
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi & Seeder (jika tersedia):**
   ```bash
   php artisan migrate --seed
   ```

7. **Storage Link:**
   Buat tautan simbolik (symbolic link) untuk folder penyimpanan agar dapat mengakses gambar yang diunggah.
   ```bash
   php artisan storage:link
   ```

8. **Mulai Server Pengembangan:**
   Anda perlu menjalankan dua jendela/tab terminal:
   
   Terminal 1 (Backend):
   ```bash
   php artisan serve
   ```
   
   Terminal 2 (Kompilasi Frontend):
   ```bash
   npm run dev
   ```

9. **Kunjungi aplikasi:**
   Buka browser Anda dan navigasikan ke `http://localhost:8000`

## 📄 Lisensi

Proyek ini adalah perangkat lunak sumber terbuka (open-source) yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
