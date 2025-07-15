@extends('dashboard.layouts.app')
@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('content')
    <h2>{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h2>
    <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Kode SKU</label>
            <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="unit" class="form-control" value="{{ old('unit', $product->unit ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" step="0.01" name="purchase_price" class="form-control"
                value="{{ old('purchase_price', $product->purchase_price ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" step="0.01" name="selling_price" class="form-control"
                value="{{ old('selling_price', $product->selling_price ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Stok Minimum</label>
            <input type="number" name="stock_minimum" class="form-control"
                value="{{ old('stock_minimum', $product->stock_minimum ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Gambar (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
