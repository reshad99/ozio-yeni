<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->string('name');
            $table->string('store_code');
            $table->bigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->string('phone');
            $table->bigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->bigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
            $table->string('rating')->default('0');
            $table->bigInteger('store_category_id')->nullable();
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onDelete('set null');
            $table->smallInteger('have_vegan')->default(0);
            $table->smallInteger('have_not_vegan')->default(0);
            $table->time('open_time');
            $table->time('close_time');
            $table->bigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->bigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('store_branches')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
