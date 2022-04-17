<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('raceId');
            $table->integer('year');
            $table->integer('round');
            $table->integer('circuitId');
            $table->string('name', 255);
            $table->date('date');
            $table->time('time')->nullable();
            $table->string('url', 255)->nullable()->unique();

            $table->foreign('year')->references('year')->on('seasons')->onDelete('cascade');
            $table->foreign('circuitId')->references('circuitId')->on('circuits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
}
