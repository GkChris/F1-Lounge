<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('resultId');
            $table->integer('raceId');
            $table->integer('driverId');
            $table->integer('constructorId');
            $table->integer('number')->nullable();
            $table->integer('grid');
            $table->integer('position')->nullable();          
            $table->string('positionText', 255);
            $table->integer('positionOrder');
            $table->float('points');
            $table->integer('laps');
            $table->string('time', 255)->nullable();
            $table->integer('milliseconds')->nullable();
            $table->integer('fastestLap')->nullable();
            $table->integer('rank')->nullable();
            $table->string('fastestLapTime', 255)->nullable();
            $table->string('fastestLapSpeed', 255)->nullable();
            $table->integer('statusId');

            $table->foreign('raceId')->references('raceId')->on('races')->onDelete('cascade');
            $table->foreign('driverId')->references('driverId')->on('drivers')->onDelete('cascade');
            $table->foreign('constructorId')->references('constructorId')->on('constructors')->onDelete('cascade');
            $table->foreign('statusId')->references('statusId')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
