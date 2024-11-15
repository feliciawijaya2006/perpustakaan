<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_requests', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');      // Nama siswa yang meminta akses
            $table->string('material_type');     // Jenis materi yang diminta (Buku, Jurnal, FYP, dsb.)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');  // Status permintaan
            $table->timestamps();               // Timestamps: created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_requests');
    }
}
