<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;
use App\Enums\ZoneTypeEnum;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->enum('type', array_column(ZoneTypeEnum::cases(), 'value'));
            $table->geometry('coordinates');
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
        Schema::dropIfExists('zones');
    }
};