@extends('layouts.admin')

@section('title', 'Edit Fun Activity')
@section('subtitle', 'Ubah data aktivitas liburan')

@section('actions')
<a href="{{ route('admin.fun_activities.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <form action="{{ route('admin.fun_activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nama Aktivitas</label>
                <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Short Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                <textarea name="description" id="description" rows="2" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">{{ old('description', $activity->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Harga & Status -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Angka)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $activity->price) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">
                @error('price')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                    <option value="Show" {{ old('status', $activity->status) == 'Show' ? 'selected' : '' }}>Tampilkan (Show)</option>
                    <option value="Hide" {{ old('status', $activity->status) == 'Hide' ? 'selected' : '' }}>Sembunyikan (Hide)</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Content -->
            <div class="md:col-span-2">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten Lengkap (HTML allowed)</label>
                <textarea name="content" id="content" rows="6" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>{{ old('content', $activity->content) }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            
            <!-- Pricelist -->
            <div class="md:col-span-2">
                <label for="pricelist" class="block text-sm font-medium text-gray-700 mb-1">Detail Pricelist Tambahan (HTML allowed)</label>
                <textarea name="pricelist" id="pricelist" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red">{{ old('pricelist', $activity->pricelist) }}</textarea>
                @error('pricelist')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Photo -->
            <div class="md:col-span-2">
                <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Foto / Gambar</label>
                @if($activity->img)
                    <div class="mb-3">
                        <img src="{{ asset('images/fun_activities/' . $activity->img) }}" alt="Foto" class="h-32 rounded-lg object-cover">
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
