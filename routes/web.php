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
Auth::routes();
Route::resource('/', 'Welcome');
Route::resource('/home','Home');
Route::post('/home/create','Home@createUser');
Route::resource('/pos','POS');
Route::resource('/inventory','Inventory');
Route::post('/inventory/update','Inventory@update');
Route::post('/inventory/destroy','Inventory@destroy');

