@extends('layouts.app')
@section('content')
<section class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ffffff\" fill-opacity=\"0.1\"><circle cx=\"30\" cy=\"30\" r=\"2\"/></g></g></svg>)</div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="text-center lg:text-left">
                <div class="mb-6">
                    <span class="inline-block bg-white/10 text-white px-4 py-2 rounded-full text-sm font-medium backdrop-blur-sm">
                        <i class="fas fa-star mr-2"></i>
                        Layanan Badal Umroh Terpercaya
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Wujudkan Ibadah 
                    <span class="text-yellow-300">Badal Umroh</span> 
                    untuk Keluarga
                </h1>
                
                <p class="text-xl text-white/90 mb-8 max-w-2xl">
                    Sistem informasi terintegrasi untuk layanan badal umroh dengan dokumentasi lengkap, 
                    transparansi penuh, dan pelayanan profesional dari PT Reva Sarif Group.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('packages') }}" class="btn-primary inline-flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i>
                        Lihat Paket Badal
                    </a>
                    <a href="{{ route('about') }}" class="btn-secondary inline-flex items-center justify-center">
                        <i class="fas fa-play-circle mr-2"></i>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Statistics -->
                <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-white/20">
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold text-yellow-300">399+</div>
                        <div class="text-sm text-white/80">Jamaah Badal</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold text-yellow-300">100%</div>
                        <div class="text-sm text-white/80">Terdokumentasi</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold text-yellow-300">24/7</div>
                        <div class="text-sm text-white/80">Layanan Support</div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image/Illustration -->
            <div class="relative">
                <div class="relative z-10">
                    <!-- Main Image Placeholder -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 card-shadow">
                        <div class="aspect-video bg-white/5 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-kaaba text-6xl text-white/60"></i>
                        </div>
                        
                        <!-- Features Preview -->
                        <div class="space-y-4">
                            <div class="flex items-center text-white/90">
                                <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <span>Pendaftaran Online Mudah</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-video text-white"></i>
                                </div>
                                <span>Dokumentasi Video Lengkap</span>
                            </div>
                            <div class="flex items-center text-white/90">
                                <div class="w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <span>Transparansi & Keamanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-4 -right-4 w-32 h-32 bg-yellow-300/20 rounded-full blur-xl"></div>
                <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-teal-300/20 rounded-full blur-xl"></div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/50 rounded-full mt-2"></div>
            </div>
        </div>
    </div>
</section>
@endsection