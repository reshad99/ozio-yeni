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
        Schema::create('store_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('minimum_order')->nullable();
            $table->decimal('comission', 10, 2)->default(0);
            $table->smallInteger('courier_self_service')->default(0);
            $table->smallInteger('schedule_order')->default(0);
            $table->smallInteger('take_away')->nullable()->default(0);
            $table->smallInteger('free_delivery')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_branches');
    }
};
