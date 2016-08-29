<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->boolean('kml')->default(true);
            $table->boolean('active')->default(false);
            $table->integer('truck_1')->unsigned()->nullable();
            $table->integer('truck_2')->unsigned()->nullable();
            $table->integer('truck_3')->unsigned()->nullable();
            $table->integer('van_1')->unsigned()->nullable();
            $table->integer('van_2')->unsigned()->nullable();
            $table->integer('van_3')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('heats');
    }
}
