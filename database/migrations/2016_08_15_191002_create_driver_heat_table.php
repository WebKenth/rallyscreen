<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverHeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_heat', function (Blueprint $table) {
            $table->integer('driver_id')->unsigned();
            $table->integer('heat_id')->unsigned();
            $table->integer('vehicle_id')->unsigned()->nullable();
            
            $table->foreign('driver_id')
                  ->references('id')
                  ->on('drivers')
                  ->onDelete('cascade');

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
        Schema::drop('driver_heat');
    }
}
