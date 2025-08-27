<aside id="sidebar" class="fixed top-0 left-0 z-50 w-64 h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white shadow-2xl sidebar-transition transform -translate-x-full md:translate-x-0 custom-scrollbar overflow-y-auto">
        <!-- Header -->
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                            Admin Panel
                        </h1>
                        <p class="text-xs text-gray-400">Management System</p>
                    </div>
                </div>
                <!-- Mobile Close Button -->
                <button id="close-sidebar" class="md:hidden text-white hover:text-gray-300 transition-colors" onclick="toggleSidebar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-6 px-4 space-y-2 pb-6">
            <!-- Dashboard -->
            <div class="mb-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Dashboard</span>
                    @if(request()->routeIs('admin.dashboard'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>
            </div>

            <!-- Management Section -->
            <div class="mb-4">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">
                    Management
                </p>

                <!-- Orders -->
                <a href="{{ route('admin.orders.index') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 mb-2 {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-green-600 to-emerald-600 shadow-lg shadow-green-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.orders.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.orders.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Kelola Order</span>
                    @if(request()->routeIs('admin.orders.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>

                <!-- Packages -->
                <a href="{{ route('admin.packages.index') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 mb-2 {{ request()->routeIs('admin.packages.*') ? 'bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg shadow-purple-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.packages.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.packages.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Kelola Paket</span>
                    @if(request()->routeIs('admin.packages.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>

                <!-- Services -->
                <a href="{{ route('admin.services.index') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 mb-2 {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-orange-600 to-red-600 shadow-lg shadow-orange-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.services.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Kelola Layanan</span>
                    @if(request()->routeIs('admin.services.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 mb-2 {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-indigo-600 to-blue-600 shadow-lg shadow-indigo-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Kelola User</span>
                    @if(request()->routeIs('admin.users.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>

                <!-- Videos -->
                <a href="{{ route('admin.videos.index') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 mb-2 {{ request()->routeIs('admin.videos.*') ? 'bg-gradient-to-r from-pink-600 to-red-600 shadow-lg shadow-pink-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.videos.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.videos.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 6V4a1 1 0 011.447-.894l9.106 4.553A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L10 16a1 1 0 01-1-1z" />
                        </svg>
                    </div>
                    <span class="text-sm">Kelola Video</span>
                    @if(request()->routeIs('admin.videos.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>
            </div>

            <!-- Reports Section -->
            <div class="mb-4">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">
                    Analytics
                </p>

                <a href="{{ route('admin.report') }}"
                    class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-gray-700 hover:bg-opacity-50 hover:translate-x-1 {{ request()->routeIs('admin.reports.*') ? 'bg-gradient-to-r from-teal-600 to-cyan-600 shadow-lg shadow-teal-500/25' : '' }}">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.reports.*') ? 'bg-white bg-opacity-20' : 'bg-gray-700 group-hover:bg-gray-600' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.reports.*') ? 'text-white' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm">Laporan & Analisis</span>
                    @if(request()->routeIs('admin.reports.*'))
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    @endif
                </a>
            </div>

            <!-- Logout -->
            <div class="pt-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="group flex items-center w-full px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 hover:bg-red-600 hover:bg-opacity-20 text-gray-300 hover:text-red-400">
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