@extends('layouts.admin')

@section('title', 'Job Applications')
@section('subtitle', 'Daftar semua lamaran pekerjaan yang masuk')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Applicant Info</th>
                    <th class="px-6 py-4">Position</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($applications as $index => $app)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ $app->name }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $app->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-700">
                        {{ $app->position }}
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $badgeClass = 'bg-gray-100 text-gray-700';
                            if ($app->status == 'pending') $badgeClass = 'bg-yellow-100 text-yellow-800';
                            if ($app->status == 'reviewed') $badgeClass = 'bg-blue-100 text-blue-800';
                            if ($app->status == 'accepted') $badgeClass = 'bg-green-100 text-green-800';
                            if ($app->status == 'rejected') $badgeClass = 'bg-red-100 text-red-800';
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                            {{ ucfirst($app->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $app->created_at->format('d M Y, H:i') }}
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.job_applications.show', $app->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-brand-red hover:bg-red-50 transition-colors" title="View Detail">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.job_applications.destroy', $app->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this application?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada lamaran pekerjaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
