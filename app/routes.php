<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hr-index');
});


Route::post('/', function()
{

	return View::make('hr-index');
});
*/

Route::get("/",array ('uses' => 'Matrix3DWebController@index'));
Route::post("/",array ('uses' => 'Matrix3DWebController@process'));
