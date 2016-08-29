<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeatVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heat_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('heat_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            
            $table->foreign('heat_id')
                  ->references('id')
                  ->on('heats')
                  ->onDelete('cascade');

            $table->foreign('vehicle_id')
                  ->references('id')
                  ->on('vehicles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('heat_vehicle');
    }
}
