<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UploadTypeEnum;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('object_key');
            $table->bigInteger('size');
            $table->string('mime_type', '100');
            $table->string('extension', '10');
            $table->string('original_name');
            $table->bigInteger('uploadable_id');
            $table->nullableMorphs('uploadable');
            $table->enum('type', array_column(UploadTypeEnum::cases(), 'value'))->default(UploadTypeEnum::THUMBNAIL->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
    }
}
