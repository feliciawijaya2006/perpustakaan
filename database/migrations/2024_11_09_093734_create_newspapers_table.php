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
        Schema::create('Newspapers', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalterbit');
            $table->string('namapenerbit');
            $table->integer('harga');
            $table->integer(column: 'stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Newspapers');
    }
};
