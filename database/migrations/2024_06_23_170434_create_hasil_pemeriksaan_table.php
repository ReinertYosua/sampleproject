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
        Schema::create('hasil_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTransaksiPemeriksaan')->references('id')->on('transaksi_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_transaksi_pemeriksaan')->unique();
            $table->foreign('no_transaksi_pemeriksaan')->references('no_transaksi_pemeriksaan')->on('transaksi_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idKaryawan')->references('id')->on('karyawan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idDokter')->references('id')->on('dokter')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pemeriksaan');
    }
};
