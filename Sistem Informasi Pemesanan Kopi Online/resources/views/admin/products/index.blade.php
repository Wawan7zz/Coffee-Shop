@extends('admin.layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Daftar Produk Kopi</h1>
    <a href="{{ route('admin.products.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
        + Tambah Produk
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                <th class="w-2/12 text-left py-3 px-4 uppercase font-semibold text-sm">Gambar</th>
                <th class="w-4/12 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Produk</th>
                <th class="w-2/12 text-left py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                <th class="w-3/12 text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($products as $product)
            <tr class="border-b">
                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                <td class="py-3 px-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover rounded">
                </td>
                <td class="text-left py-3 px-4 font-semibold">{{ $product->name }}</td>
                <td class="text-left py-3 px-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="text-center py-3 px-4">
                    <div class="flex items-center justify-center space-x-2">
                         <a href="{{ route('admin.products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" /><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" /></svg>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" /></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4">Belum ada data produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">
        {{ $products->links() }}
    </div>
</div>
@endsection