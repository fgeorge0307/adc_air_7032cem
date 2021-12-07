<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirframesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airframes', function (Blueprint $table) {
            $table->increments('airframe_id');
            $table->text('aircraft_no');
            $table->text('model');
            $table->bigInteger('a_check')->nullable();
            $table->bigInteger('b_check')->nullable();
            $table->bigInteger('c_check')->nullable();
            $table->bigInteger('d_check')->nullable();
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
        Schema::dropIfExists('airframes');
    }
}
