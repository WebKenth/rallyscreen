<?php

namespace App\Http\Controllers;

use App\Driver;
use App\HeatStat;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
            return redirect('/')
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
        $heat_stats = HeatStat::all()->where('heat_id',$heat->id);
        foreach ($heat_stats as $heat_stat)
        {
            $heat_stat->delete();
        }
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
        $heat->save();
        foreach ($heat->drivers as $driver)
        {
            $heat_stat = new HeatStat();
            $heat_stat->heat_id = $heat->id;
            $heat_stat->driver_id = $driver->id;
            $heat_stat->time = "00:00";
            $heat_stat->save();
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
    
    public function relationshipModal($id)
    {
        $heat = Heat::find($id);
        $drivers = $heat->drivers()->get();
        $vehicles = $heat->vehicles()->get();
        return view('heat.modal', compact('heat','drivers','vehicles'))->render();
    }

    public function relationshipCreate(Request $request)
    {
        foreach ($request->drivers as $key => $driver_id)
        {
            $sql = DB::statement("UPDATE driver_heat SET vehicle_id = ".$request->vehicles[$key]." where heat_id = ".$request->heat_id." AND driver_id = ".$driver_id."");
            $sql = DB::statement("UPDATE heat_stats SET vehicle_id = ".$request->vehicles[$key]." where heat_id = ".$request->heat_id." AND driver_id = ".$driver_id."");
        }
        return back();
    }
}
