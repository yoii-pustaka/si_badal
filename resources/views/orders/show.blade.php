@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-600 mb-6">
            <a href="{{ route('orders.index') }}" class="hover:text-blue-600 transition duration-200 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Daftar Order
            </a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-blue-600 font-medium">Detail Order</span>
        </div>

        <!-- Header Section -->
        <div class="mb-8 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-1">Detail Order</h1>
                        <p class="text-gray-600">{{ $order->order_code }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
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
                    <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold border {{ $statusColor }} shadow-sm">
                        <div class="w-2 h-2 rounded-full mr-2 
                            {{ $order->status === 'pending' ? 'bg-yellow-400' : '' }}
                            {{ $order->status === 'confirmed' ? 'bg-blue-400' : '' }}
                            {{ $order->status === 'in_progress' ? 'bg-orange-400' : '' }}
                            {{ $order->status === 'completed' ? 'bg-green-400' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-400' : '' }}">
                        </div>
                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="xl:col-span-2 space-y-8">
                
                <!-- Order Information Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Order
                        </h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Almarhum Info -->
                        <div class="border-l-4 border-blue-500 pl-6 py-4 bg-blue-50 rounded-r-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Almarhum/Almarhumah
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-white rounded-lg p-4 shadow-sm">
                                    <p class="text-sm font-medium text-gray-500 mb-1">Nama Lengkap</p>
                                    <p class="text-base font-semibold text-gray-900">{{ $order->nama_alm }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-4 shadow-sm">
                                    <p class="text-sm font-medium text-gray-500 mb-1">Bin/Binti</p>
                                    <p class="text-base font-semibold text-gray-900">{{ $order->bin_binti }}</p>
                                </div>
                                <div class="bg-white rounded-lg p-4 shadow-sm sm:col-span-2">
                                    <p class="text-sm font-medium text-gray-500 mb-1">Kondisi</p>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                        {{ $order->kondisi === 'baik' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($order->kondisi) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Package Info -->
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shadow-sm">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-green-700 mb-1">Paket Layanan</p>
                                    <p class="text-xl font-semibold text-green-900 mb-2">{{ $order->package->name }}</p>
                                    <p class="text-2xl font-bold text-green-800">Rp {{ number_format($order->package->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Informasi Kontak
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-500 mb-1">Alamat Pendaftar</p>
                                        <p class="text-base text-gray-900">{{ $order->alamat_pendaftar }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">No HP</p>
                                        <p class="text-base font-semibold text-gray-900">{{ $order->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($order->keterangan)
                        <!-- Additional Notes -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                            <h3 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1.586l-4 4z"></path>
                                </svg>
                                Keterangan Tambahan
                            </h3>
                            <p class="text-blue-800 leading-relaxed">{{ $order->keterangan }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Video Documentation Section -->
                @if($order->videos->count())
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            Video Dokumentasi
                            <span class="ml-2 bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $order->videos->count() }} Video
                            </span>
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            @foreach($order->videos as $index => $video)
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl overflow-hidden shadow-sm border border-gray-200">
                                <!-- Video Header -->
                                <div class="px-4 py-3 bg-white border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                                <span class="text-sm font-bold text-purple-600">{{ $index + 1 }}</span>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-700">Video {{ $index + 1 }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1 text-xs text-gray-500">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($video->created_at)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Video Player -->
                                <div class="p-4">
                                    <div class="relative group">
                                        <video controls 
                                               class="w-full h-48 object-cover rounded-lg shadow-sm bg-black"
                                               preload="metadata">
                                            <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                            <div class="flex items-center justify-center h-48 bg-gray-200 rounded-lg">
                                                <div class="text-center">
                                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p class="text-sm text-gray-500">Video tidak dapat diputar</p>
                                                </div>
                                            </div>
                                        </video>
                                    </div>

                                    <!-- Video Description -->
                                    @if($video->description)
                                    <div class="mt-3 p-3 bg-white rounded-lg border border-gray-200">
                                        <p class="text-sm text-gray-700 leading-relaxed">{{ $video->description }}</p>
                                    </div>
                                    @else
                                    <div class="mt-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                                        <p class="text-sm text-blue-600 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                            Dokumentasi pelaksanaan ritual
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Video Summary -->
                        <div class="mt-6 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-6 border border-purple-100">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-purple-800 mb-1">Dokumentasi Lengkap</h4>
                                    <p class="text-sm text-purple-700">
                                        Semua tahapan pelaksanaan telah didokumentasikan dengan baik sebagai bukti penyelesaian layanan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="xl:col-span-1 space-y-6">
                
                <!-- Execution Details -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Bukti Pembayaran
                        </h2>
                    </div>

                    <div class="p-6">
                        <!-- Payment Status -->
                        <div class="mb-6 flex items-center justify-between">
                            <span class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                                <div class="w-2 h-2 rounded-full bg-green-400 mr-2"></div>
                                Pembayaran Diterima
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($order->updated_at)->format('d M Y, H:i') }}
                            </span>
                        </div>

                        <!-- Payment Image -->
                        <div class="relative group mb-6">
                            <div class="bg-gray-100 rounded-xl p-2 shadow-inner">
                                <img src="{{ asset('storage/' . $order->payment->payment_proof) }}"
                                    alt="Bukti Pembayaran"
                                    class="w-full h-64 object-cover rounded-lg shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer"
                                    onclick="openImageModal(this.src)">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 rounded-lg flex items-center justify-center m-2">
                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-xl p-4 text-center">
                                        <svg class="w-8 h-8 text-gray-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-gray-700">Klik untuk memperbesar</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Amount -->
                        <div class="bg-green-50 rounded-xl p-6 border border-green-200">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-green-800 mb-1">Total Pembayaran</h4>
                                    <p class="text-2xl font-bold text-green-700">Rp {{ number_format($order->package->price, 0, ',', '.') }}</p>
                                    <p class="text-sm text-green-600 mt-1">{{ $order->package->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Actions -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <a href="{{ route('orders.index') }}"
                        class="w-full inline-flex items-center justify-center px-6 py-4 border-2 border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-100 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar Order
                    </a>
                </div>
            </div>
        </div>

        <!-- No Videos State -->
        @if(!$order->videos->count())
        <div class="mt-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-400 to-gray-500 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Video Dokumentasi Pelaksanaan
                    </h2>
                </div>
                
                <div class="p-8">
                    <div class="text-center py-12">
                        <div class="mx-auto w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mb-6 shadow-inner">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Menunggu Dokumentasi</h3>
                        <p class="text-gray-600 max-w-md mx-auto leading-relaxed mb-6">
                            Video dokumentasi akan tersedia setelah pelaksanaan selesai. Tim kami akan mengupload bukti pelaksanaan secara berkala.
                        </p>
                        
                        @if($order->status === 'in_progress')
                        <div class="inline-flex items-center px-6 py-3 rounded-xl bg-orange-100 text-orange-800 border border-orange-200">
                            <div class="w-3 h-3 bg-orange-400 rounded-full mr-3 animate-pulse"></div>
                            <span class="font-semibold">Sedang Dalam Proses Pelaksanaan</span>
                        </div>
                        @elseif($order->status === 'confirmed')
                        <div class="inline-flex items-center px-6 py-3 rounded-xl bg-blue-100 text-blue-800 border border-blue-200">
                            <div class="w-3 h-3 bg-blue-400 rounded-full mr-3 animate-pulse"></div>
                            <span class="font-semibold">Order Telah Dikonfirmasi</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden backdrop-blur-sm">
    <div class="max-w-5xl max-h-full p-4 w-full">
        <div class="relative bg-white rounded-2xl overflow-hidden shadow-2xl">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">Bukti Pembayaran</h3>
                <button onclick="closeImageModal()" class="text-white hover:text-gray-300 focus:outline-none transition duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 max-h-[80vh] overflow-auto">
                <img id="modalImage" src="" alt="Bukti Pembayaran" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</div>

<script>
    function openImageModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside the image
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });

    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endsection