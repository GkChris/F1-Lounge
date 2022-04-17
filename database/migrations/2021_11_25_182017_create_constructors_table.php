<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructors', function (Blueprint $table) {
            $table->increments('constructorId');
            $table->string('constructorRef', 255);
            $table->string('name', 255)->unique();
            $table->string('nationality', 255)->nullable();
            $table->string('url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constructors');
    }
}
