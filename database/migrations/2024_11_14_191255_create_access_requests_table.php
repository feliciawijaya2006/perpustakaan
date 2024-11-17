<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_access_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('access_requests', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // Menyimpan ID User yang mengajukan akses
            $table->string('access_type'); // Jenis akses yang diminta (misalnya 'read', 'write', dll)
            $table->text('reason'); // Alasan pengajuan akses
            $table->enum('status', ['pending', 'approved', 'denied'])->default('pending'); // Status permintaan
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('access_requests');
    }
}

