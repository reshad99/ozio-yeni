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
        Schema::create('system_courier_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courier_id');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade');
            $table->decimal('star_count', 2, 1);
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_courier_ratings');
    }
};
