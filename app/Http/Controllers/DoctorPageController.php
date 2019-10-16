<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
use App\doctor_schedule;
use App\User;
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
    public function patients()
    {
        return view('pages.doctor.patient');
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
