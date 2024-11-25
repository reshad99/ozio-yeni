<?php

use App\Enums\UploadTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_product_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('object_key');
            $table->bigInteger('size');
            $table->string('mime_type', '100');
            $table->string('extension', '10');
            $table->string('original_name');
            $table->bigInteger('store_product_id');
            $table->foreign('store_product_id')->references('id')->on('store_products')->onDelete('cascade');
            $table->enum('type', array_column(UploadTypeEnum::cases(), 'value'))->default(UploadTypeEnum::THUMBNAIL->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_product_uploads');
    }
};
