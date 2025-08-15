<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img class="h-10 w-auto" src="{{ asset('images/logo-reva-sarif.png') }}" alt="PT Reva Sarif Group" onerror="this.style.display='none'">
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-teal-600">Reva Sarif Group</h1>
                        <p class="text-xs text-gray-500">Layanan Badal Umroh</p>
                    </div>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">
                        <i class="fas fa-kaaba mr-1"></i> Layanan
                    </a>
                    <a href="{{ route('packages') }}" class="nav-link {{ request()->routeIs('packages') ? 'active' : '' }}">
                        <i class="fas fa-box mr-1"></i> Paket
                    </a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <i class="fas fa-info-circle mr-1"></i> Tentang Kami
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <i class="fas fa-phone mr-1"></i> Kontak
                    </a>
                </div>
            </div>
            
            <!-- Auth Buttons -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium mr-2">
                            <i class="fas fa-sign-in-alt mr-1"></i> Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            <i class="fas fa-user-plus mr-1"></i> Daftar
                        </a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-600 hover:text-teal-600">
                                <i class="fas fa-user-circle mr-2"></i>
                                {{ Auth::user()->name }}
                                <i class="fas fa-chevron-down ml-1"></i>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-edit mr-2"></i> Profil
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-600 hover:text-teal-600 focus:outline-none">
                    <i x-show="!open" class="fas fa-bars text-xl"></i>
                    <i x-show="open" class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation Menu -->
    <div x-show="open" x-transition class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
            <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fas fa-home mr-2"></i> Beranda
            </a>
            <a href="{{ route('services') }}" class="mobile-nav-link {{ request()->routeIs('services') ? 'active' : '' }}">
                <i class="fas fa-kaaba mr-2"></i> Layanan
            </a>
            <a href="{{ route('packages') }}" class="mobile-nav-link {{ request()->routeIs('packages') ? 'active' : '' }}">
                <i class="fas fa-box mr-2"></i> Paket
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="fas fa-info-circle mr-2"></i> Tentang Kami
            </a>
            <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                <i class="fas fa-phone mr-2"></i> Kontak
            </a>
            
            <div class="border-t pt-4">
                @guest
                    <a href="{{ route('login') }}" class="mobile-nav-link">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </a>
                    <a href="{{ route('register') }}" class="mobile-nav-link">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="mobile-nav-link">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                        <i class="fas fa-user-edit mr-2"></i> Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left mobile-nav-link">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        @apply text-gray-600 hover:text-teal-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
    }
    
    .nav-link.active {
        @apply text-teal-600 bg-teal-50;
    }
    
    .mobile-nav-link {
        @apply text-gray-600 hover:text-teal-600 hover:bg-gray-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200;
    }
    
    .mobile-nav-link.active {
        @apply text-teal-600 bg-teal-50;
    }
</style>