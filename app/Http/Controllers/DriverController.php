<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('driver.list',compact('drivers','vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'string',
            'middle_name' => 'string',
            'last_name' => 'string',
            'image' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/driver')
                    ->withErrors($validator)
                    ->withInput();
        }

        $driver = new Driver;

        $driver->first_name = $request->first_name;
        $driver->middle_name = $request->middle_name;
        $driver->last_name = $request->last_name;

        // Image

        $requestFile = $request->file('image');
        $name = time() . '_' . $requestFile->getClientOriginalName();
        if($requestFile->move(public_path().'/images', $name))
        {
            $driver->image = '/images/'.$name;
        }

        $driver->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return back();
    }
    
    public function update_relationship(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->vehicles()->detach();
        if(count($request->vehicle) != 0)
        {
            foreach ($request->vehicle as $vehicle_id)
            {
                $vehicle = Vehicle::findOrFail($vehicle_id);
                $driver->addVehicle($vehicle);
            }
        }

        return back();
    }
    public function change_name(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        switch ($request->type) {
            case 'first_name':
                $driver->first_name = $request->value;
                break;
            case 'middle_name':
                $driver->middle_name = $request->value;
                break;
            case 'last_name':
                $driver->last_name = $request->value;
                break;
        }
        $driver->save();
    }
}
