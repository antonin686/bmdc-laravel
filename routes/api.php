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

Route::group(['middleware' => 'ApiAuth'], function () {
    Route::get('/doctor/show/{id}', 'ApiController@doctorShow');
});

Route::get('/prescription/{id}', 'ApiController@prescriptionInfo');
Route::get('/prescription/list/citizen/{id}', 'ApiController@prescriptionListByCitizen');
Route::get('/citizen/show/{id}', 'ApiController@getCitzenInfo');
Route::get('/doctor/show/{id}', 'ApiController@doctorShow');
Route::post('/complain/store', 'ApiController@complainStore');
Route::post('/prescription/store', 'ApiController@prescriptionStore');

//Can access without token
Route::get('/medicine/list', 'ApiController@medicineList');
Route::get('/medicine/{id}', 'ApiController@medicineInfo');

Route::post('/doctor/validate', 'ApiController@validateDoctor');
