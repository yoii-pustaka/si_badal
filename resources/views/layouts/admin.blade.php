<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Sistem Badal Umroh')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Sidebar - Fixed Position -->
    @include('partials.admin-sidebar')

    <!-- Main Content Area -->
    <div class="lg:ml-64 min-h-screen transition-all duration-300">
        <!-- Navbar -->
        @include('partials.admin-navbar')

        <!-- Main Content -->
        <main class="p-6">
            @include('partials.flash-messages')
            @yield('content')
        </main>
    </div>

    <!-- Mobile Overlay for Sidebar -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" id="sidebar-overlay"></div>

</body>
</html>