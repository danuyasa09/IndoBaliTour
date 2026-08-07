@extends('layouts.admin')

@section('title', 'Edit Paket Tour')
@section('subtitle', 'Ubah data paket tour')

@section('actions')
<a href="{{ route('admin.tours.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nama Paket Tour</label>
                <input type="text" name="title" id="title" value="{{ old('title', $tour->title) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Short Description -->
            <div class="md:col-span-2">
                <label for="short" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                <textarea name="short" id="short" rows="2" class="summernote w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">{{ old('short', $tour->short) }}</textarea>
                @error('short')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Harga & Status -->
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga Mulai (Angka)</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $tour->harga) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">
                @error('harga')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="date" id="date" value="{{ old('date', $tour->date) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">
                @error('date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="harga_detail" class="block text-sm font-medium text-gray-700 mb-1">Detail Harga Singkat (Teks)</label>
                <input type="text" name="harga_detail" id="harga_detail" value="{{ old('harga_detail', $tour->harga_detail) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" placeholder="e.g. / pax">
                @error('harga_detail')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                    <option value="Show" {{ old('status', $tour->status) == 'Show' ? 'selected' : '' }}>Tampilkan (Show)</option>
                    <option value="Hide" {{ old('status', $tour->status) == 'Hide' ? 'selected' : '' }}>Sembunyikan (Hide)</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="hit" class="block text-sm font-medium text-gray-700 mb-1">Total Tayangan (Hit)</label>
                <input type="number" name="hit" id="hit" value="{{ old('hit', $tour->hit ?? 0) }}" min="0" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('hit')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Content -->
            <div class="md:col-span-2">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten Lengkap / Itinerary (HTML allowed)</label>
                <textarea name="content" id="content" rows="6" class="summernote w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>{{ old('content', $tour->content) }}</textarea>
                <div class="mt-2 p-3 bg-blue-50 text-blue-800 text-xs rounded-lg border border-blue-200 leading-relaxed">
                    <div class="font-bold mb-1"><i class="fa-solid fa-map-location-dot mr-1"></i> Fitur Peta Interaktif (Opsional)</div>
                    Anda dapat menyisipkan peta langsung ke dalam tulisan. Fitur ini <b>opsional</b> (tidak wajib). Jika ingin menggunakannya, pilih salah satu format kode berikut:<br>
                    <ul class="list-disc pl-4 mt-2 space-y-1">
                        <li><b>Peta Biasa (2D):</b> <code>[map lat="-8.409" lng="115.188"]</code></li>
                        <li><b>Peta 360 View:</b> <code>[map_embed] PASTE_LINK_IFRAME_DI_SINI [/map_embed]</code></li>
                        <li><b>Widget Lengkap (2D + 360):</b> 
                            <code class="block mt-1 bg-white p-2 border border-blue-100 rounded text-gray-700">
                                [map lat="-8.409" lng="115.188"]<br>
                                PASTE_LINK_IFRAME_DI_SINI<br>
                                [/map]
                            </code>
                        </li>
                    </ul>
                    <div class="mt-2 text-blue-600 opacity-90"><i>*Angka koordinat dan link HTML bisa didapatkan dengan klik kanan / share lokasi dari Google Maps.</i></div>
                </div>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            
            <!-- Pricelist -->
            <div class="md:col-span-2">
                <label for="pricelist" class="block text-sm font-medium text-gray-700 mb-1">Detail Pricelist (HTML allowed)</label>
                <textarea name="pricelist" id="pricelist" rows="4" class="summernote w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">{{ old('pricelist', $tour->pricelist) }}</textarea>
                @error('pricelist')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Photo -->
            <div class="md:col-span-2">
                <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Foto / Cover Tour</label>
                @if($tour->img)
                    <div class="mb-3">
                        <img src="{{ asset('images/tours/' . $tour->img) }}" alt="Cover Tour" class="h-32 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" name="img" id="img" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-700 transition-colors">
                <p class="mt-1 text-xs text-gray-500">Abaikan jika tidak ingin mengubah foto. Format: JPG, PNG, max 2MB.</p>
                @error('img')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-brand-red text-white font-medium rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-red">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
