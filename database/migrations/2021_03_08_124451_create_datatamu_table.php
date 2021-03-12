<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatamu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('room');
            $table->string('arrival_date');
            $table->string('departure_date');
            $table->string('jumlah_orang');
            $table->string('market');
            $table->string('gambar');
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
        Schema::dropIfExists('datatamu');
    }
}
