<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Produk hanya untuk Admin & Staff
    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('stock-in', StockInController::class)->only(['index', 'create', 'store']);
        Route::resource('stock-out', StockOutController::class)->only(['index', 'create', 'store']);
    });

    // Laporan (Admin & Viewer bisa akses)
    Route::middleware('role:admin,viewer')->group(function () {
        Route::get('reports/stock-in', [ReportController::class, 'stockInReport'])->name('reports.stock-in');
        Route::get('reports/stock-out', [ReportController::class, 'stockOutReport'])->name('reports.stock-out');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
