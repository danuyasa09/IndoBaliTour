@extends('layouts.admin')

@section('title', 'Daftar Booking')
@section('subtitle', 'Kelola semua data booking dari website')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold">Tipe Booking</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Nama / Item</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Pemesan</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Tanggal</th>
                    <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr class="bg-white border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ ucfirst(str_replace('_', ' ', $booking->type)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->item_title ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $booking->full_name }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->phone }}</div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $booking->booking_date ? $booking->booking_date->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Detail">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-inbox text-4xl text-gray-300"></i>
                                <p>Belum ada data booking.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($bookings->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $bookings->links() }}
        </div>
    @endif
</div>
@endsection
