@extends('layouts.admin')

@section('title', 'Detail Lamaran Pekerjaan')
@section('subtitle', 'Melihat detail informasi dari pelamar')

@section('actions')
<a href="{{ route('admin.job_applications.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <!-- Main Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Informasi Pelamar</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-6">
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Lengkap</span>
                    <span class="block mt-1 text-sm font-medium text-gray-900">{{ $application->name }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Posisi Dilamar</span>
                    <span class="block mt-1 text-sm font-bold text-brand-red">{{ $application->position }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</span>
                    <a href="mailto:{{ $application->email }}" class="block mt-1 text-sm text-blue-600 hover:underline">{{ $application->email }}</a>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">No. WhatsApp</span>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $application->phone) }}" target="_blank" class="block mt-1 text-sm text-green-600 hover:underline flex items-center gap-1">
                        <i class="fa-brands fa-whatsapp"></i> {{ $application->phone }}
                    </a>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Tanggal Masuk</span>
                    <span class="block mt-1 text-sm text-gray-900">{{ $application->created_at->format('l, d F Y - H:i:s') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Link CV / Resume</span>
                    @if($application->cv_link)
                        <a href="{{ asset('storage/' . $application->cv_link) }}" target="_blank" class="inline-flex items-center gap-1 mt-1 text-sm text-blue-600 hover:underline">
                            Lihat CV <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                        </a>
                    @else
                        <span class="block mt-1 text-sm italic text-gray-400">Tidak ada link CV</span>
                    @endif
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Foto Profil</span>
                    @php
                        $fotoUrl = null;
                        if (preg_match('/Foto Profil:\s*(http[s]?:\/\/[^\s]+)/', $application->message, $matches)) {
                            $fotoUrl = $matches[1];
                        }
                    @endphp
                    @if($fotoUrl)
                        <a href="{{ $fotoUrl }}" target="_blank" class="block mt-2">
                            <img src="{{ $fotoUrl }}" alt="Foto Profil" class="h-20 w-20 object-cover rounded-lg border border-gray-200 hover:opacity-80 transition-opacity">
                        </a>
                    @else
                        <span class="block mt-1 text-sm italic text-gray-400">Tidak ada foto</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Message / Cover Letter -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Cover Letter / Pesan</h2>
            <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-wrap leading-relaxed">
@if($application->message){{ preg_replace('/Foto Profil:\s*(http[s]?:\/\/[^\s]+)\n?/', '', $application->message) }}@else<span class="italic text-gray-400">Tidak ada pesan tambahan.</span>@endif
            </div>
        </div>
    </div>

    <!-- Status Sidebar -->
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Status Lamaran</h2>
            
            <form action="{{ route('admin.job_applications.updateStatus', $application->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Update Status</label>
                    <select name="status" class="w-full rounded-lg border-gray-300 focus:border-brand-red focus:ring-brand-red shadow-sm text-sm">
                        <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-brand-red hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-red transition-colors">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
