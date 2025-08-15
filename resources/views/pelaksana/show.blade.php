@extends('layouts.pelaksana')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-green-50 to-teal-100 p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('pelaksana.orders.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-white text-gray-600 rounded-xl hover:bg-gray-50 transition-all duration-200 shadow-sm border border-gray-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Tugas
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Detail Tugas Umroh
                        </h1>
                        <p class="text-gray-600 mt-1">Order #{{ $order->id }} - Tugas Pelaksanaan Ibadah</p>
                    </div>
                </div>
                
                <!-- Status Badge -->
                @php
                    $statusConfig = [
                        'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'clock'],
                        'in_progress' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'refresh'],
                        'completed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'check-circle'],
                        'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'x-circle']
                    ];
                    $config = $statusConfig[$order->status] ?? $statusConfig['pending'];
                @endphp
                
                <div class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold {{ $config['bg'] }} {{ $config['text'] }} shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($config['icon'] === 'clock')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @elseif($config['icon'] === 'refresh')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        @elseif($config['icon'] === 'check-circle')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @endif
                    </svg>
                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Order Information Card -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Almarhum/Almarhumah Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-teal-600 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Almarhum/ah
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="text-center pb-4 border-b border-gray-200">
                            <div class="w-20 h-20 bg-gradient-to-r from-green-400 to-teal-400 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $order->nama_alm }}</h3>
                            <p class="text-gray-600">{{ $order->bin_binti }}</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Kondisi:</span>
                                <span class="font-semibold text-gray-900 capitalize">{{ $order->kondisi }}</span>
                            </div>
                            
                            @if($order->tanggal_pelaksanaan)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Tanggal Pelaksanaan:</span>
                                <span class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->tanggal_pelaksanaan)->format('d M Y') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Package & Contact Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Paket & Kontak
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <!-- Package Info -->
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Paket Umroh</h3>
                            <div class="space-y-2">
                                <p class="font-semibold text-gray-900">{{ $order->package->name ?? 'Paket Standard' }}</p>
                                @if($order->package && $order->package->description)
                                    <p class="text-sm text-gray-600">{{ $order->package->description }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-3">Kontak Pendaftar</h3>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Alamat:</p>
                                        <p class="font-medium text-gray-900">{{ $order->alamat_pendaftar }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">No. HP:</p>
                                        <a href="tel:{{ $order->no_hp }}" class="font-medium text-blue-600 hover:text-blue-700">{{ $order->no_hp }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($order->keterangan_lainnya)
                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Keterangan Tambahan</h3>
                            <p class="text-sm text-gray-600 bg-gray-50 rounded-lg p-3">{{ $order->keterangan_lainnya }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Videos Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M9 12l2 2 4-4"></path>
                                </svg>
                                Video Pelaksanaan ({{ $order->videos->count() }})
                            </h2>
                            
                            @if($order->status !== 'completed')
                            <a href="{{ route('pelaksana.orders.upload', $order->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-white text-purple-600 rounded-lg hover:bg-purple-50 transition-all duration-200 font-medium text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                Upload Video
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="p-6">
                        @forelse($order->videos as $video)
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-all duration-200 mb-6 last:mb-0">
                                <!-- Video Header -->
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">Video #{{ $loop->iteration }}</h3>
                                            <p class="text-sm text-gray-500">Upload: {{ $video->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Status Badge -->
                                    @php
                                        $videoStatusConfig = [
                                            'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'clock'],
                                            'approved' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'check'],
                                            'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'icon' => 'x']
                                        ];
                                        $videoConfig = $videoStatusConfig[$video->status] ?? $videoStatusConfig['pending'];
                                    @endphp
                                    
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $videoConfig['bg'] }} {{ $videoConfig['text'] }}">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($videoConfig['icon'] === 'clock')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            @elseif($videoConfig['icon'] === 'check')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            @endif
                                        </svg>
                                        {{ ucfirst($video->status) }}
                                    </div>
                                </div>

                                <!-- Video Player -->
                                <div class="mb-4">
                                    <video controls class="w-full rounded-xl bg-black shadow-lg max-h-80">
                                        <source src="{{ asset('storage/'.$video->file_path) }}" type="video/mp4">
                                        <source src="{{ asset('storage/'.$video->file_path) }}" type="video/webm">
                                        <source src="{{ asset('storage/'.$video->file_path) }}" type="video/ogg">
                                        Browser Anda tidak mendukung pemutar video.
                                    </video>
                                </div>

                                <!-- Video Info -->
                                <div class="space-y-3">
                                    @if($video->keterangan)
                                        <div class="bg-white rounded-lg p-4 border border-gray-200">
                                            <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1l-4 4z"></path>
                                                </svg>
                                                Keterangan:
                                            </h4>
                                            <p class="text-sm text-gray-600">{{ $video->keterangan }}</p>
                                        </div>
                                    @endif
                                    
                                    @if($video->reject_reason && $video->status === 'rejected')
                                        <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                            <h4 class="text-sm font-semibold text-red-700 mb-2 flex items-center">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Alasan Ditolak:
                                            </h4>
                                            <p class="text-sm text-red-600">{{ $video->reject_reason }}</p>
                                        </div>
                                    @endif

                                    <!-- Video Stats -->
                                    <div class="flex items-center justify-between text-xs text-gray-500 pt-2 border-t border-gray-200">
                                        <div class="flex items-center space-x-4">
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $video->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        
                                        @if($video->status === 'approved')
                                        <div class="flex items-center text-green-600">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Video Disetujui
                                        </div>
                                        @elseif($video->status === 'pending')
                                        <div class="flex items-center text-yellow-600">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Menunggu Review
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M9 12l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Video</h3>
                                <p class="text-gray-500 mb-6">Mulai dokumentasikan pelaksanaan ibadah umroh dengan mengupload video.</p>
                                
                                @if($order->status !== 'completed')
                                <a href="{{ route('pelaksana.orders.upload', $order->id) }}" 
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl font-semibold">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    Upload Video Pertama
                                </a>
                                @endif
                            </div>
                        @endforelse
                    </div>
                </div>

                @if($order->videos->count() > 0 && $order->status !== 'completed')
                <!-- Action Card -->
                <div class="mt-6 bg-gradient-to-r from-green-50 to-teal-50 rounded-2xl p-6 border border-green-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Tambah Video Lainnya?</h3>
                            <p class="text-sm text-gray-600">Anda dapat menambahkan lebih banyak dokumentasi video pelaksanaan.</p>
                        </div>
                        <a href="{{ route('pelaksana.orders.upload', $order->id) }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Upload Video
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection