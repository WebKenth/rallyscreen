<?php

namespace App;

use App\Driver;
use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Heat extends Model
{
    
    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function addVehicle($vehicle)
    {
       return $this->vehicles()->save($vehicle);
    }
    public function addDriver($driver)
    {
       return $this->drivers()->save($driver);
    }

    public function hasVehicle($id)
    {
        $vehicles = $this->vehicles()->get();
        foreach($vehicles as $vehicle)
        {
            if($id == $vehicle->id)
            {
                return true;
            }
        }

        return false;
    }
    public function hasDriver($id)
    {
        $drivers = $this->drivers()->get();
        foreach($drivers as $driver)
        {
            if($id == $driver->id)
            {
                return true;
            }
        }

        return false;
    }
}
