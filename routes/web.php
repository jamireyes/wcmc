<?php

use App\Events\AppointmentStatus;

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'preventBackHistory'], function() {
    
    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {
        
        Route::post('/ChangePassword', 'ChangePasswordController@changePassword')->name('ChangePassword');

        // ADMIN ROUTES
        Route::group(['middleware' => 'role:ADMIN'], function () {
            Route::get('admin/dashboard/{name}', 'AdminPageController@dashboard')->name('admin.dashboard');
            Route::get('admin/appointments/{name}', 'AdminPageController@appointment')->name('admin.appointment');
            Route::get('admin/user_mgt/{name}', 'AdminPageController@user_mgt')->name('admin.user_mgt');
            Route::get('admin/doc_schedule/{name}', 'AdminPageController@doc_schedule')->name('admin.schedule');
            Route::get('admin/bill_payments/{name}', 'AdminPageController@billing')->name('admin.billing');
            Route::get('admin/messages/{name}', 'AdminPageController@message')->name('admin.message');
            Route::get('admin/settings/{name}', 'AdminPageController@setting')->name('admin.setting');

            Route::post('/restore/{id}', 'Admin_UserMGTController@restore')->name('admin_usermgt.restore');
            Route::resource('admin_usermgt', 'Admin_UserMGTController');
            Route::resource('doctor_schedule', 'DoctorSchedController');
        });

        // PATIENT ROUTES
        Route::group(['middleware' => 'role:PATIENT'], function () {
            Route::get('patient/appointments/{name}', 'PatientPageController@appointments')->name('patient.appointments');
            Route::get('patient/billing/{name}', 'PatientPageController@billing')->name('patient.billing');
            Route::get('patient/results/{name}', 'PatientPageController@results')->name('patient.results');
            Route::get('patient/settings/{name}', 'PatientPageController@settings')->name('patient.settings');
            Route::post('patient/UpdateSettings', 'PatientPageController@UpdateSettings')->name('patient.UpdateSettings');
        });
        
        // NURSE ROUTES
        Route::group(['middleware' => 'role:NURSE'], function () {
            Route::get('nurse/dashboard/{name}', 'NursePageController@dashboard')->name('nurse.dashboard');
            Route::get('nurse/appointments/{name}', 'NursePageController@appointment')->name('nurse.appointment');
            Route::get('nurse/billing/{name}', 'NursePageController@billing')->name('nurse.billing');
            Route::get('nurse/settings/{name}', 'NursePageController@settings')->name('nurse.settings');
            Route::get('nurse/UpdateSettings', 'NursePageController@UpdateSettings')->name('nurse.UpdateSettings');
        });

        // ADMIN & NURSE ROUTES
        Route::group(['middleware' => ['role:NURSE,ADMIN']], function () {
            Route::post('getAppointments', 'AppointmentController@getAppointments')->name('appointment.getAppointments');
            // Route::get('getAppointments', 'AppointmentController@getAppointments')->name('appointment.getAppointments');
        });

        // DOCTOR ROUTES
        Route::group(['middleware' => 'role:DOCTOR'], function () {
            Route::get('doctor/dashboard/{name}', 'DoctorPageController@dashboard')->name('doctor.dashboard');
            Route::get('doctor/appointments/{name}', 'DoctorPageController@appointments')->name('doctor.appointments');
            Route::get('doctor/patients/{name}', 'DoctorPageController@patients')->name('doctor.patients');
            Route::get('doctor/billings/{name}', 'DoctorPageController@billings')->name('doctor.billings');
            Route::get('doctor/settings/{name}', 'DoctorPageController@settings')->name('doctor.settings');
        });

    });

});


// FOR TESTING [DO NOT TOUCH] //

    // Event Trigger []
    Route::get('event', function(){
        $user = Auth::user();
        $title = 'Appointment Request!';
        $message = $user->first_name.' '.$user->last_name.' '.'has sent a request.';

        event(new AppointmentStatus($title, $message, $user));
        
        return 'Event Sent!';
    });

    // Event Listener
    Route::get('test', function(){
        return view('test');
    });

// END TESTING AREA //
    