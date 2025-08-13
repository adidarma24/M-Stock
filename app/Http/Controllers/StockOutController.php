<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Product;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = StockOut::with('product', 'user')->latest()->paginate(10);
        return view('dashboard.stock_out.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.stock_out.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'destination' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        // Optional: validasi apakah stok cukup
        $product = Product::find($data['product_id']);
        if ($data['quantity'] > $product->current_stock) {
            return back()->withErrors(['quantity' => 'Jumlah melebihi stok yang tersedia']);
        }

        StockOut::create($data);
        return redirect()->route('stock-out.index')->with('success', 'Stok keluar berhasil dicatat');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockOut $stockOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockOut $stockOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockOut $stockOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockOut $stockOut)
    {
        //
    }
}
