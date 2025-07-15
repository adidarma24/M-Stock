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
        // Contoh data statis, bisa diganti dari DB
        // Ambil tanggal 7 hari terakhir
        $dates = collect(range(0, 6))->map(function ($i) {
            return Carbon::now()->subDays(6 - $i)->startOfDay();
        });
        // Label hari dalam bahasa Indonesia
        $labels = $dates->map(function ($date) {
            $days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
            return $days[$date->dayOfWeek];
        })->toArray();

        // Ambil data StockIn per hari
        $stockIn = $dates->map(function ($date) {
            return StockIn::whereDate('created_at', $date)->sum('quantity');
        })->toArray();

        // Ambil data StockOut per hari
        $stockOut = $dates->map(function ($date) {
            return StockOut::whereDate('created_at', $date)->sum('quantity');
        })->toArray();

        return view('dashboard.index', compact('stockIn', 'stockOut', 'labels'));
    }
}
