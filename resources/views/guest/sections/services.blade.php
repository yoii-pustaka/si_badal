@extends('layouts.app')

@section('title', 'Layanan Kami - PT Reva Sarif Group')

@section('description', 'Layanan lengkap PT Reva Sarif Group: Badal Umroh, Handling Service, Transportasi, Hotel, dan Visa dengan sistem informasi terintegrasi.')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-teal-600 to-teal-700 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Layanan Kami</h1>
                <p class="text-xl text-teal-100 max-w-3xl mx-auto">
                    PT Reva Sarif Group menyediakan layanan ibadah haji dan umroh yang komprehensif 
                    dengan teknologi sistem informasi terintegrasi untuk kemudahan dan transparansi.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Services -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Badal Umroh Service - Featured -->
            <div class="mb-20">
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-3xl p-8 lg:p-12">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="inline-flex items-center bg-teal-600 text-white px-4 py-2 rounded-full text-sm font-medium mb-6">
                                <i class="fas fa-star mr-2"></i>
                                Layanan Utama
                            </div>
                            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6">
                                Layanan Badal Umroh
                            </h2>
                            <p class="text-lg text-gray-600 mb-8">
                                Layanan ibadah badal umroh untuk keluarga yang tidak dapat melaksanakan secara langsung, 
                                dengan sistem informasi terintegrasi yang memberikan transparansi dan dokumentasi lengkap.
                            </p>
                            
                            <!-- Key Features -->
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Sistem online terintegrasi</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Dokumentasi video HD/4K</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Pelaksana berpengalaman</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Transparansi penuh</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Real-time tracking</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-teal-500 mr-3"></i>
                                    <span class="text-gray-700">Sertifikat digital</span>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('packages') }}" class="btn-primary inline-flex items-center justify-center">
                                    <i class="fas fa-box mr-2"></i>
                                    Lihat Paket Badal
                                </a>
                                <a href="{{ route('contact') }}" class="btn-secondary inline-flex items-center justify-center">
                                    <i class="fas fa-phone mr-2"></i>
                                    Konsultasi
                                </a>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <!-- Service Preview Card -->
                            <div class="bg-white rounded-2xl p-6 card-shadow">
                                <h4 class="font-semibold text-gray-800 mb-4">Proses Digital</h4>
                                <div class="space-y-4">
                                    <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user-plus text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-700">Registrasi & Verifikasi</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-shopping-cart text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-700">Pilih Paket & Bayar</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                                        <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-kaaba text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-700">Pelaksanaan Badal</span>
                                    </div>
                                    <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-video text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-700">Dokumentasi Video</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Other Services Grid -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <!-- Handling Service -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-hands-helping text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Handling Service</h3>
                    <p class="text-gray-600 mb-6">
                        Bantuan administratif dan lapangan dari kedatangan hingga kepulangan jamaah 
                        untuk memastikan kenyamanan perjalanan ibadah di Tanah Suci.
                    </p>
                    
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Bantuan Administrasi</div>
                                <div class="text-sm text-gray-600">Pengurusan dokumen dan keperluan administratif</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Pendampingan Lapangan</div>
                                <div class="text-sm text-gray-600">Tim lapangan berpengalaman di lokasi ibadah</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-blue-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Support 24/7</div>
                                <div class="text-sm text-gray-600">Layanan bantuan sepanjang waktu</div>
                            </div>
                        </li>
                    </ul>
                    
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <!-- Transportation -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-bus text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Transportasi</h3>
                    <p class="text-gray-600 mb-6">
                        Layanan transportasi bus berkualitas di area Tanah Suci untuk kemudahan 
                        mobilitas jamaah selama menjalankan ibadah haji dan umroh.
                    </p>
                    
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Bus Berkualitas</div>
                                <div class="text-sm text-gray-600">Armada bus modern dengan AC dan fasilitas lengkap</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Driver Berpengalaman</div>
                                <div class="text-sm text-gray-600">Sopir profesional yang familiar dengan rute Tanah Suci</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                            <div>
                                <div class="font-medium text-gray-800">Rute Strategis</div>
                                <div class="text-sm text-gray-600">Akses mudah ke Masjidil Haram dan tempat ibadah</div>
                            </div>
                        </li>
                    </ul>
                    
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                        Hubungi Kami <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            
            <!-- Additional Services -->
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Hotel Booking -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-hotel text-white"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Pemesanan Hotel</h4>
                            <p class="text-gray-600 mb-4">
                                Layanan pemesanan hotel strategis di Mekah dan Madinah dengan fasilitas terbaik 
                                dan lokasi yang dekat dengan tempat ibadah.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-purple-200 text-purple-800 rounded-full text-xs">Lokasi Strategis</span>
                                <span class="px-3 py-1 bg-purple-200 text-purple-800 rounded-full text-xs">Fasilitas Lengkap</span>
                                <span class="px-3 py-1 bg-purple-200 text-purple-800 rounded-full text-xs">Harga Terbaik</span>
                            </div>
                            <a href="{{ route('contact') }}" class="text-purple-600 hover:text-purple-700 font-medium">
                                Info Selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Visa Processing -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-passport text-white"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Pengurusan Visa</h4>
                            <p class="text-gray-600 mb-4">
                                Pengurusan visa umrah dan haji secara profesional dengan proses yang cepat, 
                                aman, dan terpercaya melalui jalur resmi.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-xs">Proses Cepat</span>
                                <span class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-xs">Jalur Resmi</span>
                                <span class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-xs">Aman & Terpercaya</span>
                            </div>
                            <a href="{{ route('contact') }}" class="text-orange-600 hover:text-orange-700 font-medium">
                                Konsultasi Visa →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why Choose Us -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle">
                    PT Reva Sarif Group memiliki keunggulan yang membedakan kami dari penyedia layanan lainnya
                </p>
            </div>
            
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                <!-- Experience -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-teal-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-award text-3xl text-teal-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Pengalaman Terpercaya</h3>
                    <p class="text-gray-600">
                        Didirikan tahun 2023 dengan tim berpengalaman puluhan tahun di bidang layanan haji dan umroh
                    </p>
                </div>
                
                <!-- Technology -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-laptop text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Teknologi Terintegrasi</h3>
                    <p class="text-gray-600">
                        Sistem informasi modern yang memudahkan proses pendaftaran hingga dokumentasi
                    </p>
                </div>
                
                <!-- Global Presence -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-globe text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Kehadiran Global</h3>
                    <p class="text-gray-600">
                        Operasional di Jakarta dan Mekkah untuk memberikan layanan terbaik kepada jamaah
                    </p>
                </div>
                
                <!-- Transparency -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-eye text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Transparansi Penuh</h3>
                    <p class="text-gray-600">
                        Dokumentasi lengkap dan real-time tracking untuk memastikan kepercayaan jamaah
                    </p>
                </div>
                
                <!-- Customer Service -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-headset text-3xl text-orange-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan 24/7</h3>
                    <p class="text-gray-600">
                        Tim customer service yang siap membantu jamaah kapan saja dibutuhkan
                    </p>
                </div>
                
                <!-- Quality Assurance -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-red-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-3xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Jaminan Kualitas</h3>
                    <p class="text-gray-600">
                        Komitmen terhadap kualitas layanan dengan standar internasional dan sertifikasi resmi
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-3xl p-8 lg:p-12 text-white">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                    Siap Memulai Perjalanan Ibadah?
                </h2>
                <p class="text-xl text-teal-100 mb-8 max-w-2xl mx-auto">
                    Hubungi tim ahli kami untuk konsultasi gratis dan dapatkan informasi lengkap 
                    tentang layanan badal umroh dan layanan lainnya.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('packages') }}" 
                        class="bg-white text-teal-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-xl transition-colors">
                        <i class="fas fa-box mr-2"></i>
                        Lihat Paket Badal
                    </a>
                    <a href="{{ route('contact') }}" 
                        class="border-2 border-white text-white hover:bg-white hover:text-teal-600 font-semibold py-4 px-8 rounded-xl transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection