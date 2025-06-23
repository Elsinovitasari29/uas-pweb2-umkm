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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->double('modal');
            $table->string('pemilik', 45);
            $table->string('alamat', 100);
            $table->string('website', 45);
            $table->string('email', 45);
            $table->foreignId('kabkota_id')->constrained('kabkota')->onDelete('cascade');
            $table->integer('rating');
            $table->foreignId('kategori_umkm_id')->constrained('kategori_umkm')->onDelete('cascade');
            $table->foreignId('pembina_id')->constrained('pembina')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
