<?php

namespace App\Http\Controllers;

use App\Diims;
use App\Heat;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $heats = Heat::all();
        $diims = Diims::all();
        return view('vehicle.list',compact('vehicles','heats','diims'));
    }
    public function rename(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $vehicle->name = $request->name;
        $vehicle->save();
        return back();
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
            'name' => 'string|required'
        ]);
        if ($validator->fails()) {
            return redirect('/vehicle')
                    ->withErrors($validator)
                    ->withInput();
        }

        $vehicle = New Vehicle();

        $vehicle->name = $request->name;
        $vehicle->brand = $request->brand;
        $vehicle->type = $request->type;
        $vehicle->reg_nr = $request->reg_nr;
        $vehicle->model = $request->model;
        $vehicle->heat = $request->heat;
        $vehicle->diims_id = $request->diims_id;

        $vehicle->save();

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
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return back();
    }
}
