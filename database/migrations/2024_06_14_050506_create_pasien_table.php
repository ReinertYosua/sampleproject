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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idUser')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->bigInteger('noIdentitas')->unique();
            $table->enum('tipeIdentitas', ['KTP','Paspor', 'SIM']);
            $table->enum('jenisKelamin', ['pria','wanita']);
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('kota');
            $table->enum('statusPerkawinan', ['belumkawin','kawin','ceraihidup','ceraimati']);
            $table->enum('agama', ['kristen','katholik','islam','hindu','budha']);
            $table->string('noTeleponRumah');
            $table->string('noHp');
            $table->string('namaKontakDarurat');
            $table->string('noKontakDarurat');
            $table->string('kewarganegaraan');
            $table->text('alergi');
            $table->enum('golonganDarah', ['A+','B+','AB+','O+','A-','B-','AB-','O-']);
            $table->integer('tinggiBadan');
            $table->integer('beratBadan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
