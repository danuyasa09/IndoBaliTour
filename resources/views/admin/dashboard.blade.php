@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Ringkasan data Indo Bali Tour')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
            <div class="bg-blue-50 text-blue-600 w-12 h-12 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Users</p>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
            <div class="bg-emerald-50 text-emerald-600 w-12 h-12 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Testimoni</p>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Testimony::count() }}</p>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
            <div class="bg-amber-50 text-amber-600 w-12 h-12 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Paket Tour</p>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Tour::count() }}</p>
            </div>
        </div>
        
        <!-- Stat Card 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4">
            <div class="bg-purple-50 text-purple-600 w-12 h-12 rounded-lg flex items-center justify-center text-xl">
                <i class="fa-solid fa-car"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Kendaraan</p>
                <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Car::count() }}</p>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Testimoni Terbaru</h3>
            <a href="#" class="text-sm text-brand-red hover:text-red-700 font-medium">Lihat Semua &rarr;</a>
        </div>
        <div class="p-0">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Negara</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse(\App\Models\Testimony::latest()->take(5)->get() as $testimony)
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
                                @if($testimony->is_approved)
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
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
    </div>
@endsection
