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
    Route::get('/doctor/list', 'ApiController@doctorList'); //changed to list from index
    Route::get('/doctor/index', 'ApiController@doctorIndex');
    Route::post('/doctor/modify/store', 'DoctorModifyController@store');
    Route::post('/doctor/password/change', 'DoctorController@passwordChange');

    Route::get('/prescription/{id}', 'ApiController@prescriptionInfo');
    Route::get('/prescription/list/citizen/{id}', 'ApiController@prescriptionListByCitizen');
    Route::post('/prescription/store', 'ApiController@prescriptionStore');

    Route::get('/citizen/show/{id}', 'ApiController@getCitzenInfo');

    Route::get('/medicine/list/{date}', 'ApiController@medicineListByDate');
    Route::get('/generic/list/{date}', 'ApiController@genericListByDate');
    
    Route::get('/medicine/alert/list', 'ApiController@medAlertList');
    Route::get('/medicine/alert/list/{date}', 'ApiController@medAlertListByDate');

    Route::get('/complain/list/{id}', 'ApiController@complainList');
});

Route::get('/doctor/email/verify/{id}', 'ApiController@doctorEmailVerify');

Route::post('/complain/store', 'ApiController@complainStore');

//Can access without token
Route::get('/medicine/list', 'ApiController@medicineList');
Route::get('/generic/list', 'ApiController@genericList');

Route::get('/medicine/{id}', 'ApiController@medicineInfo');

Route::post('/doctor/validate', 'ApiController@validateDoctor');

//shihab
Route::post("/signup", "ApiController@insert");