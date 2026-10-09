@extends('layouts.admin')

@section('title', 'Detail Booking')
@section('subtitle', 'Informasi lengkap pemesanan')

@section('actions')
<div class="flex items-center gap-3">
    <a href="{{ route('admin.bookings.print', $booking->id) }}" target="_blank" class="px-4 py-2 bg-brand-red text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm flex items-center gap-2 shadow-sm">
        <i class="fa-solid fa-print"></i>
        Cetak (PDF)
    </a>
    <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm flex items-center gap-2">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali
    </a>
</div>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Informasi Pemesan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Nama Lengkap</p>
                    <p class="text-base text-gray-900">{{ $booking->full_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium">Email</p>
                    <p class="text-base text-gray-900">{{ $booking->email ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-medium">No. Telepon / WhatsApp</p>
                    <p class="text-base text-gray-900">{{ $booking->phone }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Detail Tambahan (Form Specific)</h2>
            @if($booking->details && is_array($booking->details))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($booking->details as $key => $value)
                        <div>
                            <p class="text-sm text-gray-500 font-medium capitalize">{{ str_replace('_', ' ', $key) }}</p>
                            <div class="text-base text-gray-900 break-words prose-sm prose">{!! $value ?? '-' !!}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-sm">Tidak ada detail tambahan.</p>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Informasi Booking</h2>
            
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Tipe</p>
                    <p class="text-base text-gray-900 font-medium capitalize">{{ str_replace('_', ' ', $booking->type) }}</p>
                </div>
                
                @if($booking->item_title)
                <div>
                    <p class="text-sm text-gray-500 font-medium">Nama Item / Tour</p>
                    <p class="text-base text-gray-900">{{ $booking->item_title }}</p>
                </div>
                @endif
                
                <div>
                    <p class="text-sm text-gray-500 font-medium">Tanggal Booking</p>
                    <p class="text-base text-gray-900">{{ $booking->booking_date ? $booking->booking_date->format('d F Y') : '-' }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500 font-medium">Jumlah Peserta</p>
                    <p class="text-base text-gray-900">{{ $booking->total_person ? $booking->total_person . ' Orang' : '-' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-medium mb-2">Status</p>
                    @if(session('success'))
                        <div class="mb-3 px-3 py-2 bg-green-50 border border-green-200 text-green-700 rounded-lg text-xs font-medium">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="flex-1 text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red bg-white text-gray-700">
                            <option value="Pending"   @selected($booking->status === 'Pending')>⏳ Pending</option>
                            <option value="Confirmed" @selected($booking->status === 'Confirmed')>✅ Confirmed</option>
                            <option value="Cancelled" @selected($booking->status === 'Cancelled')>❌ Cancelled</option>
                        </select>
                        <button type="submit" class="px-3 py-2 bg-brand-red text-white text-xs font-bold rounded-lg hover:bg-red-700 transition-colors shadow-sm whitespace-nowrap">
                            Simpan
                        </button>
                    </form>
                </div>
                
                <div class="pt-4 mt-2 border-t border-gray-100">
                    <p class="text-xs text-gray-400">Dibuat pada: {{ $booking->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
