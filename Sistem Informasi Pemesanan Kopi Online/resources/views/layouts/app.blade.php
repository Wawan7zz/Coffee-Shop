<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPKO - @yield('title', 'Sistem Informasi Penjualan Kopi')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- Navbar Sederhana --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
                SIP<span class="text-[#38220f]">KO</span>
            </a>
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#38220f]">Login</a>
                    <a href="{{ route('register') }}" class="bg-[#38220f] text-white px-4 py-2 rounded-md hover:bg-opacity-90 transition">Register</a>
                @endguest
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-[#38220f]">Dashboard</a>
                    @else
                        <a href="{{ route('user.orders') }}" class="text-gray-600 hover:text-[#38220f]">Pesanan Saya</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Konten Utama --}}
    <main class="py-10">
        <div class="container mx-auto px-6">
            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>