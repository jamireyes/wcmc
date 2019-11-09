<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use App\doctor_schedule;
use App\appointment;
use App\user_vital_signs;
use App\medical_service;
use Auth;
use DB;


class NursePageController extends Controller
{
    public function dashboard()
    {
        return view('pages.nurse.dashboard');
    }

    public function appointment()
    {
        $doctors = user::where('role_id', 3)->get();
        $patients = user::where('role_id', 2)->get();
        $schedules = doctor_schedule::all();
        $medical_services = medical_service::all();

        return view('pages.nurse.appointment', compact('doctors', 'patients', 'schedules', 'medical_services'));
    }

    public function billing()
    {
        $bill = DB::table('services_availed')
        ->join('Users as s', 's.id', '=', 'services_availed.staff_id')
        ->join('Users as p', 'p.id', '=', 'services_availed.patient_id')
        ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
        ->select('services_availed.services_availed_id as id', 's.first_name as patientfname', 's.middle_name as patientmname', 's.first_name as patientlname', 'services_availed.description', 'services_availed.updated_at as date', 'status', 'ms.rate as total')
        ->where('s.id', '=', AUTH::user()->id)
        ->get();

        return view('pages.nurse.billing')->with('bills', $bill);
    }

    public function patientRecords()
    {
        $patients = user::all()->where('role_id', 2);
        
        // appointment:: join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
        // ->join('users', 'users.id', '=', 'appointments.patient_id')
        // ->join('medical_histories', 'medical_histories.user_id', '=', 'users.id')
        // ->join('user_vital_signs', 'user_vital_signs.patient_id', '=', 'users.id')        
        // ->get();
                    
        return view('pages.nurse.patient_record', compact('patients'));
    }

    // public function addPatientRecords(Request $request){
        
    //     $medical_history = New medical_history;
    //     $medical_history->user_id = $request->input('user_id');
    //     $medical_history->description = $request->input('description');
    //     $medical_history->save();
        
    //     return back();
    // }

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
