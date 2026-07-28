@extends('layouts.admin')

@section('title', 'Kelola Foto Album: ' . $album->title)
@section('subtitle', 'Tambahkan atau hapus foto dari album ini')

@section('actions')
<a href="{{ route('admin.albums.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Album
</a>
@endsection

@section('content')

<!-- Form Tambah Foto -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Foto Baru</h3>
    <form action="{{ route('admin.albums.photos.store', $album->id) }}" method="POST" enctype="multipart/form-data" class="flex items-end gap-4">
        @csrf
        <div class="flex-1">
            <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Pilih File Foto</label>
            <input type="file" name="img" id="img" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-700 transition-colors" required>
            @error('img')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="px-6 py-2.5 bg-brand-red text-white font-medium rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-red h-[42px] mb-[2px]">
            Upload Foto
        </button>
    </form>
</div>

<!-- Daftar Foto -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h3 class="text-lg font-bold text-gray-900 mb-6">Galeri Foto ({{ $album->fotos->count() }})</h3>
    
    @if($album->fotos->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($album->fotos as $foto)
                <div class="relative group rounded-xl overflow-hidden border border-gray-200">
                    <img src="{{ asset('images/albums/' . $foto->img) }}" alt="Foto" class="w-full h-48 object-cover">
                    
                    <!-- Overlay actions -->
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <form action="{{ route('admin.albums.photos.destroy', [$album->id, $foto->id]) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white p-3 rounded-full hover:bg-red-700 transition-transform transform hover:scale-110 shadow-lg" title="Hapus Foto">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-10 text-gray-500 flex flex-col items-center">
            <i class="fa-regular fa-images text-4xl mb-3 text-gray-300"></i>
            <p>Belum ada foto dalam album ini.</p>
        </div>
    @endif
</div>
@endsection
