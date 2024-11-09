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
        Schema::create('CD', function (Blueprint $table) {
            $table->id();
            $table->string('judulCD');
            $table->string('namapenerbit');
            $table->string('penciptacd');
            $table->year(column: 'tahunterbit');
            $table->integer(column: 'harga');
            $table->integer(column: 'stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CD');
    }
};
