<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->enum('status', [""]);
            $table->enum('featured', [""]);
            $table->smallInteger('priorty');
            $table->bigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            // $table->bigInteger('parent_id');
            // $table->foreign('parent_id')->references('id')->on('categories');
            $table->nestedSet();

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
        Schema::dropIfExists('categories');
    }
};
