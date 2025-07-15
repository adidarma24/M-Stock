<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'name' => $category->name . ' Produk ' . $i,
                    'sku' => strtoupper(Str::random(8)),
                    'category_id' => $category->id,
                    'description' => 'Deskripsi produk ' . $i,
                    'unit' => 'pcs',
                    'purchase_price' => rand(10000, 50000),
                    'selling_price' => rand(60000, 100000),
                    'stock_minimum' => rand(5, 10),
                ]);
            }
        }
    }
}
