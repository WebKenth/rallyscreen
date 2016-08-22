<?php

namespace App\Http\Controllers;

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
//        $vehicles->load('drivers');
        $drivers = $heat->drivers;
//        $drivers->load('vehicles');
        return view('screen.stats', compact('heat','drivers','vehicles'));
    }

    public function getHeatData($heat_id)
    {
        $heat = Heat::find($heat_id);

        $trucks = $heat->vehicles()->where('type','truck')->get();
        $vans = $heat->vehicles()->where('type','van')->get();

        $truck_1 = '';$truck_2 = '';$truck_3 = '';
        $van_1 = '';$van_2 = '';$van_3 = '';

        if($trucks->get(0))
        {
            $truck_1 = $trucks->get(0);
        }
        if($trucks->get(1))
        {
            $truck_2 = $trucks->get(1);
        }
        if($trucks->get(2))
        {
            $truck_3 = $trucks->get(2);
        }
        if($vans->get(0)){
            $van_1 = $vans->get(0);
        }
        if($vans->get(1)){
            $van_1 = $vans->get(1);
        }
        if($vans->get(2)){
            $van_1 = $vans->get(2);
        }

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
                ->where('heat_id',$heat_id)
                ->where('driver_id',$driver->id)
                ->get();
            foreach ($sql_rows as $row)
            {
                $driver->heat_stats = $row;
            }
            $sql = DB::table('driver_heat')
                ->select('vehicle_id')
                ->where('heat_id',$heat_id)
                ->where('driver_id',$driver->id)
                ->get();
            $vehicle_id = $sql[0]->vehicle_id;
            if($vehicle_id)
            {
                $vehicle = Vehicle::find($vehicle_id);
                if($vehicle->type == "truck")
                {
                    $truck_drivers[] = $driver;
                }
                if($vehicle->type == "van")
                {
                    $van_drivers[] = $driver;
                }
            }
        }

        $data = new \stdClass();

        $data->heat = $heat;
        $data->trucks = $trucks;
        $data->vans = $vans;
//        $data->truck_1 = $truck_1;
//        $data->truck_2 = $truck_2;
//        $data->truck_3 = $truck_3;
//        $data->van_1 = $van_1;
//        $data->van_2 = $van_2;
//        $data->van_3 = $van_3;
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
        $sql = DB::statement("UPDATE heat_stats SET start_time = ".$request->start_time." WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }
    public function updateStopTime(Request $request)
    {
        
        $sql = DB::statement("UPDATE heat_stats SET stop_time = ".$request->stop_time." WHERE heat_id = ".$request->heat_id." AND vehicle_id = ".$request->vehicle_id." AND driver_id = ".$request->driver_id);
    }
    
    public function resetHeatStats(Request $request)
    {
        $sql = DB::statement("UPDATE heat_stats SET start_time = NULL, stop_time = NULL, m1_kml = NULL, m2_kml = NULL, m3_kml = NULL, m4_kml = NULL, m5_kml = NULL, fuel_used = NULL, distance = NULL, kml = NULL, rpm = NULL, accelerator = NULL WHERE heat_id = ".$request->heat_id);
    }
}
