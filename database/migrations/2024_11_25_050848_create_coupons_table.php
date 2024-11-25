<?php

use App\Enums\CouponDiscountTypeEnum;
use App\Enums\StatusEnum;
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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('limit');
            $table->string('code');
            $table->enum('discount_type', array_column(CouponDiscountTypeEnum::cases(), 'value'));
            $table->decimal('discount_value');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->enum('status',  array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
            $table->boolean('active_for_first_order')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
