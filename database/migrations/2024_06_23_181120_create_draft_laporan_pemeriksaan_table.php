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
        Schema::create('draft_laporan_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idKaryawan')->references('id')->on('karyawan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idJenisPemeriksaan')->references('id')->on('jenis_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->longText('laporanNormal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_laporan_pemeriksaan');
    }
};
