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
Route::get('stats', 'ScreenController@stats');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'ScreenController@dashboard');
	Route::resource('driver', 'DriverController');
	Route::post('/driver/{id}/update_relationship','DriverController@update_relationship');
	Route::post('/driver/{id}/change_name','DriverController@change_name');
	Route::resource('vehicle', 'VehicleController');
});

Route::get('/hejsa', function(){
	return view('kasper.hej');
});