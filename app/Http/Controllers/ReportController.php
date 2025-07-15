<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function stockInReport(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $query = StockIn::with('product');
        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        $data = $query->get();
        return view('dashboard.reports.stock_in', compact('data'));
    }

    public function stockOutReport(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $query = StockOut::with('product');
        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }

        $data = $query->get();
        return view('dashboard.reports.stock_out', compact('data'));
    }
}
