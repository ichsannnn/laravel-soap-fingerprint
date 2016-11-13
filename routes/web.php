<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'UserDataController@index');
Route::get('view', 'UserDataController@view');


Route::group(['prefix' => 'setting'], function() {
  Route::get('fingerprint', 'FPController@getView');
  Route::post('fingerprint', 'FPController@postFP');
});
