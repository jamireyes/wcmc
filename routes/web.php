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
            Route::post('doctor_schedule/restore/{id}', 'DoctorSchedController@restore')->name('doctor_schedule.restore');
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
            Route::post('getApprovedAppointments', 'AppointmentController@getApprovedAppointments')->name('appointment.getApprovedAppointments');
            Route::post('getDocSchedules', 'AppointmentController@getDocSchedules')->name('appointment.getDocSchedules');
            Route::post('approve/{id}', 'AppointmentController@approve')->name('appointment.approve');
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
    