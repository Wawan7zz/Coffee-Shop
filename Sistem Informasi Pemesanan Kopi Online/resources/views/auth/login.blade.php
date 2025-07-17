@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Selamat Datang Kembali</h1>
            <p class="text-center text-gray-500 mb-8">Login untuk melanjutkan pesananmu.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" required>
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" required>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#38220f] focus:ring-[#c9a87c] border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                    </div>
                </div>
                <button type="submit" class="w-full bg-[#38220f] text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition duration-300">Login</button>
            </form>
             <p class="text-center text-gray-500 mt-6">
                Belum punya akun? <a href="{{ route('register') }}" class="text-[#38220f] hover:underline font-semibold">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection