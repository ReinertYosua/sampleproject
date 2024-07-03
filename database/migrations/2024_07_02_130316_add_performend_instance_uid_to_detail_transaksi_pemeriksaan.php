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
        Schema::table('detail_transaksi_pemeriksaan', function (Blueprint $table) {
            //
            $table->string('performedInstanceUID')->nullable()->after('idTransaksiPemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksi_pemeriksaan', function (Blueprint $table) {
            //
        });
    }
};
