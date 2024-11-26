<?php

use App\Enums\StatusEnum;
use App\Enums\TaxTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('material_code');
            $table->json('description');
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('store_categories')->onDelete('cascade');
            $table->integer('order_count')->default(0);
            $table->decimal('tax');
            $table->enum('tax_type', array_column(TaxTypeEnum::cases(), 'value'))->default(TaxTypeEnum::PERCENTAGE->value);
            $table->decimal('tax_percent');
            $table->bigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('store_units');
            $table->string('rating')->default(0);
            $table->boolean('is_recommended');
            $table->boolean('is_organic');
            $table->boolean('is_halal');
            $table->boolean('is_vegan');
            $table->boolean('is_popular_item');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
