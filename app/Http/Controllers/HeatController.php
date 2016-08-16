<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Heat;

class HeatController extends Controller
{
    public function index()
    {
        $heats = Heat::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('heat.list',compact('heats','drivers','vehicles'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/heats')
                    ->withErrors($validator)
                    ->withInput();
        }
        $heat = new Heat;
        $heat->number = $request->number;
        $heat->save();
        return back();
    }

    public function update(Request $request)
    {
        $heat = Heat::find($request->id);
        $heat->number = $request->number;
        $heat->vehicles()->detach();
        if(count($request->vehicles) != 0)
        {
            foreach ($request->vehicles as $key => $val)
            {
                $vehicle = Vehicle::find($val);
                $heat->addVehicle($vehicle);
            }
        }
        $heat->drivers()->detach();
        if(count($request->drivers) != 0)
        {
            foreach ($request->drivers as $key => $val)
            {
                $driver = Driver::find($val);
                $heat->addDriver($driver);
            }
        }
        return back();
    }

    public function rename(Request $request)
    {
        $heat = Heat::find($request->id);
        $heat->number = $request->number;
        $heat->save();
    }

    public function destroy($id)
    {
        $heat = Heat::find($id);
        $heat->delete();
        return back();
    }
}
