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
        Schema::create('modalitas', function (Blueprint $table) {
            $table->id();
            $table->string('namaModalitas', 100);
            $table->enum('jenisModalitas', ['ctscan','radiografi','fluoroskopi','angiografi','mamografi','usg','mri']);
            $table->string('merekModalitas', 100);
            $table->string('tipeModalitas', 100);
            $table->string('nomorSeriModalitas', 100);
            $table->string('alamatIP', 100)->unique();
            $table->string('kodeRuang', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modalitas');
    }
};
