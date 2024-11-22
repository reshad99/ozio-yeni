<?php

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
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sms_text_id')->nullable()->constrained()->nullOnDelete();
            $table->text('sms_raw_text')->nullable();
            $table->binary('variables')->nullable();
            $table->string('destination_number', 50);
            $table->string('class');
            $table->binary('trigger_request')->nullable();
            $table->binary('api_response')->nullable();
            $table->boolean('status')->default(0)->comment('0: not sent, 1: sent, 2: failed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_logs');
    }
};
