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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('idKTP')->unique();
            $table->enum('jenisKelamin', ['pria','wanita']);
            $table->date('tanggalLahir');
            $table->text('alamat');
            $table->string('kota');
            $table->string('noHp');
            $table->string('noTeleponRumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
