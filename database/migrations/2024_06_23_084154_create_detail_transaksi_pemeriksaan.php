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
        Schema::create('detail_transaksi_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTransaksiPemeriksaan')->references('id')->on('transaksi_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('idJenisPemeriksaan')->references('id')->on('jenis_pemeriksaan')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->time('jamMulaiAlat');
            $table->time('jamSelesaiAlat');
            $table->string('ruangan');
            $table->text('keteranganRadiografer');
            $table->double('harga', 12, 0); 
            $table->integer('diskon');
            $table->double('hargaTotal', 12, 0); 
            $table->enum('status', ['1','2','3','4','5','6']);
            $table->timestamps();
        });
        //enum (1:Dalam antrian, 2:Ruang Tunggu, 3:Pemeriksaan, 4:Menunggu Hasil, 5:Hasil sudah siap, 6:Hasil sudah dibaca Pasien )
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_pemeriksaan');
    }
};
