<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController; // Tambahkan ini
use App\Http\Controllers\Admin\ProductController;

// Halaman utama untuk semua user
Route::get('/', function () {
    return view('pages.home'); // Nanti kita akan buat view ini
})->name('home');

// Route untuk Tamu (Guest)
Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Login
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Route untuk yang sudah Login
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Halaman User (contoh)
    Route::get('/my-orders', function() {
        return 'Ini halaman riwayat pesanan user.';
    })->name('user.orders');
});

// Route Grup untuk Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function() {
        return 'Selamat datang di Dashboard Admin!';
    })->name('dashboard');
    // Route CRUD produk, manajemen order, dll akan ditempatkan di sini
    Route::resource('products', ProductController::class);
});
