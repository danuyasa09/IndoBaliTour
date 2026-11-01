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
                            <div x-data="{
                                currentStatus: '{{ $booking->status }}',
                                isLoading: false,
                                getClasses(status) {
                                    switch(status) {
                                        case 'Pending':
                                            return 'bg-amber-50 text-amber-800 border-amber-300 hover:bg-amber-100 focus:ring-amber-400';
                                        case 'Confirmed':
                                            return 'bg-emerald-50 text-emerald-800 border-emerald-300 hover:bg-emerald-100 focus:ring-emerald-400';
                                        case 'Cancelled':
                                            return 'bg-rose-50 text-rose-800 border-rose-300 hover:bg-rose-100 focus:ring-rose-400';
                                        default:
                                            return 'bg-gray-50 text-gray-700 border-gray-200';
                                    }
                                },
                                async updateStatus(e) {
                                    const newStatus = e.target.value;
                                    const prev = this.currentStatus;
                                    if (newStatus === prev) return;
                                    this.isLoading = true;
                                    try {
                                        const res = await fetch('{{ route('admin.bookings.updateStatus', $booking->id) }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.getAttribute('content') || '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({ _method: 'PATCH', status: newStatus })
                                        });
                                        const data = await res.json();
                                        if (res.ok && data.success) {
                                            this.currentStatus = newStatus;
                                            if (window.showToast) window.showToast(data.message || 'Status booking berhasil diubah', 'success');
                                        } else {
                                            e.target.value = prev;
                                            if (window.showToast) window.showToast(data.message || 'Gagal mengubah status', 'error');
                                        }
                                    } catch (err) {
                                        e.target.value = prev;
                                        if (window.showToast) window.showToast('Terjadi kesalahan jaringan', 'error');
                                    } finally {
                                        this.isLoading = false;
                                    }
                                }
                            }">
                                <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="inline-block relative">
                                    @csrf
                                    @method('PATCH')
                                    <div class="relative inline-flex items-center">
                                        <select name="status"
                                                :value="currentStatus"
                                                :disabled="isLoading"
                                                @change="updateStatus($event)"
                                                :class="getClasses(currentStatus)"
                                                class="appearance-none cursor-pointer text-xs font-semibold pl-3 pr-7 py-1 rounded-full border transition-colors focus:outline-none disabled:opacity-60 disabled:cursor-not-allowed"
                                                title="Klik untuk ubah status booking">
                                            <option value="Pending" @selected($booking->status === 'Pending') class="bg-white text-gray-800">Pending</option>
                                            <option value="Confirmed" @selected($booking->status === 'Confirmed') class="bg-white text-gray-800">Confirmed</option>
                                            <option value="Cancelled" @selected($booking->status === 'Cancelled') class="bg-white text-gray-800">Cancelled</option>
                                        </select>
                                        <div class="pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 text-current opacity-70">
                                            <i class="fa-solid fa-chevron-down text-[9px]"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
