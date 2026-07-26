@extends('layouts.admin')

@section('title', 'Edit Testimoni')
@section('subtitle', 'Ubah detail testimoni pelanggan')

@section('actions')
<a href="{{ route('admin.testimonies.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-3xl">
    <form action="{{ route('admin.testimonies.update', $testimony->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $testimony->name) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Nationality -->
            <div>
                <label for="nationality" class="block text-sm font-medium text-gray-700 mb-1">Kewarganegaraan</label>
                <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $testimony->nationality) }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('nationality')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Rating -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating (1-5)</label>
                <select name="rating" id="rating" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $testimony->rating) == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                    @endfor
                </select>
                @error('rating')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Message -->
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan Testimoni</label>
                <textarea name="message" id="message" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>{{ old('message', $testimony->message) }}</textarea>
                @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Photo -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto (Opsional)</label>
                @if($testimony->photo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $testimony->photo) }}" alt="Foto" class="h-20 w-20 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" name="photo" id="photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-red file:text-white hover:file:bg-red-700 transition-colors">
                <p class="mt-1 text-xs text-gray-500">Abaikan jika tidak ingin mengubah foto. Format: JPG, PNG, max 2MB.</p>
                @error('photo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_approved" id="is_approved" value="1" {{ old('is_approved', $testimony->is_approved) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-red focus:ring-brand-red">
                <label for="is_approved" class="text-sm font-medium text-gray-700">Setujui Testimoni Ini</label>
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
