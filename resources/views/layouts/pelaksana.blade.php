<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelaksana - SI Badal Umroh</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">
        @include('partials.pelaksana-sidebar')
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold">@yield('title', 'Dashboard Pelaksana')</h2>
                <span class="text-sm text-gray-500">Halo, {{ auth()->user()->name }}</span>
            </header>

            <!-- Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>
