<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
            <!-- Company Info -->
            <div class="col-span-2 lg:col-span-1">
                <div class="flex items-center mb-6">
                    <img class="h-10 w-auto mr-3" src="{{ asset('images/logo-reva-sarif.png') }}" alt="PT Reva Sarif Group" onerror="this.style.display='none'">
                    <div>
                        <h3 class="text-xl font-bold text-white">Reva Sarif Group</h3>
                        <p class="text-sm text-gray-400">Layanan Badal Umroh</p>
                    </div>
                </div>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Perusahaan terpercaya yang bergerak di bidang pelayanan ibadah haji dan umrah 
                    dengan sistem informasi terintegrasi untuk transparansi dan kemudahan jamaah.
                </p>
                
                <!-- Social Media -->
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <i class="fab fa-facebook-f text-white"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <i class="fab fa-twitter text-white"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <i class="fab fa-instagram text-white"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <i class="fab fa-whatsapp text-white"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-teal-600 transition-colors">
                        <i class="fab fa-youtube text-white"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Menu Utama</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-home mr-2 text-sm"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-info-circle mr-2 text-sm"></i>Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-kaaba mr-2 text-sm"></i>Layanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('packages') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-box mr-2 text-sm"></i>Paket Badal
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-phone mr-2 text-sm"></i>Kontak
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Layanan Kami</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('packages') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-kaaba mr-2 text-sm"></i>Badal Umroh
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-hands-helping mr-2 text-sm"></i>Handling Service
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-bus mr-2 text-sm"></i>Transportasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-hotel mr-2 text-sm"></i>Pemesanan Hotel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-teal-400 transition-colors flex items-center">
                            <i class="fas fa-passport mr-2 text-sm"></i>Pengurusan Visa
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-6">Informasi Kontak</h4>
                
                <!-- Jakarta Office -->
                <div class="mb-6">
                    <h5 class="font-medium text-white mb-2">
                        <i class="fas fa-building mr-2 text-teal-400"></i>Kantor Jakarta
                    </h5>
                    <div class="space-y-2 text-sm">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 text-teal-400 mt-1"></i>
                            <span>Jl. Raya Jakarta Selatan No. 123<br>Jakarta 12345, Indonesia</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone mr-2 text-teal-400"></i>
                            <span>+62 21-1234-5678</span>
                        </p>
                    </div>
                </div>
                
                <!-- Mekkah Office -->
                <div class="mb-6">
                    <h5 class="font-medium text-white mb-2">
                        <i class="fas fa-building mr-2 text-green-400"></i>Kantor Mekkah
                    </h5>
                    <div class="space-y-2 text-sm">
                        <p class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 text-green-400 mt-1"></i>
                            <span>Al-Masjid Al-Haram District<br>Makkah 24231, Saudi Arabia</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone mr-2 text-green-400"></i>
                            <span>+966 12-345-6789</span>
                        </p>
                    </div>
                </div>
                
                <!-- Contact Methods -->
                <div class="space-y-2 text-sm">
                    <p class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-teal-400"></i>
                        <span>info@revasarifgroup.com</span>
                    </p>
                    <p class="flex items-center">
                        <i class="fab fa-whatsapp mr-2 text-green-400"></i>
                        <span>+62 812-3456-7890</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Newsletter Section -->
    <div class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <h4 class="text-lg font-semibold text-white mb-2">Dapatkan Update Terbaru</h4>
                    <p class="text-gray-400">Berlangganan newsletter untuk informasi promo dan layanan terbaru</p>
                </div>
    
            </div>
        </div>
    </div>
    
    <!-- Bottom Footer -->
    <div class="bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    <p>&copy; {{ date('Y') }} PT Reva Sarif Group. All rights reserved.</p>
                </div>
                
                <div class="flex flex-wrap gap-6 text-sm">
                    <a href="" class="text-gray-400 hover:text-teal-400 transition-colors">
                        Kebijakan Privasi
                    </a>
                    <a href="" class="text-gray-400 hover:text-teal-400 transition-colors">
                        Syarat & Ketentuan
                    </a>
                    <a href="" class="text-gray-400 hover:text-teal-400 transition-colors">
                        FAQ
                    </a>
                    <a href="" class="text-gray-400 hover:text-teal-400 transition-colors">
                        Sitemap
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>