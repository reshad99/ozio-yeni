<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ModuleTypeEnum;
use App\Enums\StatusEnum;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', array_column(ModuleTypeEnum::cases(), 'value'));
            $table->enum('status', array_column(StatusEnum::cases(), 'value'));
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
        Schema::dropIfExists('modules');
    }
};