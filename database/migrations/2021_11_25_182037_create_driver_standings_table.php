<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_standings', function (Blueprint $table) {
            $table->increments('driverStandingsId');
            $table->integer('raceId');
            $table->integer('driverId');
            $table->float('points');
            $table->integer('position')->nullable();
            $table->string('positionText', 255)->nullable();
            $table->integer('wins');

            $table->foreign('raceId')->references('raceId')->on('races')->onDelete('cascade');
            $table->foreign('driverId')->references('driverId')->on('drivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_standings');
    }
}
