@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Modern & Informative Overview for Indo Bali Tour')

@section('content')
    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">Booking Overview: Monthly Trends</h3>
        <div class="relative h-64 w-full">
            <canvas id="bookingChart"></canvas>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-blue-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Total Pelamar:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['job_applications'] }}</p>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-emerald-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-comments"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Testimoni:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['testimonies'] }}</p>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-amber-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-map"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Paket Tour:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['tours'] }}</p>
            </div>
        </div>
        
        <!-- Stat Card 4 -->
        <div class="bg-purple-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-calendar-alt"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Total Booking:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['bookings'] }}</p>
            </div>
        </div>

        <!-- Stat Card 5 -->
        <div class="bg-rose-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-person-swimming"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Fun Activity:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['fun_activities'] }}</p>
            </div>
        </div>

        <!-- Stat Card 6 -->
        <div class="bg-cyan-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-car"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Kendaraan:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['cars'] }}</p>
            </div>
        </div>

        <!-- Stat Card 7 -->
        <div class="bg-indigo-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-hotel"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Hotel Transfer:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['hotel_transfers'] }}</p>
            </div>
        </div>

        <!-- Stat Card 8 -->
        <div class="bg-teal-500 text-white rounded-xl shadow-sm p-6 flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center text-3xl opacity-90">
                <i class="fa-solid fa-plane-arrival"></i>
            </div>
            <div>
                <p class="text-sm font-medium opacity-90">Airport Transfer:</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['airports'] }}</p>
            </div>
        </div>
    </div>

    <!-- Lists Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Latest Bookings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800 text-lg">Latest Bookings</h3>
                <a href="{{ Route::has('admin.bookings.index') ? route('admin.bookings.index') : '#' }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <ul class="divide-y divide-gray-100">
                @forelse($recent_bookings as $booking)
                    <li class="py-3 flex justify-between items-center">
                        <span class="text-gray-700 text-sm font-medium">{{ $booking->full_name }} &ndash; {{ Str::limit($booking->item_title, 25) }}</span>
                        @if($booking->status == 'pending')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Pending</span>
                        @elseif($booking->status == 'approved' || $booking->status == 'completed')
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Accepted</span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">{{ ucfirst($booking->status) }}</span>
                        @endif
                    </li>
                @empty
                    <li class="py-4 text-center text-gray-500 text-sm">Belum ada data booking.</li>
                @endforelse
            </ul>
        </div>

        <!-- Newest Applicants -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800 text-lg">Newest Applicants</h3>
                <a href="{{ Route::has('admin.job_applications.index') ? route('admin.job_applications.index') : '#' }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <ul class="divide-y divide-gray-100">
                @forelse($recent_job_applications as $application)
                    <li class="py-3 flex justify-between items-center">
                        <span class="text-gray-700 text-sm font-medium">{{ $application->name }} - {{ $application->position }}</span>
                        @if($application->status == 'pending')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Pending</span>
                        @elseif($application->status == 'approved' || $application->status == 'accepted')
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Accepted</span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">{{ ucfirst($application->status) }}</span>
                        @endif
                    </li>
                @empty
                    <li class="py-4 text-center text-gray-500 text-sm">Belum ada data pelamar.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Testimoni Terbaru -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-gray-800 text-lg">Testimoni Terbaru</h3>
            <a href="{{ Route::has('admin.testimonies.index') ? route('admin.testimonies.index') : '#' }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
                Lihat Semua <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($recent_testimonies->take(3) as $testimony)
                <div class="border border-gray-100 rounded-xl p-5 shadow-sm bg-gray-50/50">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimony->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $testimony->nationality }} &ndash; "{{ Str::limit($testimony->message, 40) }}"</p>
                        </div>
                        <div class="text-blue-500 bg-blue-100 rounded-full w-5 h-5 flex items-center justify-center text-xs flex-shrink-0">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                    <div class="flex text-amber-400 text-sm mt-3">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < $testimony->rating)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star text-gray-300"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-4">Belum ada testimoni.</div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('bookingChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)'); // Blue-500 with opacity
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

        const monthlyData = @json($monthlyBookings);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Bookings',
                    data: monthlyData,
                    borderColor: '#3b82f6', // blue-500
                    backgroundColor: gradient,
                    borderWidth: 2,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.8)',
                        padding: 12,
                        titleFont: { size: 13, family: "'Inter', sans-serif" },
                        bodyFont: { size: 14, weight: 'bold', family: "'Inter', sans-serif" },
                        displayColors: false,
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            color: '#6b7280',
                            font: { family: "'Inter', sans-serif", size: 12 }
                        }
                    },
                    y: {
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false,
                        },
                        ticks: {
                            color: '#6b7280',
                            font: { family: "'Inter', sans-serif", size: 12 },
                            stepSize: 500, // Matching the reference image scale approximately
                            beginAtZero: true
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
            }
        });
    });
</script>
@endpush
