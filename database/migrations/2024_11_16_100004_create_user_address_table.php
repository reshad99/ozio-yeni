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

        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('phone');
            $table->string('lng');
            $table->string('lat');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('person_name');
            $table->string('floor')->nullable();
            $table->string('road')->nullable();
            $table->string('house')->nullable();
            $table->bigInteger('zone_id')->nullable();
            $table->foreign('zone_id')->references('id')->on('zones');

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
        Schema::dropIfExists('user_address');
    }
};