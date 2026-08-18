@extends('layouts.admin')

@section('title', 'Detail Booking')
@section('subtitle', 'Informasi lengkap pemesanan')

@section('actions')
<a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm flex items-center gap-2">
    <i class="fa-solid fa-arrow-left"></i>
    Kembali
</a>
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
                            <p class="text-base text-gray-900 break-words">{{ $value ?? '-' }}</p>
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
                    <p class="text-sm text-gray-500 font-medium mb-1">Status</p>
                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-yellow-100 text-yellow-800 inline-block">
                        {{ $booking->status }}
                    </span>
                </div>
                
                <div class="pt-4 mt-2 border-t border-gray-100">
                    <p class="text-xs text-gray-400">Dibuat pada: {{ $booking->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
