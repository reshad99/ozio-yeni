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
        Schema::disableForeignKeyConstraints();

        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_type_id');
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
            $table->json('name');
            $table->string('symbol');
            $table->string('conversion');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::ACTIVE->value);
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
        Schema::dropIfExists('units');
    }
};