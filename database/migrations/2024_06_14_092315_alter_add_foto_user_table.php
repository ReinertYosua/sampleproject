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
        Schema::table('pasien', function (Blueprint $table) {
            $table->string('filefoto')->nullable()->after('beratBadan'); // Sesuaikan dengan kolom yang ada
        });

        Schema::table('karyawan', function (Blueprint $table) {
            $table->string('filefoto')->nullable()->after('noTeleponRumah'); // Sesuaikan dengan kolom yang ada
        });

        Schema::table('dokter', function (Blueprint $table) {
            $table->string('filefoto')->nullable()->after('noTeleponRumah'); // Sesuaikan dengan kolom yang ada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            $table->dropColumn('filefoto');
        });
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropColumn('filefoto');
        });
        Schema::table('dokter', function (Blueprint $table) {
            $table->dropColumn('filefoto');
        });
    }
};
