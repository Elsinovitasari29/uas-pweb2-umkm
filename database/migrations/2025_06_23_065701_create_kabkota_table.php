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
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->double('latitude');
            $table->double('longtitude');
            $table->timestamps();
            $table->foreignId('provinsi_id')->constrained('provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabkota');
    }
};
