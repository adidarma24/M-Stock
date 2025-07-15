@extends('dashboard.layouts.app')
@section('title', 'Stok Keluar')

@section('content')
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">📤 Data Stok Keluar</h4>
            <a href="{{ route('stock-out.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Catat Stok Keluar
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="text-white" style="background: linear-gradient(90deg, #f26b38, #f9a825);">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Tujuan</th>
                        <th>Dicatat Oleh</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td><span class="badge bg-danger">{{ $item->quantity }}</span></td>
                            <td>{{ $item->destination }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data stok keluar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
