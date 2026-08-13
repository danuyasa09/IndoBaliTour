@extends('layouts.admin')

@section('title', 'Tambah Airport Transfer')
@section('subtitle', 'Tambahkan rute dan harga transfer bandara')

@section('actions')
<a href="{{ route('admin.airports.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition-colors">
    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <form action="{{ route('admin.airports.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Start -->
            <div>
                <label for="start" class="block text-sm font-medium text-gray-700 mb-1">Titik Jemput (Start)</label>
                <input type="text" name="start" id="start" value="{{ old('start') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('start')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Destination -->
            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Tujuan (Destination)</label>
                <input type="text" name="destination" id="destination" value="{{ old('destination') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required>
                @error('destination')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga ($)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-brand-red focus:ring-brand-red" required min="0">
                @error('price')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
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
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-brand-red text-white font-medium rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-red">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection
