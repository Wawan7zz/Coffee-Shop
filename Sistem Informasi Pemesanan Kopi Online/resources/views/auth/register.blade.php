@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Buat Akun Baru</h1>
            <p class="text-center text-gray-500 mb-8">Selamat datang di SIPKO!</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" value="{{ old('name') }}" required>
                    @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" value="{{ old('email') }}" required>
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" required>
                    @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-600 mb-2">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9a87c]" required>
                </div>
                <button type="submit" class="w-full bg-[#38220f] text-white py-3 rounded-lg font-semibold hover:bg-opacity-90 transition duration-300">Register</button>
            </form>
            <p class="text-center text-gray-500 mt-6">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-[#38220f] hover:underline font-semibold">Login di sini</a>
            </p>
        </div>
    </div>
</div>
@endsection