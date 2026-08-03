@extends('layouts.admin')

@section('title', 'Edit Video')
@section('subtitle', 'Ubah data video experience')

@section('actions')
<a href="{{ route('admin.videos.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Video</label>
                <input type="text" name="title" id="title" value="{{ old('title', $video->title) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Date & Status -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="date" id="date" value="{{ old('date', $video->date ? $video->date->format('Y-m-d') : '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                    <option value="Show" {{ old('status', $video->status) == 'Show' ? 'selected' : '' }}>Tampilkan (Show)</option>
                    <option value="Hide" {{ old('status', $video->status) == 'Hide' ? 'selected' : '' }}>Sembunyikan (Hide)</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>



            <div>
                <label for="hit" class="block text-sm font-medium text-gray-700 mb-1">Total Tayangan (Hit)</label>
                <input type="number" name="hit" id="hit" value="{{ old('hit', $video->hit ?? 0) }}" min="0" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('hit')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Source -->
            <div class="md:col-span-2">
                <label for="source" class="block text-sm font-medium text-gray-700 mb-1">Source / Link Video (contoh: ID Video YouTube atau link Embed)</label>
                <input type="text" name="source" id="source" value="{{ old('source', $video->source) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                <p class="mt-1 text-xs text-gray-500">Anda dapat memasukkan ID video YouTube (misalnya: dQw4w9WgXcQ) atau link gambar preview dari Unsplash seperti contoh dummy yang sudah ada.</p>
                @error('source')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Content -->
            <div class="md:col-span-2">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi / Konten</label>
                <textarea name="content" id="content" rows="4" class="summernote w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>{{ old('content', $video->content) }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
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
