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

Route::get('/test', function () {
    return view('application.message');
})->name('test');

Route::get('/test/re', function () {
    $message = "Applicaition Successfully send !!!";
    return redirect()->route('test')->with('message', $message);
});

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/test', 'TestController@test')->name('test');
Route::get('/application/doctor', 'AuthorizeDoctorController@create')->name('authorizeDoctor.create');
Route::get('/application/message', 'ApplicationController@message')->name('application.message');
Route::post('/application/doctor', 'AuthorizeDoctorController@store');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/authorize/doctor', 'AuthorizeDoctorController@index')->name('authorizeDoctor.index');
    Route::get('/authorize/doctor/{id}', 'AuthorizeDoctorController@show')->name('authorizeDoctor.show');     
    Route::post('/authorize/doctor/{id}', 'DoctorController@store');
    Route::get('/medicine/remove', 'MedicineController@removeIndex')->name('removedMedicine.index');
    Route::get('/medicine/remove/undo/{id}', 'MedicineController@removeUndo')->name('removedMedicine.undo');
    Route::get('/medicine/list/generic/{id}', 'MedicineController@genericBased')->name('medicine.genericBased');
    
    Route::resources([
        'doctor' => 'DoctorController',
        'medicine' => 'MedicineController',
        'generic' => 'GenericController',
        'prescription' => 'PrescriptionController',
    ]);
});