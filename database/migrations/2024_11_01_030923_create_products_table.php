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
    Schema::create('Book', function (Blueprint $table) {
        $table->id();
        $table->string('judulbuku');
        $table->string('namapenerbit');
        $table->year('tahunterbit');
        $table->integer(column: 'harga');
        $table->integer(column: 'stok');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Book');
    }
};
