<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;

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
        foreach($vehicles as $vehicle)
        {
            if($id == $vehicle->id)
            {
                return true;
            }
        }

        return false;
    }
}
