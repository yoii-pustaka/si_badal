{{-- Opsi 1: Template yang dimodifikasi untuk menampilkan berdasarkan Order --}}
@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section - sama seperti sebelumnya -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Daftar Order dengan Video
                        </h1>
                        <p class="text-gray-600 mt-1">Kelola dan review video dokumentasi per order</p>
                    </div>
                </div>
                
                <!-- Stats Summary -->
                <div class="hidden md:flex items-center space-x-4">
                    <div class="bg-white rounded-lg px-4 py-3 shadow-sm border border-gray-200">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                            <span class="text-sm font-medium text-gray-600">{{ $pendingVideos ?? 0 }} Pending</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg px-4 py-3 shadow-sm border border-gray-200">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span class="text-sm font-medium text-gray-600">{{ $approvedVideos ?? 0 }} Approved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content - Orders with Videos -->
        <div class="space-y-6">
            @forelse($orders as $order)
                <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
                    <!-- Order Header -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $order->order_code ?? "Order #$order->id" }}</h3>
                                </div>
                                <div class="text-sm text-gray-600">
                                    <span class="font-medium">{{ $order->nama_alm }}</span>
                                    @if($order->bin_binti)
                                        <span class="text-gray-500"> - {{ $order->bin_binti }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <!-- Order Status -->
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
                                        'in_progress' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800'],
                                        'completed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800']
                                    ];
                                    $config = $statusConfig[$order->status] ?? $statusConfig['pending'];
                                @endphp
                                
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $config['bg'] }} {{ $config['text'] }}">
                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                </span>
                                
                                <span class="text-sm text-gray-500">
                                    {{ $order->videos->count() }} video(s)
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Videos Grid -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($order->videos as $video)
                                <div class="relative group">
                                    <!-- Video Card -->
                                    <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-lg transition-all duration-200">
                                        <!-- Video Preview -->
                                        <div class="relative">
                                            <div class="aspect-video bg-gray-100">
                                                <video class="w-full h-full object-cover cursor-pointer" 
                                                       preload="metadata"
                                                       onclick="openVideoModal('{{ asset('storage/' . $video->file_path) }}', '{{ $order->order_code ?? 'Video' }} - Video #{{ $loop->iteration }}')">
                                                    <source src="{{ asset('storage/' . $video->file_path) }}" type="{{ $video->mime_type ?? 'video/mp4' }}">
                                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </div>
                                                </video>
                                                <!-- Play Overlay -->
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                                    <div class="w-12 h-12 bg-white bg-opacity-90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                        <svg class="w-6 h-6 text-gray-700 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M8 5v14l11-7z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Status Badge -->
                                            <div class="absolute top-2 right-2">
                                                @if($video->status === 'approved')
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                        <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-1"></div>
                                                        Approved
                                                    </span>
                                                @elseif($video->status === 'rejected')
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1"></div>
                                                        Rejected
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                        <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full mr-1 animate-pulse"></div>
                                                        Pending
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Video Info -->
                                        <div class="p-4">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm font-medium text-gray-900">Video #{{ $loop->iteration }}</span>
                                                <span class="text-xs text-gray-500">{{ $video->created_at->format('d M') }}</span>
                                            </div>
                                            
                                            @if($video->description)
                                            <p class="text-xs text-gray-600 mb-3 line-clamp-2">{{ $video->description }}</p>
                                            @endif
                                            
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2 text-xs text-gray-500">
                                                    <span>{{ $video->pelaksana->name ?? 'N/A' }}</span>
                                                </div>
                                                
                                                @if($video->status === 'pending')
                                                <div class="flex items-center space-x-1">
                                                    <button onclick="approveVideo({{ $video->id }})"
                                                            class="inline-flex items-center px-2 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700 transition-colors duration-200">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </button>
                                                    <button onclick="rejectVideo({{ $video->id }})"
                                                            class="inline-flex items-center px-2 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition-colors duration-200">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Order Actions -->
                        <div class="mt-4 pt-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-600">
                                Pelaksana: <span class="font-medium">{{ $order->videos->first()->pelaksana->name ?? 'N/A' }}</span>
                            </div>
                            <a href="{{ route('admin.videos.show', $order->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat Detail Order
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-xl border border-gray-200 p-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada video</h3>
                    <p class="text-gray-500">Order dengan video akan muncul di sini</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if(method_exists($orders, 'links'))
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Video Modal - sama seperti sebelumnya -->
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="max-w-4xl max-h-full p-4 w-full">
        <div class="relative bg-white rounded-xl overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <h3 id="videoModalTitle" class="text-lg font-semibold text-gray-900">Video Preview</h3>
                <button onclick="closeVideoModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <video id="modalVideo" controls class="w-full max-h-96 rounded-lg">
                    <source src="" type="video/mp4">
                    Browser tidak mendukung pemutaran video.
                </video>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript functions sama seperti sebelumnya
function openVideoModal(src, title) {
    document.getElementById('modalVideo').src = src;
    document.getElementById('videoModalTitle').textContent = title;
    document.getElementById('videoModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    document.getElementById('videoModal').classList.add('hidden');
    document.getElementById('modalVideo').pause();
    document.body.style.overflow = 'auto';
}

function approveVideo(videoId) {
    if (confirm('Apakah Anda yakin ingin menyetujui video ini?')) {
        fetch(`/admin/videos/${videoId}/approve`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal menyetujui video');
            }
        });
    }
}

function rejectVideo(videoId) {
    const reason = prompt('Alasan penolakan (opsional):');
    if (reason !== null) {
        fetch(`/admin/videos/${videoId}/reject`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ reason: reason })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal menolak video');
            }
        });
    }
}

// Close modal when clicking outside
document.getElementById('videoModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeVideoModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVideoModal();
    }
});
</script>
@endsection