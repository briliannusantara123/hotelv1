<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationdiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservationdiary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('rsv_date');
            $table->string('name');
            $table->text('adress');
            $table->string('phone');
            $table->string('name_guest');
            $table->string('person_guest');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('room_night');
            $table->string('room_no');
            $table->string('remarks');
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
        Schema::dropIfExists('reservationdiary');
    }
}
