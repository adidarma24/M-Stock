@extends('dashboard.layouts.app')
@section('title', 'Catat Stok Keluar')

@section('content')
    <h2>Catat Stok Keluar</h2>

    <form action="{{ route('stock-out.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} (Stok: {{ $product->current_stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah Keluar</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Tujuan (Opsional)</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination') }}">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan (Opsional)</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Simpan</button>
        <a href="{{ route('stock-out.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
