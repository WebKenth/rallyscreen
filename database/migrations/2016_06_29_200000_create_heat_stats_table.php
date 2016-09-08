<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeatStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heat_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('heat_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->boolean('active')->nullable();
            $table->bigInteger('start_time')->nullable();
            $table->bigInteger('stop_time')->nullable();
            $table->string('distance')->nullable();
            $table->string('fuel_used')->nullable();
            $table->string('kml')->nullable();
            $table->string('speed')->nullable();
            $table->string('m1_kml')->nullable();
            $table->string('m2_kml')->nullable();
            $table->string('m3_kml')->nullable();
            $table->string('m4_kml')->nullable();
            $table->string('m5_kml')->nullable();
            $table->string('m1_fuel_used')->nullable();
            $table->string('m2_fuel_used')->nullable();
            $table->string('m3_fuel_used')->nullable();
            $table->string('m4_fuel_used')->nullable();
            $table->string('m5_fuel_used')->nullable();
            $table->string('rpm')->nullable();
            $table->string('accelerator')->nullable();
            $table->string('send_time');
            $table->timestamps();


            $table->foreign('heat_id')
                  ->references('id')
                  ->on('heats')
                  ->onDelete('cascade');

            $table->foreign('driver_id')
                  ->references('id')
                  ->on('drivers')
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
        Schema::drop('heat_stats');
    }
}
