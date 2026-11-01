@extends('layouts.admin')

@section('title', 'Manajemen Testimoni')
@section('subtitle', 'Daftar semua testimoni dari pelanggan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-0">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Negara</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($testimonies as $testimony)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($testimony->photo)
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $testimony->photo) }}" alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold">
                                            {{ substr($testimony->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $testimony->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($testimony->message, 30) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $testimony->nationality }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex text-yellow-400 text-xs">
                                @for($i = 0; $i < $testimony->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.testimonies.approve', $testimony->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="button"
                                        onclick="toggleTestimonyStatus(this, '{{ route('admin.testimonies.approve', $testimony->id) }}')"
                                        data-approved="{{ $testimony->is_approved ? '1' : '0' }}"
                                        class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full transition-colors cursor-pointer {{ $testimony->is_approved ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-amber-100 text-amber-800 hover:bg-amber-200' }}"
                                        title="Klik untuk ubah status">
                                    {{ $testimony->is_approved ? 'Approved' : 'Pending' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.testimonies.edit', $testimony->id) }}" class="text-blue-600 hover:text-blue-900 transition-colors">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>
                                <form action="{{ route('admin.testimonies.destroy', $testimony->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">
                                        <i class="fa-solid fa-trash-can text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fa-regular fa-folder-open text-4xl mb-3 text-gray-300"></i>
                                <p>Belum ada data testimoni.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($testimonies->hasPages())
    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
        {{ $testimonies->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
async function toggleTestimonyStatus(btn, url) {
    if (!btn || btn.disabled) return;
    const form = btn.closest('form');
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    btn.disabled = true;

    try {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({ _method: 'PATCH' })
        });
        const data = await res.json();
        if (res.ok && data.success) {
            const isApproved = data.is_approved;
            btn.setAttribute('data-approved', isApproved ? '1' : '0');
            btn.textContent = isApproved ? 'Approved' : 'Pending';
            btn.className = `px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full transition-colors cursor-pointer ${isApproved ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-amber-100 text-amber-800 hover:bg-amber-200'}`;
            if (window.showToast) {
                window.showToast(data.message || 'Status testimoni berhasil diubah', 'success');
            }
        } else {
            if (window.showToast) {
                window.showToast(data.message || 'Gagal mengubah status', 'error');
            } else {
                alert(data.message || 'Gagal mengubah status');
            }
        }
    } catch (e) {
        if (form) form.submit();
    } finally {
        btn.disabled = false;
    }
}
</script>
@endpush
