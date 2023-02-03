<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_lelangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lelang_id')->constrained('lelangs');
            $table->foreignId('tabel_barangs_id')->constrained('tabel_barangs');
            $table->foreignId('users_id')->constrained('users');
            $table->integer('penawaran_harga');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_lelangs');
    }
}
