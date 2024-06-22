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
        Schema::create('dicom', function (Blueprint $table) {
            $table->id();
            $table->string('alamatIP', 100);
            $table->foreign('alamatIP')->references('alamatIP')->on('modalitas')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('netMask', 100);
            $table->enum('layananDICOM', ['MWL','MPPS','query','send','print','store','retrieve']);
            $table->enum('peran', ['SCU','SCP','query','send','print','store','retrieve']);
            $table->string('AET', 100);
            $table->integer('port');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dicom');
    }
};
