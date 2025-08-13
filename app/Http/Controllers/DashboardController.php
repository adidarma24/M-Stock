<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StockIn;
use App\Models\StockOut;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data 6 bulan terakhir
        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths(5 - $i)->startOfMonth();
        });

        // Label bulan dalam bahasa Indonesia
        $labels = $months->map(function ($date) {
            $bulan = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ];
            return $bulan[$date->month - 1] . ' ' . $date->year;
        })->toArray();

        // Ambil data StockIn per bulan
        $stockIn = $months->map(function ($date) {
            $start = $date->copy()->startOfMonth();
            $end = $date->copy()->endOfMonth();
            return StockIn::whereBetween('created_at', [$start, $end])->sum('quantity');
        })->toArray();

        // Ambil data StockOut per bulan
        $stockOut = $months->map(function ($date) {
            $start = $date->copy()->startOfMonth();
            $end = $date->copy()->endOfMonth();
            return StockOut::whereBetween('created_at', [$start, $end])->sum('quantity');
        })->toArray();

        // Ambil 5 stok masuk terakhir
        $latestStockIn = StockIn::with('product')->orderByDesc('created_at')->limit(5)->get();

        return view('dashboard.index', compact('stockIn', 'stockOut', 'labels', 'latestStockIn'));
    }
}
