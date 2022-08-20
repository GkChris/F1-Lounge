<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructorResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructor_results', function (Blueprint $table) {
            $table->increments('constructorResultsId');
            $table->integer('raceId');
            $table->integer('constructorId');
            $table->float('points')->nullable();
            $table->string('status', 255)->nullable();

           
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
        Schema::dropIfExists('constructor_results');
    }
}
