@extends('dashboard.layouts.app')
@section('title', 'Catat Stok Masuk')

@section('content')
    <h2>Catat Stok Masuk</h2>

    <form action="{{ route('stock-in.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah Masuk</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier (Opsional)</label>
            <input type="text" name="supplier" id="supplier" class="form-control" value="{{ old('supplier') }}">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan (Opsional)</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('stock-in.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
