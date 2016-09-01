<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
// Map
// Stats
// Dashboard
// 	- Driver -- Resource
// 	- Vehicle -- Resource



Route::auth();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', 'ScreenController@dashboard');
    Route::get('map', 'ScreenController@map');
    Route::get('stats/{id?}', 'ScreenController@stats');
});

Route::resource('diims', 'DiimsController');
Route::get('diims/delete/{id}', 'DiimsController@destroy');

Route::resource('driver', 'DriverController');
Route::post('/driver/{id}/update_relationship','DriverController@update_relationship');
Route::post('/driver/{id}/change_name','DriverController@change_name');
Route::get('/driver/delete/{id}', 'DriverController@destroy');

Route::resource('vehicle', 'VehicleController');
Route::post('vehicle/rename/{id}','VehicleController@rename');
Route::get('vehicle/delete/{id}','VehicleController@destroy');

Route::get('heats', 'HeatController@index');
Route::patch('heats','HeatController@update');
Route::get('heats/delete/{heat}', 'HeatController@destroy');
Route::post('heats/rename/{id}', 'HeatController@rename');
Route::post('heats', 'HeatController@store');


//dashboard

Route::post('/driver/relationship/{id}','HeatController@relationshipModal');
Route::get('/drivers/relationships/add','HeatController@relationshipCreate');


//livescore

Route::post('api/livescore/','ScreenController@getHeatData');

Route::get('api/heat_stats/driver_update/{heat_id}/{driver_id}/{vehicle_id}', 'ScreenController@updateDriverHeatData');
Route::get('api/livescore/getLiveVehicle/{heat_id}/{driver_id}','ScreenController@getActiveDrivers');

Route::post('api/livescore/getLiveVehicle','ScreenController@getLiveVehicle');

Route::post('api/livescore/addDriver', 'ScreenController@addDriver');
Route::post('api/livescore/setActiveHeat', 'ScreenController@setActiveHeat');
Route::post('api/livescore/getLivescoreOrder', 'ScreenController@getLivescoreOrder');
Route::post('api/livescore/switchHeatType', 'ScreenController@switchHeatType');
Route::post('api/livescore/setActiveHeatStatsDriver', 'ScreenController@setActiveHeatStatsDriver');
Route::post('api/livescore/bundleGetLiveVehicle', 'ScreenController@bundleGetLiveVehicle');

Route::post('api/livescore/updateHeatStats','ScreenController@updateHeatStats');
Route::post('api/livescore/updateStartTime','ScreenController@updateStartTime');
Route::post('api/livescore/updateStopTime','ScreenController@updateStopTime');

Route::post('api/livescore/reset_heat_stats', 'ScreenController@resetHeatStats');
Route::post('api/livescore/updateMilestone', 'ScreenController@updateMilestone');
