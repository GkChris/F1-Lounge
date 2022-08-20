<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualifyingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifying', function (Blueprint $table) {
            $table->increments('qualifyId');
            $table->integer('raceId');
            $table->integer('driverId');
            $table->integer('constructorId');
            $table->integer('number');
            $table->integer('position')->nullable();
            $table->string('q1', 255)->nullable();
            $table->string('q2', 255)->nullable();
            $table->string('q3', 255)->nullable();

            $table->foreign('raceId')->references('raceId')->on('races')->onDelete('cascade');
            $table->foreign('constructorId')->references('constructorId')->on('constructors')->onDelete('cascade');
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
        Schema::dropIfExists('qualifying');
    }
}
