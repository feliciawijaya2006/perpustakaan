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
        Schema::create('FYP', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('namapenulis');
            $table->year('tahunterbit');
            $table->integer(column: 'doi');
            $table->integer(column: 'jumlahhalaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FYP');
    }
};
