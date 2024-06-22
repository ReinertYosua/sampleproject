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
        Schema::create('pendaftaran_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPasien')->references('id')->on('pasien')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('namaDokterPengirim');
            $table->string('fileLampiran');
            $table->date('tanggalDaftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_pemeriksaan');
    }
};
