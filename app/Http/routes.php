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


Route::post('/store','UserprofileController@store');
Route::post('/update','UserprofileController@update');
Route::get('/profilelist','UserprofileController@index');
Route::resource('Userprofile','UserprofileController');
Route::get('/adduserprofile','UserprofileController@create');

Route::controllers([
   'auth' => 'Auth\AuthController',
   'password' => 'Auth\PasswordController',
]);
Route::auth();

Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('/','Auth\AuthController@logout');


Route::group(array('prefix' => 'api/v1'), function()
    {	
	Route::resource('Userprofileapi', 'APIController', ['only' => [
		'index','show'
	]]);
  });