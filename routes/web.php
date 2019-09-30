<?php

use App\Events\AppointmentStatus;

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'preventBackHistory'], function() {
    
    Route::post('/ChangePassword', 'ChangePasswordController@changePassword')->name('ChangePassword');
    Auth::routes();

    // ADMIN ROUTES
    Route::group(['middleware' => ['auth', 'role:ADMIN']], function () {
        Route::get('admin/dashboard/{name}', 'AdminPageController@dashboard')->name('admin.dashboard');
        Route::get('admin/appointments/{name}', 'AdminPageController@appointment')->name('admin.appointment');
        Route::get('admin/user_mgt/{name}', 'AdminPageController@user_mgt')->name('admin.user_mgt');
        Route::get('admin/doc_schedule/{name}', 'AdminPageController@doc_schedule')->name('admin.schedule');
        Route::get('admin/bill_payments/{name}', 'AdminPageController@billing')->name('admin.billing');
        Route::get('admin/messages/{name}', 'AdminPageController@message')->name('admin.message');
        Route::get('admin/settings/{name}', 'AdminPageController@setting')->name('admin.setting');

        Route::post('/restore/{id}', 'Admin_UserMGTController@restore')->name('admin_usermgt.restore');
        Route::resource('admin_usermgt', 'Admin_UserMGTController');
    });
    
    // PATIENT ROUTES
    Route::group(['middleware' => ['auth', 'role:PATIENT']], function () {
        Route::get('patient/appointments/{name}', 'PatientPageController@appointments')->name('patient.appointments');
        Route::get('patient/billing/{name}', 'PatientPageController@billing')->name('patient.billing');
        Route::get('patient/results/{name}', 'PatientPageController@results')->name('patient.results');
        Route::get('patient/settings/{name}', 'PatientPageController@settings')->name('patient.settings');
        Route::post('patient/UpdateSettings', 'PatientPageController@UpdateSettings')->name('patient.UpdateSettings');
    });
});


// FOR TESTING [DO NOT TOUCH] //

    // Event Trigger []
    Route::get('event', function(){
        $id = Auth::user()->id;
        $role = Auth::user()->role_id;
        $message = 'Hello World!';

        event(new AppointmentStatus($message, $role));
        
        return 'Event Sent!';
    });

    // Event Listener
    Route::get('test', function(){
        return view('test');
    });

// END TESTING AREA //
    