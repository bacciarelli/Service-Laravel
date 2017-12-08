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

Route::resource('brands', 'Admin\BrandController');
Route::resource('clients', 'Admin\ClientController');
Route::resource('complaints', 'Admin\ComplaintController');
Route::resource('device-models', 'Admin\DeviceModelController');
Route::resource('types', 'Admin\TypeController');
