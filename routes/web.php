<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('group', 'Admin\GroupCrudController');
  	CRUD::resource('assigner', 'Admin\AssignerCrudController');
  	CRUD::resource('assigner_data','Admin\Assigner_dataCrudController');

  	Route::get('/group/toogle_active/{group}', 'Admin\GroupCrudController@toogle_active');
  // [...] other routes
});
