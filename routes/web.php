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
use App\Mail\WelcomeMail;
use App\Mail\MedicineApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
Auth::routes();


Route::get('/', function () {
    return view('welcome');
})->name('front');

Route::get('/email', function () {
    $data = (object) [
        'username' => 'Saska',
        'password' => '990331',
        'name' => 'Antonin',
        'url' => url('publicMedicine/'.'1')
    ];
    
    //return new MedicineApproved($data);
    Mail::to('email@email.com')->send(new MedicineApproved($data));
});

Route::get('/admins', function () {
    return redirect('/login');
});

Route::get('/download/doctor/software', 'PublicController@downloadSoftware')->name('download.doctorSoftware');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/application/doctor/create', 'ApplicationController@doctorApplicationCreate')->name('application.doctorApplicationCreate');
Route::post('/application/doctor/create', 'ApplicationController@doctorApplicationStore');
Route::get('/application/medicine/create', 'ApplicationController@medicineApplicationCreate')->name('application.medicine.create');
Route::post('/application/medicine/store', 'ApplicationController@medicineApplicationStore')->name('application.medicine.store');
Route::get('/application/message', 'ApplicationController@message')->name('application.message');
Route::get('/findRegisteredDoctor', 'PublicController@findRegisteredDoctor')->name('public.findRegisteredDoctor');
Route::resource('publicMedicine', 'PublicMedicineController')->only([
    'index', 'show'
]);
Route::get('/publicMedicine/generic/list/{id}', 'PublicMedicineController@genericBased')->name('publicMedicine.genericBased');
Route::get('/publicMedicine/generic/show/{id}', 'PublicMedicineController@genericShow')->name('publicMedicine.genericShow');

Route::get('/ajax/getDoctorDetails/{id}', 'AjaxController@getDoctorDetails')->name('ajax.getDoctorDetails');
Route::get('/ajax/generateDoctorID', 'AjaxController@generateDoctorID')->name('ajax.generateDoctorID');
Route::get('/ajax/getMedList/{query}', 'AjaxController@getMedList');
Route::get('/ajax/getGenericList/{query}', 'AjaxController@getGenericList');
Route::get('/ajax/getInternationalNews', 'AjaxController@getInternationalNews')->name('ajax.getInternationalNews');

Route::group(['prefix' => 'admin', 'middleware' => 'checkIfAdmin'], function() {

    Route::get('/authorize/doctor/index', 'ApplicationController@doctorApplicationIndex')->name('application.doctorApplicationIndex');
    Route::get('/authorize/doctor/{id}', 'ApplicationController@doctorApplicationShow')->name('application.doctorApplicationShow');     
    Route::post('/authorize/doctor/{id}', 'DoctorController@store');
    
    Route::get('/authorize/medicine/index', 'ApplicationController@medicineApplicationIndex')->name('application.medicineApplicationIndex');
    Route::get('/authorize/medicine/{id}', 'ApplicationController@medicineApplicationShow')->name('application.medicineApplicationShow'); 
    Route::post('/authorize/medicine/{id}', 'MedicineController@store')->name('application.medicine.medstore'); 

    Route::get('/medicine/list/generic/{id}', 'MedicineController@genericBased')->name('medicine.genericBased');
    Route::get('/medicine/remove', 'MedicineController@removedMeds')->name('medicine.removed');
    Route::get('/medicine/remove/undo/{id}', 'MedicineController@removeUndo')->name('medicine.removed.undo');

    Route::get('/ajax/adminHomeCounts', 'AjaxController@adminHomeCounts')->name('ajax.adminHomeCounts');
    Route::get('/ajax/getNotification', 'AjaxController@getNotification')->name('ajax.getNotification');
    Route::get('/notification/read/{id}/{route_name}/{route_id}', 'NotificationController@read')->name('notification.read');

    Route::get('/doctor/message', 'DoctorController@message')->name('doctor.message');
    Route::get('/medicine/message', 'MedicineController@message')->name('medicine.message');
    Route::get('/medicine/alert/message', 'MedAlertController@message')->name('medAlert.message');

    //Route::get('/doctor/modify/index', 'DoctorModifyController@index');

    Route::resource('doctorModify', 'DoctorModifyController')->only([
        'index', 'show', 'update'
    ]);

    Route::resources([
        'doctor' => 'DoctorController',
        'medicine' => 'MedicineController',
        'generic' => 'GenericController',
        'prescription' => 'PrescriptionController',
        'complain' => 'ComplainController',
        'medAlert' => 'MedAlertController', 
    ]);
});


//Shihab

Route::get('/citizen/signup','PublicController@signup');