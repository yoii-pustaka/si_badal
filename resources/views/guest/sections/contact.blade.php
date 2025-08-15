@extends('layouts.app')
@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">
                Siap membantu Anda dengan layanan badal umroh terpercaya. 
                Tim kami tersedia 24/7 untuk konsultasi dan bantuan.
            </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <!-- Office Locations -->
                <div class="bg-white rounded-2xl p-8 card-shadow">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-building mr-3 text-teal-600"></i>Kantor Kami
                    </h3>
                    
                    <div class="space-y-6">
                        <!-- Jakarta Office -->
                        <div class="border-l-4 border-teal-500 pl-6">
                            <h4 class="font-semibold text-gray-800 mb-2">Kantor Jakarta</h4>
                            <div class="space-y-2 text-gray-600">
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt mt-1 mr-3 text-teal-500"></i>
                                    <span class="text-sm">Jl. Raya Jakarta Selatan No. 123<br>Jakarta 12345, Indonesia</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone mr-3 text-teal-500"></i>
                                    <span class="text-sm">+62 21-1234-5678</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-3 text-teal-500"></i>
                                    <span class="text-sm">Senin - Jumat: 08:00 - 17:00 WIB</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mekkah Office -->
                        <div class="border-l-4 border-green-500 pl-6">
                            <h4 class="font-semibold text-gray-800 mb-2">Kantor Mekkah</h4>
                            <div class="space-y-2 text-gray-600">
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt mt-1 mr-3 text-green-500"></i>
                                    <span class="text-sm">Al-Masjid Al-Haram District<br>Makkah 24231, Saudi Arabia</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone mr-3 text-green-500"></i>
                                    <span class="text-sm">+966 12-345-6789</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-3 text-green-500"></i>
                                    <span class="text-sm">24/7 Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Methods -->
                <div class="bg-white rounded-2xl p-8 card-shadow">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">
                        <i class="fas fa-comments mr-3 text-teal-600"></i>Cara Menghubungi
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            <div class="w-12 h-12 bg-green-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fab fa-whatsapp text-white text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-2">WhatsApp</h4>
                            <p class="text-green-600 font-medium">+62 812-3456-7890</p>
                            <p class="text-xs text-gray-600 mt-1">Response: &lt; 5 menit</p>
                        </div>
                        
                        <div class="text-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            <div class="w-12 h-12 bg-blue-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-2">Email</h4>
                            <p class="text-blue-600 font-medium">info@revasarifgroup.com</p>
                            <p class="text-xs text-gray-600 mt-1">Response: &lt; 1 jam</p>
                        </div>
                        
                        <div class="text-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                            <div class="w-12 h-12 bg-purple-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fab fa-telegram text-white text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-2">Telegram</h4>
                            <p class="text-purple-600 font-medium">@RevasarifGroup</p>
                            <p class="text-xs text-gray-600 mt-1">Response: &lt; 10 menit</p>
                        </div>
                        
                        <div class="text-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            <div class="w-12 h-12 bg-red-500 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800 mb-2">Telepon</h4>
                            <p class="text-red-600 font-medium">+62 21-1234-5678</p>
                            <p class="text-xs text-gray-600 mt-1">Jam Kerja: 08:00-17:00</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 card-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-paper-plane mr-3 text-teal-600"></i>Kirim Pesan
                </h3>
                
                <form action="" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-1"></i>Nama Lengkap*
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-phone mr-1"></i>Nomor Telepon*
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"
                                placeholder="Contoh: +62 812-3456-7890">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-1"></i>Email*
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors"
                            placeholder="contoh@email.com">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-1"></i>Subjek*
                        </label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors">
                            <option value="">Pilih subjek</option>
                            <option value="badal_umroh">Konsultasi Badal Umroh</option>
                            <option value="pricing">Informasi Harga</option>
                            <option value="documentation">Dokumentasi Video</option>
                            <option value="technical">Bantuan Teknis Sistem</option>
                            <option value="complaint">Keluhan/Saran</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-comment mr-1"></i>Pesan*
                        </label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors resize-none"
                            placeholder="Jelaskan kebutuhan atau pertanyaan Anda..."></textarea>
                    </div>
                    
                    <!-- Privacy Notice -->
                    <div class="flex items-start">
                        <input type="checkbox" id="privacy" name="privacy" required
                            class="mt-1 h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                        <label for="privacy" class="ml-3 text-sm text-gray-600">
                            Saya setuju dengan <a href="{{ route('privacy') }}" class="text-teal-600 hover:underline">kebijakan privasi</a> 
                            dan memahami bahwa data saya akan digunakan untuk memberikan layanan terbaik.*
                        </label>
                    </div>
                    
                    <button type="submit" 
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 transform hover:scale-105">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-12">Pertanyaan Umum</h3>
            
            <div class="max-w-4xl mx-auto" x-data="{ openFaq: null }">
                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="bg-white rounded-lg card-shadow">
                        <button @click="openFaq = openFaq === 1 ? null : 1" 
                            class="w-full text-left p-6 focus:outline-none">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold text-gray-800">Apa itu layanan badal umroh?</h4>
                                <i class="fas fa-chevron-down transition-transform" 
                                   :class="{ 'rotate-180': openFaq === 1 }"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 1" x-transition class="px-6 pb-6">
                            <p class="text-gray-600">
                                Badal umroh adalah layanan dimana seseorang melaksanakan ibadah umroh atas nama orang lain 
                                yang tidak dapat melaksanakannya secara langsung karena keterbatasan fisik atau kondisi tertentu. 
                                Kami menyediakan dokumentasi video lengkap sebagai bukti pelaksanaan.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ 2 -->
                    <div class="bg-white rounded-lg card-shadow">
                        <button @click="openFaq = openFaq === 2 ? null : 2" 
                            class="w-full text-left p-6 focus:outline-none">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold text-gray-800">Bagaimana cara memesan layanan badal umroh?</h4>
                                <i class="fas fa-chevron-down transition-transform" 
                                   :class="{ 'rotate-180': openFaq === 2 }"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 2" x-transition class="px-6 pb-6">
                            <p class="text-gray-600">
                                Anda dapat mendaftar melalui sistem online kami dengan langkah: 
                                1) Registrasi akun, 2) Pilih paket badal umroh, 3) Upload data yang diperlukan, 
                                4) Lakukan pembayaran, 5) Terima konfirmasi dan dokumentasi pelaksanaan.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ 3 -->
                    <div class="bg-white rounded-lg card-shadow">
                        <button @click="openFaq = openFaq === 3 ? null : 3" 
                            class="w-full text-left p-6 focus:outline-none">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold text-gray-800">Berapa lama proses pelaksanaan badal umroh?</h4>
                                <i class="fas fa-chevron-down transition-transform" 
                                   :class="{ 'rotate-180': openFaq === 3 }"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 3" x-transition class="px-6 pb-6">
                            <p class="text-gray-600">
                                Setelah pembayaran dikonfirmasi, pelaksanaan badal umroh biasanya dilakukan dalam 
                                7-14 hari kerja. Anda akan menerima dokumentasi video dan foto dalam 24 jam setelah 
                                pelaksanaan selesai.
                            </p>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="bg-white rounded-lg card-shadow">
                        <button @click="openFaq = openFaq === 4 ? null : 4" 
                            class="w-full text-left p-6 focus:outline-none">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold text-gray-800">Apakah ada garansi untuk layanan ini?</h4>
                                <i class="fas fa-chevron-down transition-transform" 
                                   :class="{ 'rotate-180': openFaq === 4 }"></i>
                            </div>
                        </button>
                        <div x-show="openFaq === 4" x-transition class="px-6 pb-6">
                            <p class="text-gray-600">
                                Ya, kami memberikan garansi dokumentasi lengkap dan transparansi penuh. 
                                Jika ada masalah dalam pelaksanaan, kami akan mengulangi proses tanpa biaya tambahan. 
                                Kepuasan dan kepercayaan Anda adalah prioritas utama kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection