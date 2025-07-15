@extends('dashboard.layouts.app')
@section('title', 'Dashboard')

{{-- @section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-muted">Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
        </div> --}}


{{-- <div class="col-md-4 mb-3">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelola Produk</h5>
                    <p class="card-text">Tambah, edit, dan lihat data produk di gudang.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Stok Masuk</h5>
                    <p class="card-text">Catat barang yang masuk ke gudang.</p>
                    <a href="{{ route('stock-in.index') }}" class="btn btn-success">Kelola Stok Masuk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Stok Keluar</h5>
                    <p class="card-text">Catat barang yang keluar dari gudang.</p>
                    <a href="{{ route('stock-out.index') }}" class="btn btn-warning">Kelola Stok Keluar</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Laporan Stok Masuk</h5>
                    <p class="card-text">Lihat riwayat stok masuk dan ekspor laporan.</p>
                    <a href="{{ route('reports.stock-in') }}" class="btn btn-info text-white">Lihat Laporan Masuk</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Laporan Stok Keluar</h5>
                    <p class="card-text">Lihat riwayat stok keluar dan ekspor laporan.</p>
                    <a href="{{ route('reports.stock-out') }}" class="btn btn-secondary">Lihat Laporan Keluar</a>
                </div>
            </div>
        </div>

    </div>
@endsection --}}
@section('content')
    <div class="container mt-4">
        <h2>Dashboard Stok Barang</h2>
        <canvas id="stockChart" height="100"></canvas>
    </div>
@endsection

@section('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                        label: 'Stock In',
                        data: @json($stockIn),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Stock Out',
                        data: @json($stockOut),
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
