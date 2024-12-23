<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->string('name');
            $table->string('store_code');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->string('phone');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
            $table->string('rating')->default('0');
            $table->unsignedBigInteger('store_category_id')->nullable();
            $table->foreign('store_category_id')->references('id')->on('categories')->onDelete('set null');
            $table->smallInteger('have_vegan')->default(0);
            $table->smallInteger('have_not_vegan')->default(0);
            $table->time('open_time');
            $table->time('close_time');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->unsignedBigInteger('branch_id')->nullable();
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
