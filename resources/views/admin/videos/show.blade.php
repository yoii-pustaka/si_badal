@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.videos.index') }}" 
                       class="flex-shrink-0 w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Video Documentation
                        </h1>
                        <p class="text-gray-600 mt-1">Order #{{ $order->order_code }} - Review dan kelola video pelaksanaan</p>
                    </div>
                </div>

                <!-- Order Quick Info -->
                <div class="hidden md:block">
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200">
                        <div class="text-sm text-gray-500 mb-1">Status Order</div>
                        @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                            'confirmed' => 'bg-blue-100 text-blue-800 border-blue-200',
                            'in_progress' => 'bg-orange-100 text-orange-800 border-orange-200',
                            'completed' => 'bg-green-100 text-green-800 border-green-200',
                            'cancelled' => 'bg-red-100 text-red-800 border-red-200'
                        ];
                        $statusColor = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border {{ $statusColor }}">
                            <div class="w-2 h-2 rounded-full mr-2 
                                {{ $order->status === 'pending' ? 'bg-yellow-400' : '' }}
                                {{ $order->status === 'confirmed' ? 'bg-blue-400' : '' }}
                                {{ $order->status === 'in_progress' ? 'bg-orange-400' : '' }}
                                {{ $order->status === 'completed' ? 'bg-green-400' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-400' : '' }}">
                            </div>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Card -->
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Informasi Order</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Nama Almarhum/Almarhumah</label>
                                <p class="text-base font-semibold text-gray-900">{{ $order->nama_alm }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Bin/Binti</label>
                                <p class="text-base text-gray-700">{{ $order->bin_binti }}</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Pelaksana</label>
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-xs font-semibold text-white">
                                            {{ substr($order->pelaksana->name ?? 'N', 0, 1) }}
                                        </span>
                                    </div>
                                    <span class="text-base font-medium text-gray-900">{{ $order->pelaksana->name ?? '-' }}</span>
                                </div>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Tanggal Pelaksanaan</label>
                                <p class="text-base text-gray-700">
                                    {{ $order->tanggal_pelaksanaan ? \Carbon\Carbon::parse($order->tanggal_pelaksanaan)->format('d M Y') : 'Belum ditentukan' }}
                                </p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Paket</label>
                                <p class="text-base font-semibold text-gray-900">{{ $order->package->name ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-500">Total Video</label>
                                <p class="text-base font-semibold text-indigo-600">{{ $order->videos->count() }} Video</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Videos Section -->
        <div class="space-y-6">
            @forelse($order->videos as $index => $video)
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <!-- Video Header -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <span class="text-sm font-bold text-white">{{ $index + 1 }}</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Video {{ $index + 1 }}</h3>
                                    <p class="text-sm text-gray-500">
                                        Upload: {{ $video->created_at->format('d M Y, H:i') }}
                                        @if(isset($video->file_size))
                                            • {{ number_format($video->file_size / 1024 / 1024, 1) }} MB
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Status Badge -->
                            <div>
                                @if($video->status === 'approved')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Approved
                                    </span>
                                @elseif($video->status === 'rejected')
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Rejected
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full mr-2 animate-pulse"></div>
                                        Pending Review
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Video Player -->
                            <div class="lg:col-span-2">
                                <div class="relative">
                                    <div class="bg-gray-900 rounded-xl overflow-hidden shadow-lg">
                                        <video controls 
                                               class="w-full h-auto max-h-96 object-contain"
                                               preload="metadata"
                                               controlsList="nodownload">
                                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                            <div class="flex items-center justify-center h-64 bg-gray-200 text-gray-500">
                                                <div class="text-center">
                                                    <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p>Browser tidak mendukung pemutaran video</p>
                                                </div>
                                            </div>
                                        </video>
                                    </div>
                                    
                                    <!-- Video Controls Overlay -->
                                    <div class="absolute top-4 right-4">
                                        <button onclick="openFullscreen(this.previousElementSibling.querySelector('video'))"
                                                class="bg-black bg-opacity-50 text-white p-2 rounded-lg hover:bg-opacity-70 transition-all duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5h-4m4 0v4m0-4l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Video Description -->
                                @if($video->description)
                                <div class="mt-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1.586l-4 4z"></path>
                                        </svg>
                                        <div>
                                            <h4 class="text-sm font-semibold text-blue-800 mb-1">Keterangan</h4>
                                            <p class="text-sm text-blue-700 leading-relaxed">{{ $video->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Action Panel -->
                            <div class="space-y-4">
                                <!-- Video Information -->
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <h4 class="text-sm font-semibold text-gray-800 mb-3">Informasi Video</h4>
                                    <div class="space-y-2 text-sm">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Status:</span>
                                            <span class="font-medium capitalize">{{ $video->status }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Upload:</span>
                                            <span class="font-medium">{{ $video->created_at->format('d/m/Y') }}</span>
                                        </div>
                                        @if(isset($video->file_size))
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Ukuran:</span>
                                            <span class="font-medium">{{ number_format($video->file_size / 1024 / 1024, 1) }} MB</span>
                                        </div>
                                        @endif
                                        @if(isset($video->original_name))
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">File:</span>
                                            <span class="font-medium text-xs" title="{{ $video->original_name }}">
                                                {{ Str::limit(basename($video->original_name), 20) }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Rejection Reason -->
                                @if($video->status === 'rejected' && $video->reject_reason)
                                <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <h4 class="text-sm font-semibold text-red-800 mb-1">Alasan Penolakan</h4>
                                            <p class="text-sm text-red-700 leading-relaxed">{{ $video->reject_reason }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Action Buttons -->
                                @if($video->status === 'pending')
                                <div class="space-y-3">
                                    <h4 class="text-sm font-semibold text-gray-800">Review Actions</h4>
                                    
                                    <!-- Approve Button -->
                                    <form action="{{ route('admin.videos.approve', $video->id) }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui video ini?')"
                                                class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-200 shadow-sm hover:shadow-md font-medium">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Approve Video
                                        </button>
                                    </form>

                                    <!-- Reject Form -->
                                    <div class="border border-red-200 rounded-lg p-3 bg-red-50">
                                        <form action="{{ route('admin.videos.reject', $video->id) }}" method="POST" class="space-y-3">
                                            @csrf
                                            <div>
                                                <label class="block text-xs font-medium text-red-800 mb-1">Alasan Penolakan</label>
                                                <textarea name="reason" 
                                                          placeholder="Jelaskan alasan penolakan video ini..."
                                                          class="w-full text-sm border border-red-300 rounded-lg p-2 focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-white resize-none"
                                                          rows="3"
                                                          required></textarea>
                                            </div>
                                            <button type="submit" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menolak video ini?')"
                                                    class="w-full flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-200 font-medium text-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Reject Video
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                <!-- Download Button -->
                                <div class="pt-3 border-t border-gray-200">
                                    <a href="{{ asset('storage/' . $video->file_path) }}" 
                                       download
                                       class="w-full flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-sm font-medium">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                        </svg>
                                        Download Video
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Video</h3>
                    <p class="text-gray-500">Video dokumentasi belum diupload oleh pelaksana</p>
                </div>
            @endforelse
        </div>

        <!-- Back Button -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('admin.videos.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition-colors duration-200 shadow-sm border border-gray-200 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Video
            </a>
        </div>
    </div>
</div>

<script>
function openFullscreen(video) {
    if (video.requestFullscreen) {
        video.requestFullscreen();
    } else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen();
    } else if (video.msRequestFullscreen) {
        video.msRequestFullscreen();
    }
}

// Auto-pause other videos when one plays
document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('video');
    videos.forEach(video => {
        video.addEventListener('play', function() {
            videos.forEach(otherVideo => {
                if (otherVideo !== video) {
                    otherVideo.pause();
                }
            });
        });
    });
});
</script>
@endsection