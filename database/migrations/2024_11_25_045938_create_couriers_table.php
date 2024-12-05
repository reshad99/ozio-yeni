<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->bigInteger('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('email');
            $table->string('password');
            $table->decimal('total_earn', 8, 2)->default(0);
            $table->decimal('not_paid', 8, 2)->default(0);
            $table->decimal('paid', 8, 2)->default(0);
            $table->integer('order_count')->default(0);
            $table->decimal('rating', 8, 2)->default(0);
            $table->decimal('system_rating', 8, 2)->default(0);
            $table->string('device_id')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['email', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
