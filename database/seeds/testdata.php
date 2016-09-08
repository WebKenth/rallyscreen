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
        $user = new \App\User();
        $user->name = "Martin";
        $user->email = "admin@webkenth.dk";
        $user->password = bcrypt('password');
        $user->save();

        $user = new \App\User();
        $user->name = "Frank";
        $user->email = "fs@commotive.com";
        $user->password = bcrypt('password');
        $user->save();

        // Heat
        $heat = new \App\Heat();
        $heat->number = '1';
        $heat->active = 1;
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

        $diims_4 = new \App\Diims();
        $diims_4->name = "Diims 4";
        $diims_4->number = "869606020050351";
        $diims_4->save();

        $diims_5 = new \App\Diims();
        $diims_5->name = "Diims 5";
        $diims_5->number = "869606020051326";
        $diims_5->save();

        $diims_6 = new \App\Diims();
        $diims_6->name = "Diims 6";
        $diims_6->number = "869606020052522";
        $diims_6->save();

        $diims_7 = new \App\Diims();
        $diims_7->name = "Diims 7";
        $diims_7->number = "869606020050153";
        $diims_7->save();

        $diims_8 = new \App\Diims();
        $diims_8->name = "Diims 8";
        $diims_8->number = "869606020051557";
        $diims_8->save();

        $c = 1;
        for ($i = 0; $i < 30; $i++)
        {
            switch ($c)
            {
                case 1:
                    $image = '/images/dansk.png';
                    break;
                case 2:
                    $image = '/images/svensk.png';
                    break;
                case 3:
                    $image = '/images/norsk.png';
                    break;
            }
            $driver = new \App\Driver();

            $driver->first_name = "Kører #" . $i;
            $driver->middle_name = "";
            $driver->last_name = "";
            $driver->image = $image;
            $driver->save();

            if ($c == 3)
            {
                $c = 1;
            }else{
                $c++;
            }
        }

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
        $vehicle->diims_id = $diims_4->number;
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
        $vehicle->diims_id = $diims_4->number;
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
