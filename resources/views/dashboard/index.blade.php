@extends('dashboard.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 mb-4 text-center">
            <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-muted">Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
        </div>
        {{-- <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">5 Stok Masuk Terakhir</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestStockIn as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->product->name ?? '-' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada data stok masuk.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card border-0 shadow rounded-3">
                        <div class="card-body">
                            <h5 class="card-title text-center">Grafik Stok Masuk & Keluar</h5>
                            <canvas id="stockChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow rounded-3">
                        <div class="card-body">
                            <h5 class="card-title text-center">Perbandingan Total Stok</h5>
                            <canvas id="doughnutChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card border-0 shadow rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">5 Stok Masuk Terakhir</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestStockIn as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product->name ?? '-' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data stok masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        // Doughnut Chart untuk perbandingan total Stock In dan Stock Out
        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        const totalStockIn = @json(array_sum($stockIn));
        const totalStockOut = @json(array_sum($stockOut));
        const doughnutChart = new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Total Stock In', 'Total Stock Out'],
                datasets: [{
                    data: [totalStockIn, totalStockOut],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
@endsection
