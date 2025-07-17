@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Produk: {{ $product->name }}</h1>

<div class="bg-white p-8 rounded-lg shadow-md">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" value="{{ old('name', $product->name) }}" required>
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-semibold mb-2">Harga</label>
                    <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" value="{{ old('price', $product->price) }}" required>
                    @error('price')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">{{ old('description', $product->description) }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
            <!-- Kolom Kanan -->
            <div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                    @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    @if($product->image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-32 w-32 object-cover rounded">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">Update Produk</button>
            <a href="{{ route('admin.products.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
@endsection
