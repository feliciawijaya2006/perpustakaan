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
        Schema::create('fyps', function (Blueprint $table) {
            $table->id();
            $table->string('judulfyp');
            $table->string('namapenulis');
            $table->year(column: 'tahunterbit');
            $table->integer(column: 'jumlahhalaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fyps');
    }
};
