<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Layanan Badal Umroh - PT Reva Sarif Group')</title>
    <meta name="description" content="@yield('description', 'Layanan badal umroh terpercaya dengan sistem informasi terintegrasi dari PT Reva Sarif Group')">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #0f766e 0%, #14532d 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            @apply bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105;
        }
        .btn-secondary {
            @apply bg-transparent border-2 border-teal-600 text-teal-600 hover:bg-teal-600 hover:text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300;
        }
        .section-title {
            @apply text-3xl md:text-4xl font-bold text-gray-800 text-center mb-4;
        }
        .section-subtitle {
            @apply text-lg text-gray-600 text-center mb-12 max-w-3xl mx-auto;
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    
    <!-- Navigation -->
    @include('guest.partials.navbar')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('guest.partials.footer')
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    
    @stack('scripts')
</body>
</html>