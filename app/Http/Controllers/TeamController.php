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
            $dummyTeam->bahasa = null; // Atur default null atau ambil jika ada
            $dummyTeam->email = $app->email;
            $dummyTeam->whatsapp = $app->phone;
            $dummyTeam->sosial_media = $app->social_media;
            $dummyTeam->profile = $app->message;
            $dummyTeam->foto_url = $app->profile_photo_path ? asset('storage/' . $app->profile_photo_path) : null;
            
            // Kita biarkan img null agar menggunakan icon default, karena gambar disimpan dengan format berbeda
            $dummyTeam->img = null; 
            
            $teams->push($dummyTeam);
        }

        $pengaturan = Pengaturan::first();
        return view('team.index', compact('teams', 'pengaturan'));
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'nomor_telepon' => 'required|string|max:50',
            'profesi' => 'required|string|max:255',
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
