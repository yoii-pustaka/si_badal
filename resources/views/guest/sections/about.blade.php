@extends('layouts.app')

@section('title', 'Tentang Kami - PT Reva Sarif Group')

@section('description', 'Mengenal lebih dekat PT Reva Sarif Group, perusahaan terpercaya dalam layanan badal umroh dengan visi memberikan pelayanan ibadah terbaik.')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-teal-600 to-teal-700 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
                <p class="text-xl text-teal-100 max-w-3xl mx-auto">
                    Mengenal lebih dekat PT Reva Sarif Group, perusahaan yang berkomitmen 
                    memberikan layanan ibadah haji dan umroh terbaik sejak tahun 2023.
                </p>
            </div>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <div class="inline-flex items-center bg-teal-100 text-teal-800 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        <i class="fas fa-building mr-2"></i>
                        Tentang Perusahaan
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6">
                        PT Reva Sarif Group
                    </h2>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        PT Reva Sarif Group merupakan perusahaan terpercaya yang bergerak di bidang 
                        pelayanan ibadah haji dan umrah. Didirikan oleh Muhammad Sarif pada tahun 2023, 
                        perusahaan ini memiliki dua basis operasional utama di Jakarta (Indonesia) dan 
                        Mekkah (Arab Saudi).
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Fokus utama perusahaan adalah memberikan kemudahan dan kenyamanan kepada jamaah 
                        dalam melaksanakan ibadah secara tenang dan khusyuk, khususnya melalui layanan 
                        badal umroh yang didukung oleh sistem informasi terintegrasi.
                    </p>
                    
                    <!-- Key Stats -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-teal-50 rounded-lg">
                            <div class="text-2xl font-bold text-teal-600">2023</div>
                            <div class="text-sm text-gray-600">Tahun Berdiri</div>
                        </div>
                        <div class="text-center p-4 bg-teal-50 rounded-lg">
                            <div class="text-2xl font-bold text-teal-600">2</div>
                            <div class="text-sm text-gray-600">Basis Operasi</div>
                        </div>
                        <div class="text-center p-4 bg-teal-50 rounded-lg">
                            <div class="text-2xl font-bold text-teal-600">399+</div>
                            <div class="text-sm text-gray-600">Jamaah Dilayani</div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <!-- Company Image Placeholder -->
                    <div class="bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl p-8 text-center">
                        <div class="w-32 h-32 bg-teal-600 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <i class="fas fa-kaaba text-4xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-teal-800 mb-2">
                            "Memberikan pelayanan terbaik dari proses pendaftaran hingga kepulangan jamaah"
                        </h3>
                        <p class="text-teal-600 font-medium">- Muhammad Sarif, Direktur</p>
                    </div>
                    
                    <!-- Floating elements -->
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-orange-200 rounded-full opacity-60"></div>
                    <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-blue-200 rounded-full opacity-60"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">Visi & Misi Perusahaan</h2>
                <p class="section-subtitle">
                    Komitmen kami dalam memberikan layanan ibadah terbaik dengan integritas dan profesionalisme tinggi
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <!-- Vision -->
                <div class="bg-white rounded-2xl p-8 card-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Visi</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Memberikan pelayanan terbaik dari proses pendaftaran hingga kepulangan jamaah 
                        dengan mengutamakan kenyamanan, keamanan, dan kepuasan dalam menjalankan ibadah.
                    </p>
                </div>
                
                <!-- Mission -->
                <div class="bg-white rounded-2xl p-8 card-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-target text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Misi</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-600">Meningkatkan kualitas sumber daya manusia secara berkelanjutan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-600">Menjalin kerja sama strategis dengan berbagai pihak terkait</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-600">Mengutamakan kenyamanan dan keamanan jamaah dalam setiap layanan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-600">Memberikan layanan yang profesional, amanah, dan terpercaya</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Company Values -->
            <div class="text-center mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-8">Nilai-Nilai Perusahaan</h3>
                <div class="grid md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl p-6 card-shadow text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-teal-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-handshake text-2xl text-teal-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Kejujuran & Amanah</h4>
                        <p class="text-sm text-gray-600">Menjalankan setiap aktivitas dengan integritas tinggi</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-award text-2xl text-blue-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Profesionalisme</h4>
                        <p class="text-sm text-gray-600">Memberikan layanan dengan standar kualitas terbaik</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-heart text-2xl text-orange-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Kepedulian</h4>
                        <p class="text-sm text-gray-600">Memahami dan memenuhi kebutuhan setiap jamaah</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow text-center hover:shadow-lg transition-shadow">
                        <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-green-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Kerja Sama Tim</h4>
                        <p class="text-sm text-gray-600">Sinergi untuk mencapai tujuan bersama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Structure -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">Struktur Organisasi</h2>
                <p class="section-subtitle">
                    Tim profesional yang berpengalaman dalam memberikan layanan ibadah haji dan umroh terbaik
                </p>
            </div>
            
            <!-- Leadership Level -->
            <div class="mb-12">
                <h3 class="text-xl font-semibold text-gray-800 text-center mb-8">Pimpinan Perusahaan</h3>
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 bg-teal-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user-tie text-2xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Muhammad Sarif</h4>
                        <p class="text-teal-600 font-medium mb-4">Direktur</p>
                        <p class="text-sm text-gray-600">
                            Pendiri dan pemimpin perusahaan yang berpengalaman dalam industri haji dan umroh
                        </p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 text-center">
                        <div class="w-20 h-20 bg-blue-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user-cog text-2xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-2">Saleh</h4>
                        <p class="text-blue-600 font-medium mb-4">General Manager</p>
                        <p class="text-sm text-gray-600">
                            Mengelola operasional harian dan memastikan kualitas layanan perusahaan
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Divisions -->
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <!-- Operations Division -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-cogs text-2xl text-green-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800">Divisi Operasional</h4>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="font-semibold text-green-800">Salim</div>
                            <div class="text-sm text-gray-600">Operation Manager</div>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="text-center p-3 bg-gray-50 rounded-lg">
                                <div class="text-sm font-medium text-gray-700">Bu Diyah</div>
                                <div class="text-xs text-gray-500">Operation Staff</div>
                            </div>
                            <div class="text-center p-3 bg-gray-50 rounded-lg">
                                <div class="text-sm font-medium text-gray-700">Bu Agis</div>
                                <div class="text-xs text-gray-500">Operation Staff</div>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="text-center p-3 bg-gray-50 rounded-lg">
                                <div class="text-sm font-medium text-gray-700">Pak Muassar</div>
                                <div class="text-xs text-gray-500">Field Staff</div>
                            </div>
                            <div class="text-center p-3 bg-gray-50 rounded-lg">
                                <div class="text-sm font-medium text-gray-700">Pak Miazzar</div>
                                <div class="text-xs text-gray-500">Field Staff</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Marketing Division -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-bullhorn text-2xl text-orange-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800">Divisi Marketing</h4>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="text-center p-4 bg-orange-50 rounded-lg">
                            <div class="font-semibold text-orange-800">Bu Indah</div>
                            <div class="text-sm text-gray-600">Marketing Manager</div>
                        </div>
                        
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <div class="text-sm font-medium text-gray-700">Pak Gilar</div>
                            <div class="text-xs text-gray-500">Marketing Staff</div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-3 bg-orange-50 rounded-lg">
                        <p class="text-xs text-gray-600 text-center">
                            Bertanggung jawab atas promosi dan komunikasi dengan jamaah
                        </p>
                    </div>
                </div>
                
                <!-- Finance Division -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-chart-line text-2xl text-purple-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800">Divisi Keuangan</h4>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                            <div class="font-semibold text-purple-800">Pak Abdullah</div>
                            <div class="text-sm text-gray-600">Finance Manager</div>
                        </div>
                        
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <div class="text-sm font-medium text-gray-700">Pak Yogi</div>
                            <div class="text-xs text-gray-500">Finance Staff</div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-3 bg-purple-50 rounded-lg">
                        <p class="text-xs text-gray-600 text-center">
                            Mengelola keuangan dan administrasi pembayaran jamaah
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Growth Journey -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">Pertumbuhan & Pencapaian</h2>
                <p class="section-subtitle">
                    Perjalanan kami dalam melayani jamaah badal umroh dengan komitmen dan dedikasi tinggi
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Growth Chart -->
                <div class="bg-white rounded-2xl p-8 card-shadow">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                        Tren Jamaah Badal Umroh (2023-2025)
                    </h3>
                    
                    <!-- Visual Chart -->
                    <div class="flex items-end justify-center space-x-8 mb-6" style="height: 200px;">
                        <div class="text-center flex flex-col justify-end">
                            <div class="w-16 bg-teal-500 rounded-t-lg mb-2 flex items-end justify-center text-white text-xs font-bold pb-2" style="height: 107px;">
                                107
                            </div>
                            <div class="font-semibold text-gray-700">2023</div>
                        </div>
                        <div class="text-center flex flex-col justify-end">
                            <div class="w-16 bg-teal-600 rounded-t-lg mb-2 flex items-end justify-center text-white text-xs font-bold pb-2" style="height: 138px;">
                                138
                            </div>
                            <div class="font-semibold text-gray-700">2024</div>
                        </div>
                        <div class="text-center flex flex-col justify-end">
                            <div class="w-16 bg-teal-700 rounded-t-lg mb-2 flex items-end justify-center text-white text-xs font-bold pb-2" style="height: 154px;">
                                154
                            </div>
                            <div class="font-semibold text-gray-700">2025</div>
                            <div class="text-xs text-gray-500">(YTD)</div>
                        </div>
                    </div>
                    
                    <p class="text-center text-gray-600 text-sm">
                        Peningkatan konsisten menunjukkan kepercayaan jamaah terhadap layanan kami
                    </p>
                </div>
                
                <!-- Key Achievements -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl p-6 card-shadow flex items-start">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-trophy text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">399+ Jamaah Dilayani</h4>
                            <p class="text-gray-600 text-sm">
                                Total jamaah yang telah menggunakan layanan badal umroh kami dari tahun 2023-2025
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-video text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">100% Terdokumentasi</h4>
                            <p class="text-gray-600 text-sm">
                                Setiap pelaksanaan badal umroh didokumentasikan dengan video HD/4K dan foto berkualitas
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow flex items-start">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-globe text-purple-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Operasional 2 Negara</h4>
                            <p class="text-gray-600 text-sm">
                                Kehadiran di Jakarta dan Mekkah memungkinkan layanan yang lebih optimal dan responsif
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 card-shadow flex items-start">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-shield-alt text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">Sistem Terintegrasi</h4>
                            <p class="text-gray-600 text-sm">
                                Platform digital modern yang memudahkan jamaah dari pendaftaran hingga dokumentasi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Team Values -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-3xl p-8 lg:p-12 text-white text-center">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                    Komitmen Kami Terhadap Jamaah
                </h2>
                <p class="text-xl text-teal-100 mb-8 max-w-3xl mx-auto">
                    Setiap anggota tim PT Reva Sarif Group berkomitmen untuk memberikan layanan terbaik 
                    dengan menjunjung tinggi nilai-nilai kejujuran, profesionalisme, dan amanah.
                </p>
                
                <div class="grid md:grid-cols-3 gap-8 mb-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-heart text-2xl"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Melayani dengan Hati</h3>
                        <p class="text-teal-100 text-sm">Setiap layanan diberikan dengan sepenuh hati dan ketulusan</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-handshake text-2xl"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Transparansi Penuh</h3>
                        <p class="text-teal-100 text-sm">Keterbukaan informasi dari awal hingga selesai pelaksanaan</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-star text-2xl"></i>
                        </div>
                        <h3 class="font-semibold mb-2">Kualitas Terjamin</h3>
                        <p class="text-teal-100 text-sm">Standar layanan tinggi dengan hasil yang dapat dipertanggungjawabkan</p>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('packages') }}" 
                        class="bg-white text-teal-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-xl transition-colors">
                        <i class="fas fa-box mr-2"></i>
                        Lihat Paket Layanan
                    </a>
                    <a href="{{ route('contact') }}" 
                        class="border-2 border-white text-white hover:bg-white hover:text-teal-600 font-semibold py-3 px-8 rounded-xl transition-colors">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection