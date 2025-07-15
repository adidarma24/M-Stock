<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->text('description');
            $table->string('unit'); //liter, box, dll
            $table->integer('purchase_price'); //harga pembelian
            $table->integer('selling_price')->nullable();
            $table->integer('stock_minimum')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable(); //optional, bisa untuk menyimpan path gambar produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
