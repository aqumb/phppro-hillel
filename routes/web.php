<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('deliverycalculator', 'DeliveryController@index');
Route::get('exchange', 'TestController@index');
Route::get('context', 'ContextController@index');
Route::get('sergeyhomeWorkSolid', 'SergeyHomeWorkSolidController@index');
Route::get('homeWorkSolid', 'HomeWorkSolidController@index');
