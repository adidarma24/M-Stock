@extends('dashboard.layouts.app')
@section('title', 'Laporan Stok Masuk')

@section('content')
    <div class="card shadow-sm p-4">
        <h4 class="mb-4">📥 Laporan Stok Masuk</h4>

        <form method="GET" class="row g-3 align-items-end mb-4">
            <div class="col-md-4">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-filter-circle me-1"></i> Filter
                </button>
                <a href="{{ route('reports.stock-in') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle me-1"></i> Reset
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="text-white" style="background: linear-gradient(90deg, #4e54c8, #8f94fb);">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Petugas</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td><span class="badge bg-success">{{ $item->quantity }}</span></td>
                            <td>{{ $item->supplier }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
