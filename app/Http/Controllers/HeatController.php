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
        $heat->save();

        $heat_vehicle_ids = array();
        foreach ($heat->vehicles()->get() as $vehicle)
        {
            $heat_vehicle_ids[] = $vehicle->id;
        }
        $heat_driver_ids = array();
        foreach ($heat->drivers()->get() as $driver)
        {
            $heat_driver_ids[] = $driver->id;
        }
        if(count($request->vehicles) != 0)
        {
            foreach ($request->vehicles as $vehicle)
            {
                if(!in_array($vehicle,$heat_vehicle_ids))
                {
                    $heat_vehicle_ids[] = $vehicle;
                    $vehicle_obj = Vehicle::find($vehicle);
                    $heat->addVehicle($vehicle_obj);
                }
            }
            $vehicles = array_diff($heat_vehicle_ids,$request->vehicles);
            foreach ($vehicles as $vehicle)
            {
                $heat->vehicles()->detach($vehicle);
            }
        }

        if(count($request->drivers) != 0)
        {
            foreach ($request->drivers as $driver)
            {
                if(!in_array($driver,$heat_driver_ids))
                {
                    $heat_driver_ids[] = $driver;
                    $driver_obj = Driver::find($driver);
                    $heat->addDriver($driver_obj);

                    $heat_stat = new HeatStat();
                    $heat_stat->heat_id = $heat->id;
                    $heat_stat->driver_id = $driver_obj->id;
                    $heat_stat->start_time;
                    $heat_stat->save();
                }
            }
            $drivers = array_diff($heat_driver_ids,$request->drivers);
            foreach ($drivers as $driver)
            {
                $heat->drivers()->detach($driver);
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
    
    public function deactivateVehicle(Request $request)
    {
        $string = '';
        switch ($request->order) {
            case 1:
                $string = 'van_1 = NULL';
                break;
            case 2:
                $string = 'van_2 = NULL';
                break;
            case 3:
                $string = 'van_3 = NULL';
                break;
            case 4:
                $string = 'truck_1 = NULL';
                break;
            case 5:
                $string = 'truck_2 = NULL';
                break;
        }
        if($string != ''){
            $sql = DB::statement("UPDATE heats SET ".$string." where id = ".$request->heat_id);
        }
    }
}
