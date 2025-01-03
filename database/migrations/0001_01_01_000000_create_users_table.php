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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('country_code');
            $table->string('phone');
            $table->string('bonus_card_no')->nullable();
            $table->string('ref_code')->nullable();
            $table->boolean('want_notification')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['email', 'phone', 'bonus_card_no', 'ref_code', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
