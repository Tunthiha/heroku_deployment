<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/types','TypeController@index');
Route::put('/type/update/{id}','EmployeeController@update');
Route::delete('/type/delete/{id}','EmployeeController@destroy');
Route::post('/type/store','TypeController@store');

Route::get('/employee', 'EmployeeController@index');
Route::post('/employee/store','EmployeeController@store');
Route::put('/employee/update/{id}','EmployeeController@update');
Route::delete('/employee/delete/{id}','EmployeeController@destroy');


