@extends('dashboard.layouts.app')
@section('title', 'Stok Masuk')

@section('content')
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">📥 Data Stok Masuk</h4>
            <a href="{{ route('stock-in.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Catat Stok Masuk
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="text-white" style="background: linear-gradient(90deg, #4e54c8, #8f94fb);">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Dicatat Oleh</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stocks as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td><span class="badge bg-success">{{ $item->quantity }}</span></td>
                            <td>{{ $item->supplier }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data stok masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-center">
                {{ $stocks->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
            <div class="mt-2 text-muted text-center">
                Menampilkan {{ $stocks->firstItem() ?? 0 }} - {{ $stocks->lastItem() ?? 0 }} dari total
                {{ $stocks->total() }} data
            </div>
        </div>
    </div>
@endsection
