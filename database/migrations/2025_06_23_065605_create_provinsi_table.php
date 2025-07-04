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
                Schema::create('provinsi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('ibukota', 45);
            $table->double('latitude');
            $table->double('longtitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinsi');
    }
};
