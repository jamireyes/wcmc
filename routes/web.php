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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'preventBackHistory'], function()
{
    // ADMIN PAGES
    Route::get('/dashboard/{name}', 'AdminPageController@dashboard')->name('admin.dashboard')->middleware('auth', 'role:ADMIN');
    Route::get('/appointments/{name}', 'AdminPageController@appointment')->name('admin.appointment')->middleware('auth', 'role:ADMIN');
    Route::get('/user_mgt/{name}', 'AdminPageController@user_mgt')->name('admin.user_mgt')->middleware('auth', 'role:ADMIN');
    Route::get('/bill_payments/{name}', 'AdminPageController@billing')->name('admin.billing')->middleware('auth', 'role:ADMIN');
    Route::get('/messages/{name}', 'AdminPageController@message')->name('admin.message')->middleware('auth', 'role:ADMIN');
    Route::get('/settings/{name}', 'AdminPageController@setting')->name('admin.setting')->middleware('auth', 'role:ADMIN');

    // ADMIN USER MGT
    Route::post('/restore/{id}', 'Admin_UserMGTController@restore')->name('admin.restore');
    Route::resource('admin', 'Admin_UserMGTController');
    
    // PATIENT PAGES
    Route::get('/appointments/patient', 'PatientPageController@appointments')->name('patient.appointments');
    Route::get('/billing/patient', 'PatientPageController@billing')->name('patient.billing');
    Route::get('/results/patient', 'PatientPageController@results')->name('patient.results');
    Route::get('/settings/patient', 'PatientPageController@settings')->name('patient.settings');
});

    