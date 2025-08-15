@extends('layouts.app')

@section('title', 'Paket Badal Umroh - PT Reva Sarif Group')

@section('description', 'Pilihan paket badal umroh dengan berbagai kategori sesuai kebutuhan dan budget Anda. Dokumentasi lengkap dan transparansi penuh.')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-teal-600 to-teal-700 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Paket Badal Umroh</h1>
            <p class="text-xl text-teal-100 max-w-3xl mx-auto">
                Pilih paket badal umroh yang sesuai dengan kebutuhan dan budget Anda.
                Semua paket dilengkapi dengan dokumentasi video HD dan sertifikat digital.
            </p>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter & Search -->
        <div class="mb-12">
            <div class="bg-white rounded-2xl p-6 card-shadow">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <input type="text" placeholder="Cari paket..."
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                            <option value="">Semua Kategori</option>
                            <option value="ekonomi">Ekonomi</option>
                            <option value="standar">Standar</option>
                            <option value="premium">Premium</option>
                        </select>

                        <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                            <option value="">Urutkan</option>
                            <option value="price_low">Harga: Rendah ke Tinggi</option>
                            <option value="price_high">Harga: Tinggi ke Rendah</option>
                            <option value="popular">Paling Populer</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Package Cards -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mb-12">
            @foreach($packages as $package)
            <div class="bg-white rounded-2xl overflow-hidden card-shadow hover:shadow-xl transition-all duration-300 group flex flex-col">
                <!-- Package Image & Badge -->
                <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-kaaba text-6xl text-white/80"></i>
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-800 text-white px-3 py-1 rounded-full text-xs font-medium">{{ strtoupper($package->type) }}</span>
                    </div>
                </div>

                <!-- Package Content -->
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $package->description }}</p>

                    <!-- Price -->
                    <div class="mb-6">
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-teal-600">Rp {{ number_format($package->price,0,',','.') }}</span>
                            @if($package->original_price > $package->price)
                            <span class="text-gray-500 ml-2 line-through">Rp {{ number_format($package->original_price,0,',','.') }}</span>
                            @endif
                        </div>
                        @if($package->original_price > $package->price)
                        <p class="text-xs text-green-600 font-medium">Hemat Rp {{ number_format($package->original_price - $package->price,0,',','.') }}</p>
                        @endif
                    </div>

                    <!-- Features / Services -->
                    <ul class="space-y-2 mb-6 flex-1">
                        @foreach($package->allServices() as $service)
                        <li class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            {{ $service->name }}
                        </li>
                        @endforeach
                    </ul>

                    <!-- Action Button -->
                    <a href="{{ route('orders.create', ['package_id' => $package->id]) }}"
                        class="mt-auto w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 rounded-lg transition-colors group-hover:scale-105 transform duration-300 flex justify-center items-center">
                        <i class="fas fa-star mr-2"></i>
                        Pilih Paket
                    </a>
                </div>
            </div>
            @endforeach
        </div>



        <!-- Package Comparison -->
        <div class="bg-white rounded-2xl p-8 card-shadow mb-12">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-8">Perbandingan Paket</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-800">Fitur</th>
                            <th class="text-center py-4 px-4 font-semibold text-blue-600">Ekonomi</th>
                            <th class="text-center py-4 px-4 font-semibold text-orange-600">Standar</th>
                            <th class="text-center py-4 px-4 font-semibold text-purple-600">Premium</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="py-3 px-4">Tawaf & Sa'i</td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Video Dokumentasi</td>
                            <td class="text-center py-3 px-4">HD</td>
                            <td class="text-center py-3 px-4">4K</td>
                            <td class="text-center py-3 px-4">Sinematik</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Jumlah Foto</td>
                            <td class="text-center py-3 px-4">10 foto</td>
                            <td class="text-center py-3 px-4">25 foto</td>
                            <td class="text-center py-3 px-4">Unlimited</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Live Tracking</td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Live Streaming</td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Konsultasi Ustadz</td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Sertifikat Fisik</td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-3 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-2xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-4">Masih Bingung Memilih Paket?</h3>
                <p class="text-teal-100 mb-6 max-w-2xl mx-auto">
                    Tim ahli kami siap membantu Anda memilih paket badal umroh yang paling sesuai
                    dengan kebutuhan dan budget. Konsultasi gratis tanpa komitmen.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                        class="bg-white text-teal-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('register') }}"
                        class="border-2 border-white text-white hover:bg-white hover:text-teal-600 font-semibold py-3 px-8 rounded-lg transition-colors">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .gold-400 {
        background-color: #fbbf24;
    }

    .gold-900 {
        color: #78350f;
    }

    /* Package card hover effects */
    .group:hover .transform {
        transform: scale(1.02);
    }
</style>
@endpush