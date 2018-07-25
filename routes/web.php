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
Route::post('/home-employee/login','Welcome@employeeLogin');

Route::group(['middleware' => 'admin'], function() {
    Route::resource('/home','Home');
    Route::post('/home/create','Home@createUser');
    Route::post('/home/update','Home@updateUser');
    Route::get('/home/delete/{id}','Home@deleteUser');
    Route::get('/home/attendance/{id}','Home@attendance');

    Route::resource('/report','Report');
    Route::get('/report/delete/{id}','Report@delete');

    Route::resource('/payroll','Payroll');
    Route::post('/payroll/update','Payroll@update');
    Route::get('/payroll/stubs/{id}','Payroll@showStubs');
    Route::get('/payroll/delete/log/{id}','Payroll@deleteLog');
    Route::get('/payroll/delete/{id}','Payroll@deletePayroll');
});

Route::group(['middleware' => 'employee'], function() {
    Route::resource('/pos','POS');

    Route::resource('/inventory','Inventory');
    Route::post('/inventory/update','Inventory@update');
    Route::post('/inventory/destroy','Inventory@destroy');

    Route::resource('/home-employee','HomeEmployees');
    Route::get('/attendance','HomeEmployees@attendance');

    Route::resource('/invoices','Invoice');
    Route::get('/invoices/delete/{id}','Invoice@delete');
});


