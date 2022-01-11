<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->string('id');
            $table->string('nama');
            $table->integer('kapasitas');
            $table->integer('lantai');
            $table->string('foto_ruang')->nullable();
            $table->integer('status');
            $table->dateTime('creadate');
            $table->dateTime('modidate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangs');
    }
}
