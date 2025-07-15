<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = StockIn::with('product', 'user')->latest()->get();
        return view('dashboard.stock_in.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.stock_in.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'supplier' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();
        StockIn::create($data);

        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil dicatat');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockIn $stockIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockIn $stockIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockIn $stockIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockIn $stockIn)
    {
        //
    }
}
