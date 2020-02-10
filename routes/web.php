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

use Illuminate\Support\Facades\Hash;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/apply/doctor', 'AuthorizeDoctorController@create')->name('authorizeDoctor.create');
Route::post('/apply/doctor', 'AuthorizeDoctorController@store');

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/authorize/doctor', 'AuthorizeDoctorController@index')->name('authorizeDoctor.index');
//     Route::get('/authorize/doctor/{id}', 'AuthorizeDoctorController@show')->name('authorizeDoctor.show');
//     Route::post('/authorize/doctor/{id}', 'DoctorController@store');
//     Route::get('/doctor/index', 'DoctorController@index')->name('doctor.index');
//     Route::get('/doctor/{id}', 'DoctorController@show')->name('doctor.show');
//     Route::get('/doctor/create', 'DoctorController@create')->name('doctor.create');
// });

Route::group(['prefix' => 'admin'], function() {
    Route::get('/authorize/doctor', 'AuthorizeDoctorController@index')->name('authorizeDoctor.index');
    Route::get('/authorize/doctor/{id}', 'AuthorizeDoctorController@show')->name('authorizeDoctor.show');     Route::post('/authorize/doctor/{id}', 'DoctorController@store');
    Route::resources([
        'doctor' => 'DoctorController',
    ]);
});