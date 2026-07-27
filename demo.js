import puppeteer from 'puppeteer';

(async () => {
    console.log('Memulai script demo UI otomatis...');
    console.log('Pastikan server lokal Anda (Laragon/php artisan serve) sedang berjalan!');
    
    // Buka browser Chromium
    const browser = await puppeteer.launch({ 
        headless: false, // Set false agar browser tampil dan demo bisa dilihat
        defaultViewport: null, // Full screen
        args: ['--start-maximized', '--window-size=1920,1080'] 
    });
    
    const page = await browser.newPage();
    
    // Ganti URL ini dengan URL website Anda. 
    // Karena menggunakan Laragon, jika http://localhost tidak berhasil, ganti menjadi http://indobalitour.test
    const baseUrl = 'http://localhost'; 
    console.log(`Mengakses halaman: ${baseUrl}`);
    
    try {
        // Buka halaman utama
        await page.goto(baseUrl, { waitUntil: 'networkidle2' });
        
        // Scroll halaman secara otomatis dari atas ke bawah
        console.log('Mendemokan halaman utama...');
        await autoScroll(page);
        await new Promise(r => setTimeout(r, 1000)); // Jeda sejenak

        // Navigasi ke halaman Package Tour
        console.log('Mendemokan halaman Package Tour...');
        await page.goto(`${baseUrl}/tour/package_tour`, { waitUntil: 'networkidle2' });
        await autoScroll(page);
        await new Promise(r => setTimeout(r, 1000));

        // Navigasi ke halaman Car Rental
        console.log('Mendemokan halaman Car Rental...');
        await page.goto(`${baseUrl}/tour/car_rental`, { waitUntil: 'networkidle2' });
        await autoScroll(page);
        await new Promise(r => setTimeout(r, 1000));
        
        // Navigasi ke halaman Experience
        console.log('Mendemokan halaman Experience...');
        await page.goto(`${baseUrl}/tour/experience`, { waitUntil: 'networkidle2' });
        await autoScroll(page);
        await new Promise(r => setTimeout(r, 1000));

        // Navigasi ke halaman Contact Us
        console.log('Mendemokan halaman Contact...');
        await page.goto(`${baseUrl}/tour/contact`, { waitUntil: 'networkidle2' });
        await autoScroll(page);
        
        console.log('Demo selesai! Browser akan tertutup secara otomatis dalam 5 detik.');
        await new Promise(r => setTimeout(r, 5000));
        
    } catch (error) {
        console.error('Terjadi kesalahan saat menjalankan demo:', error);
        console.log('Pastikan URL website sudah benar dan server sedang berjalan.');
    } finally {
        await browser.close();
    }
})();

// Fungsi pendukung untuk melakukan scroll halus (smooth scroll)
async function autoScroll(page){
    await page.evaluate(async () => {
        await new Promise((resolve) => {
            var totalHeight = 0;
            var distance = 100;
            var timer = setInterval(() => {
                var scrollHeight = document.body.scrollHeight;
                window.scrollBy(0, distance);
                totalHeight += distance;

                if(totalHeight >= scrollHeight - window.innerHeight){
                    clearInterval(timer);
                    resolve();
                }
            }, 50); // Kecepatan scroll (semakin kecil, semakin cepat)
        });
    });
}
