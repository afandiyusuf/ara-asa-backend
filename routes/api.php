<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('group','Api\Group@getAll');

Route::prefix('assigner')->group(function(){
	Route::post('create','Api\AssignerController@create');
	Route::post('update','Api\AssignerController@update');
});

Route::prefix('soal')->group(function(){
	Route::post('get','Api\AssignerController@getAll');
});