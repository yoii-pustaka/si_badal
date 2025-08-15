@extends('layouts.app')
@section('title', 'Kontak - PT Reva Sarif Group')

@section('description', 'Mengenal lebih dekat PT Reva Sarif Group, perusahaan terpercaya dalam layanan badal umroh dengan visi memberikan pelayanan ibadah terbaik.')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="section-title">Alur Proses Layanan</h2>
            <p class="section-subtitle">
                Sistem informasi terintegrasi yang memudahkan proses pendaftaran hingga 
                dokumentasi pelaksanaan badal umroh dengan transparansi penuh.
            </p>
        </div>
        
        <!-- Before vs After Process -->
        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            <!-- Traditional Process -->
            <div class="bg-red-50 rounded-2xl p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-red-500 rounded-full mx-auto flex items-center justify-center mb-4">
                        <i class="fas fa-times text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Proses Manual (Sebelum)</h3>
                    <p class="text-gray-600 mt-2">Menggunakan WhatsApp dan pencatatan manual</p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Chat via WhatsApp</h4>
                            <p class="text-gray-600 text-sm">Pengguna mengirim data melalui pesan WhatsApp secara manual</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Transfer Manual</h4>
                            <p class="text-gray-600 text-sm">Pembayaran dilakukan secara terpisah tanpa sistem tracking</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Pencatatan Manual</h4>
                            <p class="text-gray-600 text-sm">Data dicatat dalam Excel, rawan kesalahan dan kehilangan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Video via Chat</h4>
                            <p class="text-gray-600 text-sm">Dokumentasi dikirim melalui WhatsApp, sulit dikelola</p>
                        </div>
                    </div>
                </div>
                
                <!-- Problems -->
                <div class="mt-8 p-4 bg-red-100 rounded-lg">
                    <h5 class="font-semibold text-red-800 mb-2">Masalah yang Timbul:</h5>
                    <ul class="text-red-700 text-sm space-y-1">
                        <li>• Rawan kehilangan data</li>
                        <li>• Kurang transparansi</li>
                        <li>• Proses lambat</li>
                        <li>• Dokumentasi tidak terstruktur</li>
                    </ul>
                </div>
            </div>
            
            <!-- Digital Process -->
            <div class="bg-teal-50 rounded-2xl p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-teal-500 rounded-full mx-auto flex items-center justify-center mb-4">
                        <i class="fas fa-check text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Sistem Digital (Setelah)</h3>
                    <p class="text-gray-600 mt-2">Menggunakan sistem informasi terintegrasi</p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Pendaftaran Online</h4>
                            <p class="text-gray-600 text-sm">Form pendaftaran digital dengan validasi otomatis</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Upload Bukti Transfer</h4>
                            <p class="text-gray-600 text-sm">Sistem tracking pembayaran dengan konfirmasi otomatis</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Database Terintegrasi</h4>
                            <p class="text-gray-600 text-sm">Semua data tersimpan aman dengan backup otomatis</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <span class="text-white text-sm font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Video Terdokumentasi</h4>
                            <p class="text-gray-600 text-sm">Upload video langsung ke sistem dengan metadata lengkap</p>
                        </div>
                    </div>
                </div>
                
                <!-- Benefits -->
                <div class="mt-8 p-4 bg-teal-100 rounded-lg">
                    <h5 class="font-semibold text-teal-800 mb-2">Keuntungan Sistem:</h5>
                    <ul class="text-teal-700 text-sm space-y-1">
                        <li>• Data aman dan terstruktur</li>
                        <li>• Transparansi penuh</li>
                        <li>• Proses efisien</li>
                        <li>• Dokumentasi terorganisir</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Digital Process Steps in Detail -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-12">Langkah-langkah Sistem Digital</h3>
            
            <div class="relative">
                <!-- Process Flow -->
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Step 1 -->
                    <div class="relative bg-white rounded-xl p-6 card-shadow text-center">
                        <div class="w-16 h-16 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">1. Registrasi</h4>
                        <p class="text-gray-600 text-sm mb-4">
                            Daftarkan akun dan lengkapi profil dengan data yang valid
                        </p>
                        <div class="space-y-2 text-xs text-gray-500">
                            <div>• Verifikasi email</div>
                            <div>• Data pribadi</div>
                            <div>• Upload KTP</div>
                        </div>
                        
                        <!-- Arrow -->
                        <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                            <i class="fas fa-arrow-right text-gray-300 text-xl"></i>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative bg-white rounded-xl p-6 card-shadow text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-white text-xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">2. Pilih Paket</h4>
                        <p class="text-gray-600 text-sm mb-4">
                            Pilih paket badal umroh sesuai kebutuhan dan budget
                        </p>
                        <div class="space-y-2 text-xs text-gray-500">
                            <div>• Paket ekonomi</div>
                            <div>• Paket standar</div>
                            <div>• Paket premium</div>
                        </div>
                        
                        <!-- Arrow -->
                        <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                            <i class="fas fa-arrow-right text-gray-300 text-xl"></i>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative bg-white rounded-xl p-6 card-shadow text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-credit-card text-white text-xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">3. Pembayaran</h4>
                        <p class="text-gray-600 text-sm mb-4">
                            Transfer pembayaran dan upload bukti untuk verifikasi
                        </p>
                        <div class="space-y-2 text-xs text-gray-500">
                            <div>• Transfer bank</div>
                            <div>• Upload bukti</div>
                            <div>• Verifikasi admin</div>
                        </div>
                        
                        <!-- Arrow -->
                        <div class="hidden md:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                            <i class="fas fa-arrow-right text-gray-300 text-xl"></i>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="relative bg-white rounded-xl p-6 card-shadow text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fas fa-video text-white text-xl"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">4. Dokumentasi</h4>
                        <p class="text-gray-600 text-sm mb-4">
                            Terima video dokumentasi pelaksanaan badal umroh
                        </p>
                        <div class="space-y-2 text-xs text-gray-500">
                            <div>• Video HD</div>
                            <div>• Foto dokumentasi</div>
                            <div>• Sertifikat digital</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- System Features -->
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 rounded-2xl p-8 text-white">
            <h3 class="text-2xl font-bold text-center mb-8">Fitur Unggulan Sistem</h3>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Keamanan Data</h4>
                    <p class="text-teal-100 text-sm">
                        Enkripsi SSL dan backup otomatis untuk melindungi data pribadi jamaah
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Real-time Tracking</h4>
                    <p class="text-teal-100 text-sm">
                        Pantau status pesanan dari pendaftaran hingga selesai pelaksanaan
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <h4 class="font-semibold mb-2">Responsive Design</h4>
                    <p class="text-teal-100 text-sm">
                        Akses mudah dari berbagai perangkat, desktop maupun mobile
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection