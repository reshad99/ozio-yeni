<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_product_barcodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_product_id');
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
            $table->string('barcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_product_barcodes');
    }
};
