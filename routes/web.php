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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/application/doctor/create', 'AuthorizeDoctorController@create')->name('authorizeDoctor.create');
Route::post('/application/doctor', 'AuthorizeDoctorController@store');
Route::get('/application/medicine/create', 'ApplicationController@medicineCreate')->name('application.medicine.create');
Route::post('/application/medicine/store', 'ApplicationController@medicineStore')->name('application.medicine.store');
Route::get('/application/message', 'ApplicationController@message')->name('application.message');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/authorize/doctor/index', 'AuthorizeDoctorController@index')->name('authorizeDoctor.index');
    Route::get('/authorize/doctor/{id}', 'AuthorizeDoctorController@show')->name('authorizeDoctor.show');     
    Route::post('/authorize/doctor/{id}', 'DoctorController@store');
    
    Route::get('/authorize/medicine/index', 'ApplicationController@medicineIndex')->name('application.medicine.index');
    Route::get('/authorize/medicine/{id}', 'ApplicationController@medicineShow')->name('application.medicine.show'); 
    Route::post('/authorize/medicine/{id}', 'MedicineController@store')->name('application.medicine.medstore'); 

    Route::get('/medicine/remove', 'MedicineController@removedMeds')->name('medicine.removed');
    Route::get('/medicine/remove/undo/{id}', 'MedicineController@removeUndo')->name('medicine.removed.undo');
    Route::get('/medicine/list/generic/{id}', 'MedicineController@genericBased')->name('medicine.genericBased');
    Route::get('/ajax/adminHomeCounts', 'AjaxController@adminHomeCounts')->name('ajax.adminHomeCounts');
    Route::resources([
        'doctor' => 'DoctorController',
        'medicine' => 'MedicineController',
        'generic' => 'GenericController',
        'prescription' => 'PrescriptionController',
    ]);
});