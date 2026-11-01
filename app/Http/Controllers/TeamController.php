<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\JobApplication;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::where('status', '1')->orWhere('status', 'Aktif')->get();
        
        // Memasukkan JobApplication yang statusnya 'accepted' sebagai card di halaman tim
        $acceptedApplications = JobApplication::where('status', 'accepted')->get();
        foreach($acceptedApplications as $app) {
            $dummyTeam = new Team();
            $dummyTeam->nama = $app->name;
            $dummyTeam->posisi = $app->position;
            $dummyTeam->bahasa = $app->bahasa;
            $dummyTeam->asal = $app->alamat;
            $dummyTeam->email = $app->email;
            $dummyTeam->whatsapp = $app->phone;
            $dummyTeam->sosial_media = $app->social_media;
            $dummyTeam->profile = $app->message;
            $dummyTeam->foto_url = $app->profile_photo_path ? asset('storage/' . $app->profile_photo_path) : null;
            
            // Kita biarkan img null agar menggunakan icon default, karena gambar disimpan dengan format berbeda
            $dummyTeam->img = null; 
            
            $teams->push($dummyTeam);
        }

        // Data dummy pendukung agar tersedia minimal 18 anggota tim (2 slide x 9 card per slide)
        $dummyList = [
            [
                'nama' => 'I Made Danu Yasa',
                'posisi' => 'Founder & Lead Tour Consultant',
                'bahasa' => 'English, Indonesian, Balinese',
                'asal' => 'Gianyar, Bali',
                'email' => 'danu@indobalitour.com',
                'whatsapp' => '+62 812 3456 7891',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Berpengalaman lebih dari 8 tahun memandu wisatawan internasional menjelajahi pesona tersembunyi Bali dan Nusa Penida.',
                'foto_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Ni Wayan Sari Dewi',
                'posisi' => 'Operations & Customer Experience',
                'bahasa' => 'English, Indonesian, Japanese',
                'asal' => 'Denpasar, Bali',
                'email' => 'sari@indobalitour.com',
                'whatsapp' => '+62 812 3456 7892',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Memastikan setiap reservasi, akomodasi, dan rute perjalanan berjalan mulus serta siap melayani kebutuhan wisatawan 24/7.',
                'foto_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Ketut Artawan',
                'posisi' => 'Senior Cultural Tour Guide',
                'bahasa' => 'English, Indonesian, German',
                'asal' => 'Ubud, Bali',
                'email' => 'artawan@indobalitour.com',
                'whatsapp' => '+62 812 3456 7893',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Pakar sejarah pura, adat istiadat, dan seni pertunjukan Bali. Senang membagikan filosofi lokal kepada para pengunjung.',
                'foto_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Gede Surya Pratama',
                'posisi' => 'Adventure & Trekking Specialist',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Kintamani, Bali',
                'email' => 'surya@indobalitour.com',
                'whatsapp' => '+62 812 3456 7894',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Pemandu pendakian Gunung Batur sunrise dan trekking air terjun bersertifikat keselamatan dan pertolongan pertama.',
                'foto_url' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Kadek Ayu Lestari',
                'posisi' => 'Guest Relations Officer',
                'bahasa' => 'English, Indonesian, Mandarin',
                'asal' => 'Sanur, Bali',
                'email' => 'ayu@indobalitour.com',
                'whatsapp' => '+62 812 3456 7895',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Fokus memberikan pelayanan terbaik dan konsultasi rencana liburan impian untuk solo traveler maupun keluarga besar.',
                'foto_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Nyoman Budiarsa',
                'posisi' => 'VIP Fleet & Logistics Coordinator',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Badung, Bali',
                'email' => 'budiarsa@indobalitour.com',
                'whatsapp' => '+62 812 3456 7896',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Mengawasi armada kendaraan rental dan airport transfer kami agar selalu dalam kondisi prima, higienis, dan tepat waktu.',
                'foto_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Komang Rika Adnyani',
                'posisi' => 'Marketing & Visual Storyteller',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Seminyak, Bali',
                'email' => 'rika@indobalitour.com',
                'whatsapp' => '+62 812 3456 7897',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Fotografer dan pembuat konten perjalanan yang membantu wisatawan mengabadikan momen magis selama di Bali.',
                'foto_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Made Suardika',
                'posisi' => 'Water Sports & Marine Instructor',
                'bahasa' => 'English, Indonesian, Russian',
                'asal' => 'Tanjung Benoa, Bali',
                'email' => 'suardika@indobalitour.com',
                'whatsapp' => '+62 812 3456 7898',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Instruktur scuba diving dan watersport berlisensi PADI, mengutamakan keselamatan dan pengalaman laut tak terlupakan.',
                'foto_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Luh Putu Ratna Sari',
                'posisi' => 'Custom Itinerary Specialist',
                'bahasa' => 'English, Indonesian, French',
                'asal' => 'Denpasar, Bali',
                'email' => 'ratna@indobalitour.com',
                'whatsapp' => '+62 812 3456 7899',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Spesialis merancang paket honeymoon romantis dan paket liburan keluarga yang berkesan dan efisien.',
                'foto_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Gusti Ngurah Agung',
                'posisi' => 'Heritage & Culinary Tour Guide',
                'bahasa' => 'English, Indonesian, Italian',
                'asal' => 'Tabanan, Bali',
                'email' => 'ngurah@indobalitour.com',
                'whatsapp' => '+62 812 3456 7800',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Menghadirkan eksplorasi kuliner autentik Bali, kelas memasak tradisional, dan wisata desa organik.',
                'foto_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Ni Kadek Widya Astuti',
                'posisi' => 'Reservation & Finance Officer',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Kuta, Bali',
                'email' => 'widya@indobalitour.com',
                'whatsapp' => '+62 812 3456 7801',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Memastikan konfirmasi pemesanan cepat dan transaksi pembayaran berbagai mata uang aman dan transparan.',
                'foto_url' => 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Wayan Sudarsana',
                'posisi' => 'Nusa Penida Island Explorer',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Nusa Penida, Bali',
                'email' => 'sudarsana@indobalitour.com',
                'whatsapp' => '+62 812 3456 7802',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Putra asli Nusa Penida yang hafal sudut terbaik Kelingking Beach, Angel Billabong, hingga spot snorkeling Manta Ray.',
                'foto_url' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Ketut Meira Wulandari',
                'posisi' => 'Social Experience Coordinator',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Canggu, Bali',
                'email' => 'meira@indobalitour.com',
                'whatsapp' => '+62 812 3456 7803',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Menghubungkan wisatawan dengan spot kafe estetik, beach club ternama, dan komunitas seni kontemporer Bali.',
                'foto_url' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Made Yoga Pradnyana',
                'posisi' => 'North Bali Waterfall Guide',
                'bahasa' => 'English, Indonesian, Spanish',
                'asal' => 'Singaraja, Bali',
                'email' => 'yoga@indobalitour.com',
                'whatsapp' => '+62 812 3456 7804',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Pemandu ahli alam liar Bali Utara: air terjun Sekumpul, Danau Tamblingan, dan dolphin watching di Lovina.',
                'foto_url' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Ni Komang Sri Wahyuni',
                'posisi' => 'Customer Happiness Executive',
                'bahasa' => 'English, Indonesian, Korean',
                'asal' => 'Denpasar, Bali',
                'email' => 'sri@indobalitour.com',
                'whatsapp' => '+62 812 3456 7805',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Senantiasa mendengarkan saran dan memastikan setiap tamu pulang dengan pengalaman liburan berkesan.',
                'foto_url' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Ketut Wirawan',
                'posisi' => 'Senior Chauffeur & Road Navigator',
                'bahasa' => 'English, Indonesian',
                'asal' => 'Mengwi, Bali',
                'email' => 'wirawan@indobalitour.com',
                'whatsapp' => '+62 812 3456 7806',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => '15+ tahun mengemudi tanpa catatan insiden, menguasai rute jalan tikus menghindari kemacetan Bali.',
                'foto_url' => 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'Desak Putu Anjani',
                'posisi' => 'Traditional Arts Coordinator',
                'bahasa' => 'English, Indonesian, Japanese',
                'asal' => 'Gianyar, Bali',
                'email' => 'anjani@indobalitour.com',
                'whatsapp' => '+62 812 3456 7807',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Menghubungkan pelancong dengan workshop tari Bali, ukiran kayu tradisional, dan pembuatan perhiasan perak Celuk.',
                'foto_url' => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'nama' => 'I Gede Agus Mahardika',
                'posisi' => 'Group & Corporate Tour Architect',
                'bahasa' => 'English, Indonesian, German',
                'asal' => 'Ubud, Bali',
                'email' => 'agus@indobalitour.com',
                'whatsapp' => '+62 812 3456 7808',
                'sosial_media' => 'https://instagram.com/indobalitour',
                'profile' => 'Mengorganisir acara gathering perusahaan, team building, dan retreat yoga eksklusif di berbagai penjuru Bali.',
                'foto_url' => 'https://images.unsplash.com/photo-1463453091185-61582044d556?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        // Jika jumlah data asli kurang dari 18, lengkapi dengan data dummy agar tersedia minimal 2 slide (9 card per slide)
        $needed = max(0, 18 - $teams->count());
        foreach (array_slice($dummyList, 0, $needed) as $d) {
            $item = new Team();
            $item->nama = $d['nama'];
            $item->posisi = $d['posisi'];
            $item->bahasa = $d['bahasa'];
            $item->asal = $d['asal'];
            $item->email = $d['email'];
            $item->whatsapp = $d['whatsapp'];
            $item->sosial_media = $d['sosial_media'];
            $item->profile = $d['profile'];
            $item->foto_url = $d['foto_url'];
            $item->img = null;
            $teams->push($item);
        }

        // Chunk data tim menjadi 9 item per slide (3x3 desktop, 1x9 mobile)
        $teamChunks = $teams->chunk(9);

        $pengaturan = Pengaturan::first();
        return view('team.index', compact('teams', 'teamChunks', 'pengaturan'));
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'nomor_telepon' => 'required|string|max:50',
            'profesi' => 'required|string|max:255',
            'bahasa' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'foto_profil' => 'required|image|max:2048',
            'profil_singkat' => 'required|string',
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        $fotoPath = null;
        if ($request->hasFile('foto_profil')) {
            $fotoPath = $request->file('foto_profil')->store('cvs/fotos', 'public');
        }
        
        JobApplication::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email ?? 'no-email@example.com',
            'phone' => $request->nomor_telepon,
            'position' => $request->profesi,
            'bahasa' => $request->bahasa,
            'alamat' => $request->alamat,
            'cv_link' => $cvPath,
            'message' => $request->profil_singkat,
            'nickname' => $request->nama_panggilan,
            'social_media' => $request->sosial_media,
            'profile_photo_path' => $fotoPath,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully! We will contact you soon.');
    }
}
