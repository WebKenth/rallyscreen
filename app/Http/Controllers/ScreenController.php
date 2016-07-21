<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Driver;
use App\Vehicle;

class ScreenController extends Controller
{
    public function dashboard()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('dashboard',compact('drivers', 'vehicles'));
    }

    public function map()
    {
        return view('screen.map');
    }
    public function stats()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('screen.stats', compact('drivers','vehicles'));
    }
}
