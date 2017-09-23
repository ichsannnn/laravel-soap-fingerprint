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

Route::get('/', 'UserDataController@index')->name('index');
Route::get('sinkronisasi', 'UserDataController@sinkronisasi')->name('sinkronisasi');


Route::group(['prefix' => 'fingerprint'], function() {
  Route::get('/', 'FPController@index')->name('fingerprint_index');
  Route::get('create', 'FPController@create')->name('fingerprint_create');
  Route::post('create', 'FPController@store')->name('fingerprint_store');
  Route::get('{id}/edit', 'FPController@edit')->name('fingerprint_edit');
  Route::post('update', 'FPController@update')->name('fingerprint_update');
  Route::get('{id}/delete', 'FPController@delete')->name('fingerprint_delete');
  Route::get('{id}/check-connection', 'FPController@check_connection')->name('fingerprint_check_connection');
  Route::get('{id}/active', 'FPController@active')->name('fingerprint_active');
  Route::get('{id}/deactive', 'FPController@deactive')->name('fingerprint_deactive');
});
