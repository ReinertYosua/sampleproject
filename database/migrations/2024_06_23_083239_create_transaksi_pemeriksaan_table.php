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
        Schema::create('transaksi_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_pemeriksaan')->unique();
            $table->foreignId('idDaftarPemeriksaan')->references('id')->on('pendaftaran_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_pendaftaran_pemeriksaan')->unique();
            $table->foreign('no_pendaftaran_pemeriksaan')->references('no_pendaftaran')->on('pendaftaran_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idKaryawan')->references('id')->on('karyawan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idDokter')->references('id')->on('dokter')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggalPemeriksaan');
            $table->text('diagnosis')->nullable(); 
            $table->text('keteranganDokter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pemeriksaans');
    }
};
