@extends('layouts.admin')

@section('title', 'Tambah Kendaraan')
@section('subtitle', 'Buat data armada kendaraan baru')

@section('actions')
<a href="{{ route('admin.cars.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nama Kendaraan</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                    <option value="Show" {{ old('status') == 'Show' ? 'selected' : '' }}>Tampilkan (Show)</option>
                    <option value="Hide" {{ old('status') == 'Hide' ? 'selected' : '' }}>Sembunyikan (Hide)</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            
            <div class="hidden md:block"></div> <!-- Spacer -->

            <!-- Content -->
            <div class="md:col-span-2">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi / Detail (HTML allowed)</label>
                <textarea name="content" id="content" rows="6" class="summernote w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>{{ old('content') }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Photo -->
            <div class="md:col-span-2">
                <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Foto Kendaraan</label>
                <input type="file" name="img" id="img" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-700 transition-colors">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, max 2MB.</p>
                @error('img')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-brand-red text-white font-medium rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-red">
                Simpan Kendaraan
            </button>
        </div>
    </form>
</div>
@endsection
