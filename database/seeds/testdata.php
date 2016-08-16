<?php

use Illuminate\Database\Seeder;

class testdata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // #1
        $driver = new \App\Driver();

        $driver->first_name = "Morten";
        $driver->middle_name = "Skøtt";
        $driver->last_name = "Gregersen";
        $driver->image = "/images/Morten.png";
        $driver->save();

        // #2
        $driver = new \App\Driver();

        $driver->first_name = "Martin";
        $driver->middle_name = "Kenth";
        $driver->last_name = "Knudsen";
        $driver->image = "/images/Martin.png";
        $driver->save();

        // #3
        $driver = new \App\Driver();

        $driver->first_name = "Kasper";
        $driver->middle_name = "";
        $driver->last_name = "Legarth";
        $driver->image = "/images/KasperLegarth.png";
        $driver->save();

        // #4
        $driver = new \App\Driver();

        $driver->first_name = "Kristoffer";
        $driver->middle_name = "Kjær";
        $driver->last_name = "Nielsen";
        $driver->image = "/images/Kristoffer.png";
        $driver->save();

        // #5
        $driver = new \App\Driver();

        $driver->first_name = "Jeppe";
        $driver->middle_name = "M.";
        $driver->last_name = "Rahbek";
        $driver->image = "/images/Jeppe.png";
        $driver->save();

        // #6
        $driver = new \App\Driver();

        $driver->first_name = "Stig";
        $driver->middle_name = "";
        $driver->last_name = "";
        $driver->image = "/images/Driver.png";
        $driver->save();

        ////////////////////////////////
        // Vehicles

        // Van #1
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Van #1";
        $vehicle->reg_nr = "XS 23 634";
        $vehicle->type = "van";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

        // Van #2
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Van #2";
        $vehicle->reg_nr = "SF 34 677";
        $vehicle->type = "van";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

        // Van #3
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Van #3";
        $vehicle->reg_nr = "KJ 54 234";
        $vehicle->type = "van";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

        // Truck #1
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #1";
        $vehicle->reg_nr = "GS 75 224";
        $vehicle->type = "truck";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

        // Truck #2
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #2";
        $vehicle->reg_nr = "YS 11 355";
        $vehicle->type = "truck";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

        // Truck #3
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #3";
        $vehicle->reg_nr = "LX 21 454";
        $vehicle->type = "truck";
        $vehicle->diims_id = "869606020004341";
        $vehicle->save();

    }
}
