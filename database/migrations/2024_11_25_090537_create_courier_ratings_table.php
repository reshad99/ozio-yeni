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
        Schema::create('courier_ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courier_id');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade');
            $table->bigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('star_count');
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_ratings');
    }
};
