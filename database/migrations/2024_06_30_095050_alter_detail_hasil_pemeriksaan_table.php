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
        Schema::table('detail_hasil_pemeriksaan', function (Blueprint $table) {
            $table->time('jamMulaiAlat')->after('laporan');
            $table->time('jamSelesaiAlat')->after('jamMulaiAlat');
            $table->string('ruangan')->after('jamSelesaiAlat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
