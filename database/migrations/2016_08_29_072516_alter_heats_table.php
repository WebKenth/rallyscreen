<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heats', function (Blueprint $table) {
//            $table->foreign('truck_1')
//                  ->references('id')
//                  ->on('heat_stats');
//
//            $table->foreign('truck_2')
//                  ->references('id')
//                  ->on('heat_stats');
//
//            $table->foreign('truck_3')
//                  ->references('id')
//                  ->on('heat_stats');
//
//            $table->foreign('van_1')
//                  ->references('id')
//                  ->on('heat_stats');
//
//            $table->foreign('van_2')
//                  ->references('id')
//                  ->on('heat_stats');
//
//            $table->foreign('van_3')
//                  ->references('id')
//                  ->on('heat_stats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('heats', function (Blueprint $table) {
            //
        });
    }
}
