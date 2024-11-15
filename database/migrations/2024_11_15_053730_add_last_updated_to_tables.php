<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastUpdatedToTables extends Migration
{
    public function up()
    {
        // Tambahkan kolom last_updated ke tabel books
        Schema::table('books', function (Blueprint $table) {
            $table->timestamp('last_updated')->nullable();
        });

        // Tambahkan kolom last_updated ke tabel journals
        Schema::table('journals', function (Blueprint $table) {
            $table->timestamp('last_updated')->nullable();
        });

        // Tambahkan kolom last_updated ke tabel cds
        Schema::table('cds', function (Blueprint $table) {
            $table->timestamp('last_updated')->nullable();
        });

        // Tambahkan kolom last_updated ke tabel fyps
        Schema::table('fyps', function (Blueprint $table) {
            $table->timestamp('last_updated')->nullable();
        });

        // Tambahkan kolom last_updated ke tabel newspapers
        Schema::table('newspapers', function (Blueprint $table) {
            $table->timestamp('last_updated')->nullable();
        });
    }

    public function down()
    {
        // Hapus kolom last_updated jika rollback
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('last_updated');
        });

        Schema::table('journals', function (Blueprint $table) {
            $table->dropColumn('last_updated');
        });

        Schema::table('cds', function (Blueprint $table) {
            $table->dropColumn('last_updated');
        });

        Schema::table('fyps', function (Blueprint $table) {
            $table->dropColumn('last_updated');
        });

        Schema::table('newspapers', function (Blueprint $table) {
            $table->dropColumn('last_updated');
        });
    }
}
