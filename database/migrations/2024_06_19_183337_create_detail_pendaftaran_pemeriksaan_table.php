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
        Schema::create('detail_pendaftaran_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idDaftarPemeriksaan')->references('id')->on('pendaftaran_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idJenisPemeriksaan')->references('id')->on('jenis_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->time('jamMulai');
            $table->time('jamSelesai');
            $table->enum('statusKetersediaan', ['ya','tidak']);
            $table->text('keterangan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pendaftaran_pemeriksaan');
    }
};
