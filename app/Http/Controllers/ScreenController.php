<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Driver;
use App\Vehicle;
use App\Heat;

class ScreenController extends Controller
{
    public function dashboard()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $heats = Heat::all();
        return view('dashboard',compact('drivers', 'vehicles', 'heats'));
    }

    public function map()
    {
        return view('screen.map');
    }
    public function stats($id = 1)
    {
        $heat = Heat::find($id);
        $vehicles = $heat->vehicles;
//        $vehicles->load('drivers');
        $drivers = $heat->drivers;
//        $drivers->load('vehicles');
        return view('screen.stats', compact('heat','drivers','vehicles'));
    }
}
