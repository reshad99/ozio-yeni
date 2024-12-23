<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_product_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('store_product_id');
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
            $table->decimal('stock');
            $table->decimal('price');
            $table->decimal('mrp');
            $table->decimal('min_order_quantity')->nullable();
            $table->decimal('max_order_quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_product_assignments');
    }
};
