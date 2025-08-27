@extends('layouts.pelaksana')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Tugas Anda</h1>
                    <p class="text-gray-600">Kelola dan pantau semua tugas yang telah diberikan</p>
                </div>
            </div>
            
            <!-- Stats Overview -->
            @if(!$orders->isEmpty())
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Tugas</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $orders->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Menunggu</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $orders->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Selesai</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $orders->where('status', 'completed')->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Proses</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $orders->where('status', 'processing')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        @if($orders->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="mx-auto flex items-center justify-center h-32 w-32 rounded-full bg-yellow-100 mb-6">
                    <svg class="h-16 w-16 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak Ada Tugas</h3>
                <p class="text-gray-500 max-w-md mx-auto">Saat ini tidak ada tugas yang perlu dikerjakan. Silakan periksa kembali nanti atau hubungi admin jika ada pertanyaan.</p>
            </div>
        @else
            <!-- Orders List -->
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 overflow-hidden">
                        <div class="p-6">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start space-x-4">
                                        <!-- Avatar/Icon -->
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold text-lg">
                                                {{ substr($order->nama_alm, 0, 1) }}
                                            </div>
                                        </div>
                                        
                                        <!-- Content -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <h2 class="text-xl font-semibold text-gray-900 truncate">
                                                    {{ $order->nama_alm }}
                                                </h2>
                                                <span class="text-gray-500 text-sm">
                                                    ({{ $order->bin_binti }})
                                                </span>
                                            </div>
                                            
                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-3">
                                                <div class="flex items-center space-x-1">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                    <span class="font-medium">{{ $order->package->name }}</span>
                                                </div>
                                                
                                                <div class="flex items-center space-x-1">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 7v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span>Order #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                                </div>
                                                
                                                @if($order->created_at)
                                                <div class="flex items-center space-x-1">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span>{{ $order->created_at->format('d M Y') }}</span>
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Status Badge -->
                                            <div class="flex items-center space-x-2">
                                                @switch($order->status)
                                                    @case('pending')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Menunggu
                                                        </span>
                                                        @break
                                                    @case('processing')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Proses
                                                        </span>
                                                        @break
                                                    @case('completed')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Selesai
                                                        </span>
                                                        @break
                                                    @default
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                @endswitch
                                                
                                                @if($order->priority ?? false)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                    Prioritas
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="mt-4 lg:mt-0 lg:ml-6 flex-shrink-0">
                                    <a href="{{ route('pelaksana.orders.show', $order->id) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 shadow-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar (if applicable) -->
                        @if($order->status === 'processing')
                        <div class="px-6 pb-4">
                            <div class="flex items-center justify-between text-xs text-gray-600 mb-1">
                                <span>Progress</span>
                                <span>75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Pagination (if needed) -->
            @if(method_exists($orders, 'hasPages') && $orders->hasPages())
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
            @endif
        @endif
    </div>
</div>
@endsection