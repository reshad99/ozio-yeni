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
        Schema::disableForeignKeyConstraints();

        Schema::create('store_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->smallInteger('priorty')->default(0);
            //solft delete
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_categories');
    }
};
