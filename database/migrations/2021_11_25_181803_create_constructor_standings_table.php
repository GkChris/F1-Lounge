<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructorStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructor_standings', function (Blueprint $table) {
            $table->increments('constructorStandingsId');
            $table->integer('raceId');
            $table->integer('constructorId');
            $table->float('points');
            $table->integer('position')->nullable();
            $table->string('positionText', 255)->nullable();
            $table->integer('wins');
            
            $table->foreign('raceId')->references('raceId')->on('races')->onDelete('cascade');
            $table->foreign('constructorId')->references('constructorId')->on('constructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constructor_standings');
    }
}
