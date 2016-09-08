<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Driver extends Model
{
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function addVehicle($vehicle)
    {
        return $this->vehicles()->save($vehicle);
    }

    public function hasVehicle($id)
    {
        $vehicles = $this->vehicles()->get();
        foreach ($vehicles as $vehicle)
        {
            if ($id == $vehicle->id)
            {
                return true;
            }
        }

        return false;
    }

    public function getHeatStats($heat_id)
    {
        $heat_stat = HeatStat::where('heat_id', $heat_id)->where('driver_id',$this->id)->first();
//        dd($heat_stat);
        return $heat_stat;
    }

    public function getHeatVehicle($heat_id)
    {
        $sql = DB::table('driver_heat')
            ->select('vehicle_id')
            ->where('heat_id','=', $heat_id)
            ->where('driver_id','=', $this->id)
            ->get();
        $vehicle = Vehicle::find($sql[0]->vehicle_id);
        if($vehicle)
        {
            return $vehicle;
        }
        return false;
    }

    public function hasVehicleInHeat($heat_id,$driver_id,$vehicle_id)
    {
        $sql = DB::table('driver_heat')
            ->where('heat_id','=', $heat_id)
            ->Where('driver_id','=', $driver_id)
            ->Where('vehicle_id', '=', $vehicle_id)
            ->get();
        if($sql)
        {
            return true;
        }
        return false;
    }

    public function getHeatVehicleId($heat_id)
    {
        $sql = DB::table('driver_heat')
            ->select('vehicle_id')
            ->where('heat_id','=', $heat_id)
            ->where('driver_id','=', $this->id)
            ->get();
        $vehicle = Vehicle::find($sql[0]->vehicle_id);
        if($vehicle)
        {
            return $vehicle->id;
        }
        return null;
    }
}
