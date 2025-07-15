<?php

namespace Database\Seeders;

use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $user = User::first();

        foreach ($products as $product) {
            $createdAt = now()->subDays(rand(0, 30));

            StockIn::create([
                'product_id' => $product->id,
                'quantity' => rand(10, 50),
                'supplier' => 'Supplier A',
                'notes' => 'Barang masuk awal',
                'user_id' => $user->id,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            $stockOutCreatedAt = $createdAt->copy()->addDays(rand(0, 5));

            StockOut::create([
                'product_id' => $product->id,
                'quantity' => rand(1, 5),
                'destination' => 'Departemen A',
                'notes' => 'Pemakaian internal',
                'user_id' => $user->id,
                'created_at' => $stockOutCreatedAt,
                'updated_at' => $stockOutCreatedAt,
            ]);
        }
    }
}
