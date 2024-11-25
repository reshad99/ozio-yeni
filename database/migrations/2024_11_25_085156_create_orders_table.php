<?php

use App\Enums\OrderStateEnum;
use App\Enums\PaymentMethodEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->bigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->bigInteger('user_address_id');
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('set null');
            $table->bigInteger('used_coupon_id')->nullable();
            $table->foreign('used_coupon_id')->references('id')->on('coupons')->onDelete('set null');
            $table->bigInteger('courier_id')->nullable();
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('set null');
            $table->decimal('courier_fee', 10, 2)->default(0)->nullable();
            $table->string('courier_cancel_reason')->nullable();
            $table->decimal('tip', 10, 2)->default(0);
            $table->text('notes')->nullable();
            $table->string('pay_reference')->nullable();
            $table->enum('payment_method', array_column(PaymentMethodEnum::cases(), 'value'))->default(PaymentMethodEnum::CASH);
            $table->decimal('mrp', 10, 2);
            $table->decimal('price', 10, 2);
            $table->string('delivery_instruction')->nullable();
            $table->enum('canceled_by', ['user', 'store', 'courier', 'admin'])->nullable();
            $table->enum('state', array_column(OrderStateEnum::cases(), 'value'))->default(OrderStateEnum::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
