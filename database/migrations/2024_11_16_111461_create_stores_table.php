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

        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->string('name');
            $table->string('store_code');
            $table->bigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->string('phone');
            $table->bigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('device_id')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->enum('status', ["active","inactive"]);
            $table->string('rating')->default('0');
            $table->bigInteger('store_category_id')->nullable();
            $table->foreign('store_category_id')->references('id')->on('store_categories');
            $table->smallInteger('have_vegan')->default(0);
            $table->smallInteger('have_not_vegan')->default(0);
            $table->time('open_time');
            $table->time('close_time');
            $table->bigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones');

            //branch id
            $table->bigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('store_branches');

            $table->timestamps();
            //solf delete
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
