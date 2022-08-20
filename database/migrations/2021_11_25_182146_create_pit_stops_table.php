<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pit_stops', function (Blueprint $table) {
            $table->integer('raceId')->primary();
            $table->integer('driverId')->primary();
            $table->integer('stop')->primary();
            $table->integer('lap');
            $table->time('time');
            $table->string('duration', 255)->nullable();
            $table->integer('milliseconds')->nullable();

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
        Schema::dropIfExists('pit_stops');
    }
}
