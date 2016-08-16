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
Route::get('map', 'ScreenController@map');
Route::get('stats/{id?}', 'ScreenController@stats');

Route::get('/', 'ScreenController@dashboard');
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
