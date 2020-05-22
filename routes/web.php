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
use App\Mail\EmailVerificationMail;
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
        'url' => url('/api/doctor/email/verify/' . '10'),
        'message' => 'Your Application For Doctor Authorization Has Been Rejected',
    ];

    return new EmailVerificationMail($data);
    //Mail::to('email@email.com')->send(new EmailVerificationMail($data));
});

Route::get('/admins', function () {
    return redirect('/login');
});

Route::get('/download/doctor/software', 'PublicController@downloadSoftware')->name('download.doctorSoftware');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/application/doctor/create', 'ApplicationController@doctorApplicationCreate')->name('application.doctorApplicationCreate');
Route::get('/application/doctor/destroy/{id}', 'ApplicationController@doctorApplicationDestroy')->name('application.doctorApplicationDestroy');
Route::post('/application/doctor/create', 'ApplicationController@doctorApplicationStore');
Route::get('/application/medicine/create', 'ApplicationController@medicineApplicationCreate')->name('application.medicine.create');
Route::get('/application/medicine/destroy/{id}', 'ApplicationController@medicineApplicationDestroy')->name('application.medicine.destroy');
Route::post('/application/medicine/store', 'ApplicationController@medicineApplicationStore')->name('application.medicine.store');
Route::get('/application/message', 'ApplicationController@message')->name('application.message');
Route::get('/findRegisteredDoctor', 'PublicController@findRegisteredDoctor')->name('public.findRegisteredDoctor');
Route::resource('publicMedicine', 'PublicMedicineController')->only([
    'index', 'show',
]);
Route::get('/publicMedicine/generic/list/{id}', 'PublicMedicineController@genericBased')->name('publicMedicine.genericBased');
Route::get('/publicMedicine/generic/show/{id}', 'PublicMedicineController@genericShow')->name('publicMedicine.genericShow');

Route::get('/ajax/getDoctorDetails/{id}', 'AjaxController@getDoctorDetails')->name('ajax.getDoctorDetails');
Route::get('/ajax/generateDoctorID', 'AjaxController@generateDoctorID')->name('ajax.generateDoctorID');
Route::get('/ajax/getMedList/{query}', 'AjaxController@getMedList');
Route::get('/ajax/getGenericList/{query}', 'AjaxController@getGenericList');
Route::get('/ajax/getInternationalNews', 'AjaxController@getInternationalNews')->name('ajax.getInternationalNews');

Route::group(['prefix' => 'admin', 'middleware' => 'checkIfAdmin'], function () {

    Route::get('/medicine/list/generic/{id}', 'MedicineController@genericBased')->name('medicine.genericBased');
    Route::get('/ajax/adminHomeCounts', 'AjaxController@adminHomeCounts')->name('ajax.adminHomeCounts');
    Route::get('/ajax/getNotification', 'AjaxController@getNotification')->name('ajax.getNotification');
    Route::get('/notification/read/{id}/{route_name}/{route_id}', 'NotificationController@read')->name('notification.read');
    Route::get('/medicine/remove', 'MedicineController@removedMeds')->name('medicine.removed');
    Route::get('/doctor/message', 'DoctorController@message')->name('doctor.message');
    Route::get('/medicine/message', 'MedicineController@message')->name('medicine.message');
    Route::get('/medicine/alert/message', 'MedAlertController@message')->name('medAlert.message');

    Route::resource('medicine', 'MedicineController')->only([
        'index', 'show'
    ]);

    Route::resource('generic', 'GenericController')->only([
        'index', 'show'
    ]);

    // Super Admin

    Route::group(['middleware' => 'checkIfSuperAdmin'], function () {
        Route::resources([
            'admin' => 'AdminController',
        ]);
    });

    // General Admin

    Route::group(['middleware' => 'checkIfGeneralAdmin'], function () {

        Route::resources([
            'doctor' => 'DoctorController',
            'prescription' => 'PrescriptionController',
            'complain' => 'ComplainController',
        ]);

        Route::resource('doctorModify', 'DoctorModifyController')->only([
            'index', 'show', 'update',
        ]);

        Route::get('/authorize/doctor/index', 'ApplicationController@doctorApplicationIndex')->name('application.doctorApplicationIndex');
        Route::get('/authorize/doctor/{id}', 'ApplicationController@doctorApplicationShow')->name('application.doctorApplicationShow');
        Route::post('/authorize/doctor/{id}', 'DoctorController@store');

        
    });

    // Medicine Admin

    Route::group(['middleware' => 'checkIfMedicineAdmin'], function () {

        Route::resources([
            'medAlert' => 'MedAlertController',
        ]);

        Route::resource('medicine', 'MedicineController')->only([
            'create', 'edit', 'update', 'destroy'
        ]);

        Route::resource('generic', 'GenericController')->only([
            'create', 'edit', 'update', 'destroy'
        ]);

        Route::get('/authorize/medicine/index', 'ApplicationController@medicineApplicationIndex')->name('application.medicineApplicationIndex');
        Route::get('/authorize/medicine/{id}', 'ApplicationController@medicineApplicationShow')->name('application.medicineApplicationShow');
        Route::post('/authorize/medicine/{id}', 'MedicineController@store')->name('application.medicine.medstore');

        
        Route::get('/medicine/remove/undo/{id}', 'MedicineController@removeUndo')->name('medicine.removed.undo');

        

    });

});

// Route::group(['prefix' => 'admin', 'middleware' => 'checkIfSuperAdmin'], function () {

//     Route::get('/authorize/doctor/index', 'ApplicationController@doctorApplicationIndex')->name('application.doctorApplicationIndex');
//     Route::get('/authorize/doctor/{id}', 'ApplicationController@doctorApplicationShow')->name('application.doctorApplicationShow');
//     Route::post('/authorize/doctor/{id}', 'DoctorController@store');

//     Route::get('/authorize/medicine/index', 'ApplicationController@medicineApplicationIndex')->name('application.medicineApplicationIndex');
//     Route::get('/authorize/medicine/{id}', 'ApplicationController@medicineApplicationShow')->name('application.medicineApplicationShow');
//     Route::post('/authorize/medicine/{id}', 'MedicineController@store')->name('application.medicine.medstore');

//     Route::get('/medicine/list/generic/{id}', 'MedicineController@genericBased')->name('medicine.genericBased');
//     Route::get('/medicine/remove', 'MedicineController@removedMeds')->name('medicine.removed');
//     Route::get('/medicine/remove/undo/{id}', 'MedicineController@removeUndo')->name('medicine.removed.undo');

//     Route::get('/ajax/adminHomeCounts', 'AjaxController@adminHomeCounts')->name('ajax.adminHomeCounts');
//     Route::get('/ajax/getNotification', 'AjaxController@getNotification')->name('ajax.getNotification');
//     Route::get('/notification/read/{id}/{route_name}/{route_id}', 'NotificationController@read')->name('notification.read');

//     Route::get('/doctor/message', 'DoctorController@message')->name('doctor.message');
//     Route::get('/medicine/message', 'MedicineController@message')->name('medicine.message');
//     Route::get('/medicine/alert/message', 'MedAlertController@message')->name('medAlert.message');

//     //Route::get('/doctor/modify/index', 'DoctorModifyController@index');

//     Route::resource('doctorModify', 'DoctorModifyController')->only([
//         'index', 'show', 'update',
//     ]);

//     Route::resources([
//         'doctor' => 'DoctorController',
//         'medicine' => 'MedicineController',
//         'generic' => 'GenericController',
//         'prescription' => 'PrescriptionController',
//         'complain' => 'ComplainController',
//         'medAlert' => 'MedAlertController',
//         'admin' => 'AdminController',
//     ]);
// });

//Shihab

Route::get('/citizen/signup', 'PublicController@signup');
