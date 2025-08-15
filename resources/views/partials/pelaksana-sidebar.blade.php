<!-- Sidebar -->
<aside class="w-64 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen shadow-2xl">
    <!-- Header -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                    Pelaksana Panel
                </h1>
                <p class="text-xs text-gray-400">Tugas Badal Umroh</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-6 px-4 space-y-2">
        <!-- Main Tasks Section -->
        <div class="mb-6">
            <a href="{{ route('pelaksana.orders.index') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 {{ request()->routeIs('pelaksana.orders.*') ? 'bg-gradient-to-r from-green-600 to-teal-600 shadow-lg shadow-green-500/25' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('pelaksana.orders.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('pelaksana.orders.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <span class="text-sm">Tugas Saya</span>
                @if(request()->routeIs('pelaksana.orders.*'))
                <div class="ml-auto">
                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                </div>
                @endif
            </a>
        </div>

        <!-- Account Section -->
        <div class="mb-4">
            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">
                Akun
            </p>

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/25' : '' }}">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('profile.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="text-sm">Profil</span>
                @if(request()->routeIs('profile.*'))
                <div class="ml-auto">
                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                </div>
                @endif
            </a>
        </div>

        <!-- Logout Section -->
        <div class="mt-8 pt-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="group flex items-center w-full px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-red-600 hover:bg-opacity-20 hover:translate-x-1 text-gray-300 hover:text-red-300">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-gray-700 group-hover:bg-red-600 group-hover:bg-opacity-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>