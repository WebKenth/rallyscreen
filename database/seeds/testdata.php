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
        // Heat
        $heat = new \App\Heat();
        $heat->number = '1';
        $heat->save();

        // Diimser
        $diims_1 = new \App\Diims();
        $diims_1->name = "Diims 1";
        $diims_1->number = "869606020004341";
        $diims_1->save();

        $diims_2 = new \App\Diims();
        $diims_2->name = "Diims 2";
        $diims_2->number = "869606020006064";
        $diims_2->save();

        $diims_3 = new \App\Diims();
        $diims_3->name = "Diims 3";
        $diims_3->number = "869606020000950";
        $diims_3->save();

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
        $vehicle->diims_id = $diims_1->number;
        $vehicle->save();

        // Van #2
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Van #2";
        $vehicle->reg_nr = "SF 34 677";
        $vehicle->type = "van";
        $vehicle->diims_id = $diims_2->number;
        $vehicle->save();

        // Van #3
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Van #3";
        $vehicle->reg_nr = "KJ 54 234";
        $vehicle->type = "van";
        $vehicle->diims_id = $diims_3->number;
        $vehicle->save();

        // Truck #1
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #1";
        $vehicle->reg_nr = "GS 75 224";
        $vehicle->type = "truck";
        $vehicle->diims_id = $diims_1->number;
        $vehicle->save();

        // Truck #2
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #2";
        $vehicle->reg_nr = "YS 11 355";
        $vehicle->type = "truck";
        $vehicle->diims_id = $diims_2->number;
        $vehicle->save();

        // Truck #3
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Truck #3";
        $vehicle->reg_nr = "LX 21 454";
        $vehicle->type = "truck";
        $vehicle->diims_id = $diims_3->number;
        $vehicle->save();


        // Transporter
        $vehicle = new \App\Vehicle();

        $vehicle->name = "Transporter";
        $vehicle->reg_nr = "AP 62 019";
        $vehicle->type = "truck";
        $vehicle->model = "T5";
        $vehicle->diims_id = $diims_3->number;
        $vehicle->save();

    }
}
