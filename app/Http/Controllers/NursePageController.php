<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
use App\medical_history;
use App\doctor_schedule;
use App\User;
use Auth;


class NursePageController extends Controller
{
    public function dashboard()
    {
        return view('pages.nurse.dashboard');
    }

    public function appointment()
    {
        // $appointments = appointment::all();
        $doctors = user::where('role_id', 3)->get();
        $schedules = doctor_schedule::all();
        $appointments = appointment::
                        join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
                        ->join('users', 'users.id', '=', 'appointments.patient_id')
                        ->get();
        return view('pages.nurse.appointment', compact('doctors', 'schedules', 'appointments'));
    }

    public function billing()
    {
        return view('pages.nurse.billing');
    }

    public function patientRecords()
    {
        $patients = appointment:: join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
        ->join('users', 'users.id', '=', 'appointments.patient_id')
        ->join('medical_histories', 'medical_histories.user_id', '=', 'users.id')
        ->join('user_vital_signs', 'user_vital_signs.patient_id', '=', 'users.id')        
        ->get();
                    
        return view('pages.nurse.patient_record', compact('patients'));
    }

    public function addPatientRecords(Request $request){
        
        $medical_history = New medical_history;
        $medical_history->user_id = $request->input('user_id');
        $medical_history->description = $request->input('description');
        $medical_history->save();
        
        return back();
    }

    public function settings()
    {
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $user = user::find(Auth::user()->id);

        return view('pages.nurse.setting', compact('user', 'items_1', 'items_2'));
    }

    public function UpdateSettings(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->username = $request->input('username');
        $data->email = $request->input('email');
        $data->contact_no = $request->input('contact_no');
        $data->first_name = $request->input('first_name');
        $data->last_name = $request->input('last_name');
        $data->middle_name = $request->input('middle_name');
        $data->sex = $request->input('sex');
        $data->birthday = $request->input('birthday');
        $data->citizenship = $request->input('citizenship');
        $data->civil_status = $request->input('civil_status');
        $data->address_line_1 = $request->input('address_line_1');
        $data->address_line_2 = $request->input('address_line_2');
        $data->save();

        toastr()->info('User Profile Updated!', 'Notification');

        return redirect()->route('pages.nurse.settings', ['name' => Auth::user()->username]);
    }
}
