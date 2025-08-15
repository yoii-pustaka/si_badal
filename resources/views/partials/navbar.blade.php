<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-lg font-bold">Badal Umroh</a>
        <div class="space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
            @endauth
        </div>
    </div>
</nav>
