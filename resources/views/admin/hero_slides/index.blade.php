@extends('layouts.admin')

@section('title', 'Hero Slider')
@section('subtitle', 'Kelola foto yang tampil di slider utama halaman beranda')

@section('actions')
<a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm flex items-center gap-2">
    <i class="fa-solid fa-arrow-left"></i> Dashboard
</a>
@endsection

@push('styles')
<style>
    .slide-card { transition: all 0.2s ease; }
    .drag-handle { cursor: grab; touch-action: none; }
    .drag-handle:active { cursor: grabbing; }
    .sortable-ghost { opacity: 0.35; background: #f3f4f6; border-radius: 0.75rem; }
    .type-badge-tour   { background: #dbeafe; color: #1e40af; }
    .type-badge-custom { background: #fce7f3; color: #9d174d; }
</style>
@endpush

@section('content')
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

    {{-- =====================================================================
         PANEL KIRI — Daftar Slide yang Sudah Dikonfigurasi
    ===================================================================== --}}
    <div class="xl:col-span-2 space-y-4">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-base font-bold text-gray-900 flex items-center gap-2">
                        <i class="fa-solid fa-layer-group text-brand-red"></i>
                        Daftar Slide
                    </h2>
                    <p class="text-xs text-gray-400 mt-0.5">Drag &amp; drop untuk mengubah urutan tampil di homepage.</p>
                </div>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                    {{ $slides->count() }} slide
                </span>
            </div>

            @if($slides->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-images text-2xl text-gray-300"></i>
                </div>
                <p class="text-sm font-semibold text-gray-500">Belum ada slide dikonfigurasi</p>
                <p class="text-xs text-gray-400 mt-1 max-w-xs">
                    Homepage akan menggunakan foto dari paket tour secara otomatis sebagai fallback.
                </p>
            </div>
            @else
            <div id="slideList" class="space-y-3">
                @foreach($slides as $slide)
                <div class="slide-card flex items-center gap-3 sm:gap-4 p-3 rounded-xl border border-gray-100 bg-gray-50/60 hover:bg-white hover:shadow-sm"
                     data-id="{{ $slide->id }}">

                    {{-- Drag handle --}}
                    <div class="drag-handle text-gray-300 hover:text-gray-500 px-1 flex-shrink-0 select-none" title="Geser untuk ubah urutan">
                        <i class="fa-solid fa-grip-vertical text-sm"></i>
                    </div>

                    {{-- Order number --}}
                    <span class="slide-order flex-shrink-0 w-6 h-6 rounded-full bg-gray-200 text-gray-600 text-xs font-bold flex items-center justify-center">
                        {{ $loop->iteration }}
                    </span>

                    {{-- Thumbnail --}}
                    <div class="flex-shrink-0 w-20 sm:w-24 h-14 sm:h-16 rounded-lg overflow-hidden border border-gray-100 bg-gray-100">
                        <img src="{{ $slide->image_url }}"
                             alt="Slide"
                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                             onerror="this.src='https://placehold.co/200x120?text=No+Image'">
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 mb-1 flex-wrap">
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full {{ $slide->type === 'tour' ? 'type-badge-tour' : 'type-badge-custom' }}">
                                <i class="fa-solid {{ $slide->type === 'tour' ? 'fa-map-location-dot' : 'fa-image' }} mr-1"></i>
                                {{ $slide->type === 'tour' ? 'Dari Tour' : 'Custom Upload' }}
                            </span>
                            @if(!$slide->is_active)
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-amber-100 text-amber-700">
                                <i class="fa-solid fa-eye-slash mr-1"></i>Nonaktif
                            </span>
                            @else
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-green-100 text-green-700">
                                <i class="fa-solid fa-eye mr-1"></i>Aktif
                            </span>
                            @endif
                        </div>
                        @if($slide->type === 'tour' && $slide->tour)
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $slide->tour->title }}</p>
                        @elseif($slide->caption)
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $slide->caption }}</p>
                        @else
                            <p class="text-sm text-gray-400 italic">Custom Foto</p>
                        @endif
                        @if($slide->caption && $slide->type === 'tour')
                            <p class="text-xs text-gray-400 truncate">{{ $slide->caption }}</p>
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <form action="{{ route('admin.hero_slides.toggle', $slide->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" title="{{ $slide->is_active ? 'Nonaktifkan' : 'Aktifkan' }}"
                                class="w-9 h-9 rounded-lg flex items-center justify-center transition-colors
                                    {{ $slide->is_active ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-gray-100 text-gray-400 hover:bg-gray-200' }}">
                                <i class="fa-solid {{ $slide->is_active ? 'fa-eye' : 'fa-eye-slash' }} text-sm"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.hero_slides.destroy', $slide->id) }}" method="POST"
                              onsubmit="return confirm('Hapus slide ini dari slider? Foto custom akan ikut dihapus.')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus slide"
                                class="w-9 h-9 rounded-lg bg-red-50 text-red-400 hover:bg-red-100 hover:text-red-600 flex items-center justify-center transition-colors">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="text-xs text-gray-400 mt-4 flex items-center gap-1.5">
                <i class="fa-solid fa-info-circle"></i>
                Urutan disimpan otomatis saat digeser. Slide aktif tampil di homepage sesuai urutan ini.
            </p>
            @endif
        </div>

        {{-- Fallback notice --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 flex gap-3">
            <i class="fa-solid fa-circle-info text-blue-500 mt-0.5 flex-shrink-0"></i>
            <div>
                <p class="text-sm font-semibold text-blue-700">Fallback Otomatis</p>
                <p class="text-xs text-blue-600 mt-0.5">
                    Jika semua slide dinonaktifkan atau belum ada yang dikonfigurasi, homepage akan otomatis menggunakan foto dari paket tour yang tersedia.
                </p>
            </div>
        </div>
    </div>

    {{-- =====================================================================
         PANEL KANAN — Form Tambah Slide
    ===================================================================== --}}
    <div class="space-y-5" x-data="{ slideType: 'tour' }">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <h2 class="text-base font-bold text-gray-900 mb-5 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-brand-red"></i>
                Tambah Slide Baru
            </h2>

            <form action="{{ route('admin.hero_slides.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Tipe --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sumber Foto</label>
                    <div class="grid grid-cols-2 gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="type" value="tour" x-model="slideType" class="sr-only" checked>
                            <div :class="slideType === 'tour'
                                    ? 'border-brand-red bg-red-50 text-brand-red shadow-sm'
                                    : 'border-gray-200 text-gray-500 hover:border-gray-300'"
                                 class="border-2 rounded-xl p-3 text-center transition-all duration-200 select-none">
                                <i class="fa-solid fa-map-location-dot text-xl mb-1.5 block"></i>
                                <span class="text-xs font-semibold block">Dari Tour</span>
                                <span class="text-[10px] text-gray-400 block mt-0.5">Pilih paket tour</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="type" value="custom" x-model="slideType" class="sr-only">
                            <div :class="slideType === 'custom'
                                    ? 'border-brand-red bg-red-50 text-brand-red shadow-sm'
                                    : 'border-gray-200 text-gray-500 hover:border-gray-300'"
                                 class="border-2 rounded-xl p-3 text-center transition-all duration-200 select-none">
                                <i class="fa-solid fa-cloud-arrow-up text-xl mb-1.5 block"></i>
                                <span class="text-xs font-semibold block">Upload Foto</span>
                                <span class="text-[10px] text-gray-400 block mt-0.5">Foto dari perangkat</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Pilih Tour --}}
                <div x-show="slideType === 'tour'" x-transition.opacity>
                    <label for="tour_id" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        Paket Tour <span class="text-red-500">*</span>
                    </label>
                    @if($tours->isEmpty())
                    <p class="text-sm text-gray-400 italic py-2">Belum ada tour dengan foto. Upload foto tour terlebih dahulu di menu Paket Tour.</p>
                    @else
                    <select id="tour_id" name="tour_id"
                        class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red bg-white text-gray-700">
                        <option value="">-- Pilih paket tour --</option>
                        @foreach($tours as $tour)
                        <option value="{{ $tour->id }}" data-img="{{ asset('images/tours/' . $tour->img) }}">
                            {{ $tour->title }}
                        </option>
                        @endforeach
                    </select>

                    {{-- Live preview --}}
                    <div id="tourPreviewBox" class="mt-3 rounded-xl overflow-hidden border border-gray-100 bg-gray-50" style="display:none">
                        <img id="tourPreviewImg" src="" alt="Preview" class="w-full h-32 object-cover">
                        <p id="tourPreviewTitle" class="text-xs text-gray-500 px-3 py-2 font-medium"></p>
                    </div>
                    @endif
                </div>

                {{-- Upload Foto Custom --}}
                <div x-show="slideType === 'custom'" x-transition.opacity>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        Foto Slide <span class="text-red-500">*</span>
                    </label>
                    <label id="dropZone"
                        class="relative flex flex-col items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-brand-red hover:bg-red-50/30 transition-all overflow-hidden"
                        style="height: 130px">
                        <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png,image/webp"
                               class="sr-only" onchange="heroPreviewImage(event)">

                        <div id="dropPlaceholder" class="flex flex-col items-center gap-1.5">
                            <i class="fa-solid fa-cloud-arrow-up text-2xl text-gray-300"></i>
                            <p class="text-xs text-gray-400">Klik atau seret foto di sini</p>
                            <p class="text-[10px] text-gray-300">JPG, PNG, WebP — maks. 5MB</p>
                        </div>

                        <img id="customPreviewImg" src="" alt=""
                             class="absolute inset-0 w-full h-full object-cover rounded-xl" style="display:none">
                        <div id="customPreviewOverlay"
                             class="absolute inset-0 bg-black/30 flex items-center justify-center rounded-xl" style="display:none">
                            <span class="text-white text-xs font-semibold bg-black/50 px-3 py-1 rounded-full">
                                <i class="fa-solid fa-check mr-1"></i>Foto dipilih
                            </span>
                        </div>
                    </label>
                    <p class="text-[10px] text-gray-400 mt-1">Landscape 16:9, minimum 1280px lebar untuk kualitas terbaik.</p>
                </div>

                {{-- Caption --}}
                <div>
                    <label for="caption" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">
                        Caption (Opsional)
                    </label>
                    <input type="text" id="caption" name="caption" maxlength="150"
                           placeholder="e.g. Sunset di Tanah Lot"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-red/20 focus:border-brand-red text-gray-700">
                </div>

                {{-- Validation errors --}}
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-xs space-y-1">
                    @foreach($errors->all() as $error)
                    <p><i class="fa-solid fa-circle-xmark mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <button type="submit"
                    class="w-full bg-brand-red hover:bg-red-800 text-white font-bold py-3 px-4 rounded-xl flex items-center justify-center gap-2 transition-colors shadow-sm text-sm">
                    <i class="fa-solid fa-plus"></i>
                    Tambahkan ke Slider
                </button>
            </form>
        </div>

        {{-- Tips --}}
        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
            <p class="text-xs font-bold text-amber-700 mb-2"><i class="fa-solid fa-lightbulb mr-1.5"></i>Tips</p>
            <ul class="text-xs text-amber-700 space-y-1.5 list-disc list-inside">
                <li>3–5 slide ideal untuk performa terbaik</li>
                <li>Gunakan foto landscape resolusi tinggi (1920×1080)</li>
                <li>Toggle <i class="fa-solid fa-eye text-xs"></i> untuk sembunyikan tanpa hapus</li>
                <li>Geser <i class="fa-solid fa-grip-vertical text-xs"></i> untuk ubah urutan</li>
            </ul>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
// ─── Drag & Drop reorder ───────────────────────────────────────────────────────
const slideList = document.getElementById('slideList');
if (slideList) {
    new Sortable(slideList, {
        handle: '.drag-handle',
        animation: 200,
        ghostClass: 'sortable-ghost',
        onEnd() {
            const ids = [...slideList.querySelectorAll('[data-id]')].map(el => +el.dataset.id);
            // Update order badges visually
            slideList.querySelectorAll('[data-id]').forEach((el, i) => {
                const b = el.querySelector('.slide-order');
                if (b) b.textContent = i + 1;
            });
            // Persist to server
            fetch('{{ route("admin.hero_slides.order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ order: ids })
            });
        }
    });
}

// ─── Tour live preview ─────────────────────────────────────────────────────────
const tourSelect   = document.getElementById('tour_id');
const previewBox   = document.getElementById('tourPreviewBox');
const previewImg   = document.getElementById('tourPreviewImg');
const previewTitle = document.getElementById('tourPreviewTitle');

if (tourSelect && previewBox) {
    tourSelect.addEventListener('change', function () {
        const opt = this.options[this.selectedIndex];
        const img = opt?.dataset?.img;
        if (img && this.value) {
            previewImg.src   = img;
            previewTitle.textContent = opt.text;
            previewBox.style.display = '';
        } else {
            previewBox.style.display = 'none';
        }
    });
}

// ─── Custom image preview ──────────────────────────────────────────────────────
function heroPreviewImage(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => {
        document.getElementById('dropPlaceholder').style.display       = 'none';
        document.getElementById('customPreviewImg').style.display      = '';
        document.getElementById('customPreviewOverlay').style.display  = '';
        document.getElementById('customPreviewImg').src                 = ev.target.result;
    };
    reader.readAsDataURL(file);
}

// Drag highlight on drop zone
const dz = document.getElementById('dropZone');
if (dz) {
    dz.addEventListener('dragover',  e => { e.preventDefault(); dz.classList.add('border-brand-red', 'bg-red-50'); });
    dz.addEventListener('dragleave', () => dz.classList.remove('border-brand-red', 'bg-red-50'));
    dz.addEventListener('drop', e => {
        e.preventDefault();
        dz.classList.remove('border-brand-red', 'bg-red-50');
        const inp = document.getElementById('imageInput');
        inp.files = e.dataTransfer.files;
        heroPreviewImage({ target: inp });
    });
}
</script>
@endpush