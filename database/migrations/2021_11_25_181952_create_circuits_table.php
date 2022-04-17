<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircuitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->increments('circuitId');
            $table->string('circuitRef', 255);
            $table->string('name', 255);
            $table->string('location', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->integer('alt')->nullable();
            $table->string('url', 255)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuits');
    }
}
