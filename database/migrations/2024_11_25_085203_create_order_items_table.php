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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('store_product_assignment_id');
            $table->foreign('store_product_assignment_id')->references('id')->on('store_product_assignments')->onDelete('cascade');
            $table->decimal('quantity');
            $table->decimal('price');
            $table->decimal('total_mrp');
            $table->string('special_request')->nullable();
            $table->boolean('courier_collected')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
