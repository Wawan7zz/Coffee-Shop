@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
    <p class="mt-2 text-gray-600">Ini adalah halaman dashboard admin SIPKO. Statistik akan ditampilkan di sini nanti.</p>
@endsection
