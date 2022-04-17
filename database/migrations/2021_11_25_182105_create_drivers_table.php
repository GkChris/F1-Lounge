<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('driverId');
            $table->string('driverRef', 255);
            $table->integer('number')->nullable();
            $table->string('code', 255)->nullable();
            $table->string('forename', 255);
            $table->string('surname', 255);
            $table->date('dob')->nullable();
            $table->string('nationality', 255)->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
