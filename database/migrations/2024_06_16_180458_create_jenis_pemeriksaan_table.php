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
        Schema::create('jenis_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idModalitas')->references('id')->on('modalitas')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('namaJenisPemeriksaan','100');
            $table->enum('kelompokJenisPemeriksaan', ['CT','MR','XP-R','XP-F','XP-WH','USG']);
            $table->enum('pemakaianKontras', ['ya','tidak']);
            $table->double('harga', 12, 0); 
            $table->bigInteger('lamaPemeriksaan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pemeriksaan');
    }
};
