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


Route::get('/buses','APIController@index');
Route::get('api/get-userlocation','APIController@index');
Route::get('api/get-busstop-list','APIController@getBusStop');
Route::get('api/get-bus-list','APIController@getBusList');
Route::resource('buses','APIController');



Route::controllers([
   'auth' => 'Auth\AuthController',
   'password' => 'Auth\PasswordController',
]);
Route::auth();


Route::get('/home', 'APIController@index');
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('/','Auth\AuthController@logout');