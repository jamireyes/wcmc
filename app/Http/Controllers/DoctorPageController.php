<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
use App\doctor_schedule;
use App\User;
use App\user_vital_signs;
use Auth;

class DoctorPageController extends Controller
{
    public function dashboard()
    {
        return view('pages.doctor.dashboard');
    }
    public function appointments()
    {
        
        $doctors = user::where('role_id', 3)->get();
        $schedules = doctor_schedule::all();

        return view('pages.doctor.appointment', compact('doctors', 'schedules'));
        // return view('pages.doctor.appointment');
    }
    public function patientRecords()
    {
        $patients = appointment::join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
        ->join('users', 'users.id', '=', 'appointments.patient_id')
        ->join('medical_histories', 'medical_histories.user_id', '=', 'users.id')
        ->join('user_vital_signs', 'user_vital_signs.patient_id', '=', 'users.id')        
        ->get(); 

        $users = user::all()->where('role_id', 2);

        $vitals = user_vital_signs::all();
                    
        return view('pages.doctor.patient_record', compact('patients', 'vitals', 'users'));
    }
    public function billings()
    {
        return view('pages.doctor.billing');
    }

    public function settings()
    {
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $user = user::find(Auth::user()->id);

        return view('pages.doctor.setting', compact('user', 'items_1', 'items_2'));
    }

    
}
