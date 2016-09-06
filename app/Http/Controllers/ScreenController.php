<?php

namespace App\Http\Controllers;

use App\HeatStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Driver;
use App\Vehicle;
use App\Heat;

class ScreenController extends Controller
{
    public function dashboard()
    {
        /*
        Heat
        - Kører
            - Tilføj hvad vil kører skal kører i
        - Tilføj Biler ? måske altid de samme?
            - Diims Kontrol
        Give Drivers Permission to Go!
        Show Heat() on screen
         */

        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $heats = Heat::all();
        foreach ($heats as $heat)
        {
            $heat->load('drivers');
            $heat->load('vehicles');
        }
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

        $drivers = $heat->drivers;

        return view('screen.stats', compact('heat','drivers','vehicles'));
    }

    public function getHeatData(Request $request)
    {
        if($request->heat_id)
        {
            $heat = Heat::find($request->heat_id);
        }else
        {
            $heat = Heat::where('active', 1)->get();
            if($heat->first())
            {
                $heat = $heat->first();
            }else{
                $heat = Heat::first();
            }
        }


        $trucks = $heat->vehicles()->where('type','truck')->get();
        $vans = $heat->vehicles()->where('type','van')->get();

        foreach ($vans as $van)
        {
            $van->driver = '';
            $van->heat_stats = '';
        }
        foreach ($trucks as $truck)
        {
            $truck->driver = '';
            $truck->heat_stats = '';
        }

        $truck_drivers = array();
        $van_drivers = array();
        foreach ($heat->drivers as $driver)
        {
            $sql_rows = DB::table('heat_stats')
                ->select('*')
                ->where('heat_id', $heat->id)
                ->where('driver_id',$driver->id)
                ->get();
            foreach ($sql_rows as $row)
            {
                $driver->heat_stats = $row;
            }
            $sql = DB::table('driver_heat')
                ->select('vehicle_id')
                ->where('heat_id', $heat->id)
                ->where('driver_id',$driver->id)
                ->get();
            $vehicle_id = $sql[0]->vehicle_id;
            if($vehicle_id)
            {
                $vehicle = Vehicle::find($vehicle_id);
                if($vehicle->type == "truck")
                {
                    $driver->position = count($truck_drivers);
                    $truck_drivers[] = $driver;
                }
                if($vehicle->type == "van")
                {
                    $driver->position = count($van_drivers);
                    $van_drivers[] = $driver;
                }
            }
        }

        if($heat->van_1)
        {
            $heat->van_1 = HeatStat::find($heat->van_1);
        }
        if($heat->van_2)
        {
            $heat->van_2 = HeatStat::find($heat->van_2);
        }
        if($heat->van_3)
        {
            $heat->van_3 = HeatStat::find($heat->van_3);
        }
        if($heat->truck_1)
        {
            $heat->truck_1 = HeatStat::find($heat->truck_1);
        }
        if($heat->truck_2)
        {
            $heat->truck_2 = HeatStat::find($heat->truck_2);
        }
        if($heat->truck_3)
        {
            $heat->truck_3 = HeatStat::find($heat->truck_3);
        }

        $data = new \stdClass();

        $data->heat = $heat;
        $data->trucks = $trucks;
        $data->vans = $vans;
        $data->truck_drivers = $truck_drivers;
        $data->van_drivers = $van_drivers;

        return json_encode($data);
    }

    public function updateDriverHeatData($heat_id,$driver_id,$vehicle_id)
    {
        $sql = DB::statement("UPDATE heat_stats SET driver_id = ".$driver_id." where heat_id = ".$heat_id." AND vehicle_id = ".$vehicle_id."");
    }

    public function getLiveVehicle(Request $request)
    {
        $data = new \stdClass();
        $sql_rows = DB::table('heat_stats')
                ->select('*')
                ->where('heat_id',$request->heat_id)
                ->where('driver_id',$request->driver_id)
                ->get();
            foreach ($sql_rows as $row)
            {
                $data->heat_stats = $row;
                $vehicle = Vehicle::find($row->vehicle_id);
                $vehicle->driver = Driver::find($row->driver_id);
                $data->vehicle = $vehicle;
            }

        return json_encode($data);
    }

    public function updateMilestone(Request $request)
    {
        $sql = DB::statement("UPDATE heat_stats SET m".$request->milestone."_kml = ".$request->kml." WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }

    public function updateHeatStats(Request $request)
    {
        $sql = DB::statement("UPDATE heat_stats SET distance = ".$request->distance.", fuel_used = ".$request->fuel_used.", kml = ".$request->kml.", rpm = ".$request->rpm.", accelerator = ".$request->accelerator." WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }
    
    public function updateStartTime(Request $request)
    {
        $sql = DB::statement("UPDATE heat_stats SET start_time = ".$request->start_time.", stop_time = NULL WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }

    public function updateStopTime(Request $request)
    {
        $heat_stat = HeatStat::where('heat_id', $request->heat_id)
            ->where('driver_id', $request->driver_id)
            ->where('vehicle_id', $request->vehicle_id)
            ->first();
        $heat_stat->stop_time = $request->stop_time;
        $heat_stat->save();
    }
    
    public function resetHeatStats(Request $request)
    {
        $sql = DB::statement("UPDATE heat_stats SET start_time = NULL, time_lapsed = 0, stop_time = NULL, m1_kml = NULL, m2_kml = NULL, m3_kml = NULL, m4_kml = NULL, m5_kml = NULL, fuel_used = NULL, distance = NULL, kml = NULL, rpm = NULL, accelerator = NULL WHERE heat_id = ".$request->heat_id);
    }

    public function addDriver(Request $request)
    {
//        $heat = Heat::find($request->heat_id)->first();
        $heat = Heat::where('id',$request->heat_id)->first();
        $heat_stat = DB::table('heat_stats')
                ->select('*')
                ->where('heat_id',$request->heat_id)
                ->where('driver_id',$request->driver_id)
                ->where('vehicle_id',$request->vehicle_id)
                ->first();

        switch ($request->order) {
            case 1:
                $heat->van_1 = $heat_stat->id;
                break;
            case 2:
                $heat->van_2 = $heat_stat->id;
                break;
            case 3:
                $heat->van_3 = $heat_stat->id;
                break;
            case 4:
                $heat->truck_1 = $heat_stat->id;
                break;
            case 5:
                $heat->truck_2 = $heat_stat->id;
                break;
            case 6:
                $heat->truck_3 = $heat_stat->id;
                break;
            default:

        }
        $heat->save();

        return $heat_stat->id;
    }
    
    public function setActiveHeat(Request $request)
    {
        $heats = Heat::all();
        foreach ($heats as $item)
        {
            if($item->id == $request->heat_id)
            {
                $item->active = 1;
            }else{
                $item->active = 0;
            }
            $item->save();
        }
    }
    
    public function getLivescoreOrder(Request $request)
    {
        $heat = Heat::find($request->heat_id);
        $heat_stat = HeatStat::where('vehicle_id',$request->vehicle_id)
                             ->where('driver_id', $request->driver_id)
                             ->where('heat_id', $request->heat_id)
                             ->first();
        $order = null;

        switch ($heat_stat->id){
            case $heat->van_1:
                $order = 1;
                break;
            case $heat->van_2:
                $order = 2;
                break;
            case $heat->van_3:
                $order = 3;
                break;
            case $heat->truck_1:
                $order = 4;
                break;
            case $heat->truck_2:
                $order = 5;
                break;
            case $heat->truck_3:
                $order = 6;
                break;
            default:

        }

        return $order;
    }

    public function switchHeatType(Request $request)
    {
        $heat = Heat::find($request->heat_id);
        $heat->kml = !$heat->kml;
        $heat->save();
    }

    public function setActiveHeatStatsDriver(Request $request)
    {
        $heat_stat = DB::table('heat_stats')
                ->select('*')
                ->where('heat_id',$request->heat_id)
                ->where('driver_id',$request->driver_id)
                ->where('vehicle_id',$request->vehicle_id)
                ->first();

        $active = $request->active;
        $sql = DB::statement("UPDATE heat_stats SET active = ". $active ." WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }

    public function bundleGetLiveVehicle(Request $request)
    {
        $result = array();
//        dd($request->all());
        $request_datas = $request->all();
        foreach ($request_datas['data'] as $request_data)
        {
            $data = new \stdClass();
            $sql_rows = DB::table('heat_stats')
                    ->select('*')
                    ->where('heat_id',$request_data['heat_id'])
                    ->where('driver_id',$request_data['driver_id'])
                    ->get();
            foreach ($sql_rows as $row)
            {
                $data->heat_stats = $row;
                $vehicle = Vehicle::find($row->vehicle_id);
                $vehicle->driver = Driver::find($row->driver_id);
                $data->vehicle = $vehicle;
            }
            $data->order = $request_data['order'];
            $data->data = $request_data;
            $result[] = $data;
        }

        return json_encode($result);
    }
}
