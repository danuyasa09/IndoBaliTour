@extends('layouts.admin')

@section('title', 'Job Applications')
@section('subtitle', 'Kelola dan ubah status lamaran pekerjaan secara langsung dari tabel')

@section('content')
<div x-data="{
    statusFilter: 'all',
    search: '',
    toasts: [],
    counts: {
        all: {{ $applications->count() }},
        pending: {{ $applications->where('status', 'pending')->count() }},
        reviewed: {{ $applications->where('status', 'reviewed')->count() }},
        accepted: {{ $applications->where('status', 'accepted')->count() }},
        rejected: {{ $applications->where('status', 'rejected')->count() }}
    },
    items: [
        @foreach($applications as $app)
        {
            id: {{ $app->id }},
            status: '{{ $app->status }}',
            text: '{{ strtolower(addslashes($app->name . ' ' . ($app->nickname ?? '') . ' ' . $app->email . ' ' . $app->position . ' ' . ($app->phone ?? ''))) }}'
        },
        @endforeach
    ],
    isMatch(id) {
        const item = this.items.find(x => x.id === id);
        if (!item) return true;
        const matchesStatus = (this.statusFilter === 'all') || (this.statusFilter === item.status);
        const matchesSearch = !this.search || item.text.includes(this.search.toLowerCase().trim());
        return matchesStatus && matchesSearch;
    },
    get filteredCount() {
        return this.items.filter(item => {
            const matchesStatus = (this.statusFilter === 'all') || (this.statusFilter === item.status);
            const matchesSearch = !this.search || item.text.includes(this.search.toLowerCase().trim());
            return matchesStatus && matchesSearch;
        }).length;
    },
    onStatusUpdated(id, previousStatus, newStatus) {
        const item = this.items.find(x => x.id === id);
        if (item) item.status = newStatus;
        if (previousStatus !== newStatus) {
            if (this.counts[previousStatus] !== undefined && this.counts[previousStatus] > 0) {
                this.counts[previousStatus]--;
            }
            if (this.counts[newStatus] !== undefined) {
                this.counts[newStatus]++;
            }
        }
    },
    showToast(message, type = 'success') {
        const id = Date.now() + Math.random();
        this.toasts.push({ id, message, type, visible: true });
        setTimeout(() => {
            const t = this.toasts.find(x => x.id === id);
            if (t) t.visible = false;
        }, 3500);
        setTimeout(() => {
            this.toasts = this.toasts.filter(x => x.id !== id);
        }, 4000);
    },
    removeToast(id) {
        this.toasts = this.toasts.filter(x => x.id !== id);
    }
}" class="space-y-6">

    <!-- Floating Toast Notification Container -->
    <div class="fixed top-20 right-6 z-50 space-y-3 pointer-events-none" style="min-width: 320px; max-width: 440px;">
        <template x-for="toast in toasts" :key="toast.id">
            <div x-show="toast.visible"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4"
                 x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 :class="{
                    'bg-emerald-50 border-emerald-200 text-emerald-900 shadow-emerald-900/10': toast.type === 'success',
                    'bg-rose-50 border-rose-200 text-rose-900 shadow-rose-900/10': toast.type === 'error'
                 }"
                 class="pointer-events-auto flex items-start gap-3 p-4 rounded-xl border shadow-lg backdrop-blur-sm">
                <div class="flex-shrink-0 mt-0.5">
                    <i x-show="toast.type === 'success'" class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                    <i x-show="toast.type === 'error'" class="fa-solid fa-circle-exclamation text-rose-600 text-lg"></i>
                </div>
                <div class="flex-1 text-sm font-medium leading-snug" x-text="toast.message"></div>
                <button type="button" @click="removeToast(toast.id)" class="text-gray-400 hover:text-gray-600 transition-colors ml-1">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        </template>
    </div>

    <!-- Quick Status Filter Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
        <!-- All -->
        <button type="button" @click="statusFilter = 'all'"
                :class="statusFilter === 'all' ? 'ring-2 ring-brand-red bg-white shadow-sm border-brand-red text-brand-red' : 'bg-white hover:bg-gray-50 border-gray-200 text-gray-700'"
                class="p-4 rounded-xl border text-left transition-all">
            <span class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Semua</span>
            <span class="block text-2xl font-bold mt-1" :class="statusFilter === 'all' ? 'text-brand-red' : 'text-gray-900'" x-text="counts.all"></span>
        </button>

        <!-- Pending -->
        <button type="button" @click="statusFilter = 'pending'"
                :class="statusFilter === 'pending' ? 'ring-2 ring-amber-500 bg-amber-50/70 shadow-sm border-amber-300' : 'bg-white hover:bg-amber-50/30 border-gray-200'"
                class="p-4 rounded-xl border text-left transition-all">
            <div class="flex items-center justify-between">
                <span class="block text-xs font-semibold text-amber-700 uppercase tracking-wider">Pending</span>
                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
            </div>
            <span class="block text-2xl font-bold text-amber-900 mt-1" x-text="counts.pending"></span>
        </button>

        <!-- Reviewed -->
        <button type="button" @click="statusFilter = 'reviewed'"
                :class="statusFilter === 'reviewed' ? 'ring-2 ring-blue-500 bg-blue-50/70 shadow-sm border-blue-300' : 'bg-white hover:bg-blue-50/30 border-gray-200'"
                class="p-4 rounded-xl border text-left transition-all">
            <div class="flex items-center justify-between">
                <span class="block text-xs font-semibold text-blue-700 uppercase tracking-wider">Reviewed</span>
                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
            </div>
            <span class="block text-2xl font-bold text-blue-900 mt-1" x-text="counts.reviewed"></span>
        </button>

        <!-- Accepted -->
        <button type="button" @click="statusFilter = 'accepted'"
                :class="statusFilter === 'accepted' ? 'ring-2 ring-emerald-500 bg-emerald-50/70 shadow-sm border-emerald-300' : 'bg-white hover:bg-emerald-50/30 border-gray-200'"
                class="p-4 rounded-xl border text-left transition-all">
            <div class="flex items-center justify-between">
                <span class="block text-xs font-semibold text-emerald-700 uppercase tracking-wider">Accepted</span>
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </div>
            <span class="block text-2xl font-bold text-emerald-900 mt-1" x-text="counts.accepted"></span>
        </button>

        <!-- Rejected -->
        <button type="button" @click="statusFilter = 'rejected'"
                :class="statusFilter === 'rejected' ? 'ring-2 ring-rose-500 bg-rose-50/70 shadow-sm border-rose-300' : 'bg-white hover:bg-rose-50/30 border-gray-200'"
                class="p-4 rounded-xl border text-left transition-all col-span-2 sm:col-span-1">
            <div class="flex items-center justify-between">
                <span class="block text-xs font-semibold text-rose-700 uppercase tracking-wider">Rejected</span>
                <span class="w-2 h-2 rounded-full bg-rose-500"></span>
            </div>
            <span class="block text-2xl font-bold text-rose-900 mt-1" x-text="counts.rejected"></span>
        </button>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Search & Filter Bar -->
        <div class="p-4 sm:p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </div>
                <input type="text"
                       x-model="search"
                       placeholder="Cari nama, email, posisi, nomor telepon..."
                       class="w-full pl-10 pr-9 py-2 text-sm bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red transition-all">
                <button type="button" x-show="search.length > 0" @click="search = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" style="display: none;">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">
                    Menampilkan <span class="font-bold text-gray-800" x-text="filteredCount"></span> dari <span class="font-bold text-gray-800">{{ $applications->count() }}</span> pelamar
                </span>
                <button type="button" 
                        x-show="statusFilter !== 'all' || search !== ''" 
                        @click="statusFilter = 'all'; search = ''" 
                        class="text-xs text-brand-red hover:underline ml-2 font-medium"
                        style="display: none;">
                    Reset Filter
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Pelamar</th>
                        <th class="px-6 py-4">Posisi</th>
                        <th class="px-6 py-4">Status Lamaran <span class="text-[10px] lowercase font-normal text-gray-400 block font-sans">(klik untuk ubah)</span></th>
                        <th class="px-6 py-4">Tanggal Masuk</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($applications as $index => $app)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $app->phone ?? '');
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '62' . substr($cleanPhone, 1);
                        }
                    @endphp
                    <tr x-show="isMatch({{ $app->id }})" class="hover:bg-gray-50/60 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                        
                        <!-- Applicant Info -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($app->profile_photo_path)
                                    <img src="{{ asset('storage/' . $app->profile_photo_path) }}" class="w-10 h-10 rounded-full object-cover border border-gray-200 flex-shrink-0" alt="{{ $app->name }}">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-brand-red/10 text-brand-red font-bold flex items-center justify-center text-sm flex-shrink-0">
                                        {{ strtoupper(substr($app->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="font-semibold text-gray-900 flex items-center gap-1.5">
                                        <span>{{ $app->name }}</span>
                                        @if($app->nickname)
                                            <span class="text-xs font-normal text-gray-500">({{ $app->nickname }})</span>
                                        @endif
                                    </div>
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-0.5 text-xs text-gray-500">
                                        <a href="mailto:{{ $app->email }}" class="hover:text-blue-600 transition-colors flex items-center gap-1" title="Kirim Email">
                                            <i class="fa-regular fa-envelope text-[11px]"></i>
                                            <span>{{ $app->email }}</span>
                                        </a>
                                        @if($app->phone)
                                            <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="hover:text-green-600 transition-colors flex items-center gap-1 font-medium text-gray-600" title="Hubungi via WhatsApp">
                                                <i class="fa-brands fa-whatsapp text-green-600"></i>
                                                <span>{{ $app->phone }}</span>
                                            </a>
                                        @endif
                                        @if($app->cv_link)
                                            <a href="{{ asset('storage/' . $app->cv_link) }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-medium text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-1.5 py-0.5 rounded transition-colors" title="Lihat CV">
                                                <i class="fa-solid fa-file-pdf text-red-500 text-[10px]"></i> CV
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Position -->
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $app->position }}
                            </span>
                            @if($app->bahasa || $app->alamat)
                                <div class="mt-1 space-y-0.5 text-[11px] text-gray-500">
                                    @if($app->bahasa)
                                        <div class="flex items-center gap-1" title="Bahasa">
                                            <i class="fa-solid fa-language text-gray-400"></i>
                                            <span>{{ $app->bahasa }}</span>
                                        </div>
                                    @endif
                                    @if($app->alamat)
                                        <div class="flex items-center gap-1" title="Alamat / Asal">
                                            <i class="fa-solid fa-location-dot text-gray-400"></i>
                                            <span>{{ $app->alamat }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </td>

                        <!-- Status Lamaran: Direct Status Changer -->
                        <td class="px-6 py-4">
                            <div x-data="{
                                currentStatus: '{{ $app->status }}',
                                isLoading: false,
                                getBadgeClasses(status) {
                                    switch(status) {
                                        case 'pending':
                                            return 'bg-amber-50 text-amber-800 border-amber-300 hover:bg-amber-100 focus:ring-amber-400';
                                        case 'reviewed':
                                            return 'bg-blue-50 text-blue-800 border-blue-300 hover:bg-blue-100 focus:ring-blue-400';
                                        case 'accepted':
                                            return 'bg-emerald-50 text-emerald-800 border-emerald-300 hover:bg-emerald-100 focus:ring-emerald-400';
                                        case 'rejected':
                                            return 'bg-rose-50 text-rose-800 border-rose-300 hover:bg-rose-100 focus:ring-rose-400';
                                        default:
                                            return 'bg-gray-50 text-gray-700 border-gray-200';
                                    }
                                },
                                async updateStatus(event) {
                                    const newStatus = event.target.value;
                                    const previousStatus = this.currentStatus;
                                    if (newStatus === previousStatus) return;

                                    this.isLoading = true;
                                    try {
                                        const response = await fetch('{{ route('admin.job_applications.updateStatus', $app->id) }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.getAttribute('content') || '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                _method: 'PATCH',
                                                status: newStatus
                                            })
                                        });

                                        const data = await response.json();
                                        if (response.ok && data.success) {
                                            this.currentStatus = newStatus;
                                            onStatusUpdated({{ $app->id }}, previousStatus, newStatus);
                                            showToast(data.message || 'Status berhasil diperbarui', 'success');
                                        } else {
                                            event.target.value = previousStatus;
                                            showToast(data.message || 'Gagal mengubah status', 'error');
                                        }
                                    } catch (err) {
                                        event.target.value = previousStatus;
                                        showToast('Terjadi kesalahan jaringan saat mengubah status', 'error');
                                    } finally {
                                        this.isLoading = false;
                                    }
                                }
                            }">
                                <form action="{{ route('admin.job_applications.updateStatus', $app->id) }}" method="POST" class="inline-block relative">
                                    @csrf
                                    @method('PATCH')
                                    <div class="relative inline-flex items-center">
                                        <select name="status"
                                                :value="currentStatus"
                                                :disabled="isLoading"
                                                @change="updateStatus($event)"
                                                :class="getBadgeClasses(currentStatus)"
                                                class="appearance-none cursor-pointer text-xs font-semibold pl-3 pr-7 py-1 rounded-full border transition-colors focus:outline-none disabled:opacity-60 disabled:cursor-not-allowed"
                                                title="Klik untuk ubah status lamaran">
                                            <option value="pending" @selected($app->status == 'pending') class="bg-white text-gray-800">Pending</option>
                                            <option value="reviewed" @selected($app->status == 'reviewed') class="bg-white text-gray-800">Reviewed</option>
                                            <option value="accepted" @selected($app->status == 'accepted') class="bg-white text-gray-800">Accepted</option>
                                            <option value="rejected" @selected($app->status == 'rejected') class="bg-white text-gray-800">Rejected</option>
                                        </select>
                                        <div class="pointer-events-none absolute right-2.5 top-1/2 -translate-y-1/2 text-current opacity-70">
                                            <i class="fa-solid fa-chevron-down text-[9px]"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $app->created_at ? $app->created_at->format('d M Y, H:i') : '-' }}
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <div class="inline-flex items-center gap-1">
                                <a href="{{ route('admin.job_applications.show', $app->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-brand-red hover:bg-red-50 transition-colors" title="Lihat Detail Lengkap">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <form action="{{ route('admin.job_applications.destroy', $app->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data lamaran ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Hapus">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-inbox text-4xl text-gray-300"></i>
                                <p class="font-medium text-gray-600">Belum ada lamaran pekerjaan yang masuk.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse

                    <!-- When filter has 0 results -->
                    @if($applications->isNotEmpty())
                    <tr x-show="filteredCount === 0" style="display: none;">
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-filter-circle-xmark text-4xl text-gray-300"></i>
                                <p class="font-medium text-gray-600">Tidak ada lamaran yang cocok dengan filter atau kata kunci pencarian.</p>
                                <button type="button" @click="statusFilter = 'all'; search = ''" class="text-xs text-brand-red font-semibold hover:underline mt-1">
                                    Reset Filter
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
