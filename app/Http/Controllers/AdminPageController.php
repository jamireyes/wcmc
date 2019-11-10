<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use App\doctor_schedule;
use App\appointment;
use App\medical_service;
use App\bloodtype;
use App\user_vital_signs;
use App\vital_sign;
use Auth;
use DB;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function appointment()
    {
        $doctors = user::where('role_id', 3)->get();
        $patients = user::where('role_id', 2)->get();
        $schedules = doctor_schedule::all();
        $medical_services = medical_service::all();

        return view('pages.admin.appointment', compact('doctors', 'patients', 'schedules', 'medical_services'));
    }

    public function billing()
    {
        $bill = DB::table('services_availed')
            ->select(DB::raw("SUM(ms.rate) as total"), 'patient_id', 'p.first_name as patientfname', 'p.middle_name as patientmname', 'p.last_name as patientlname', 'services_availed.created_at', 'services_availed.deleted_at', 'services_availed.discount')
            ->join('users as d', 'd.id', '=', 'services_availed.staff_id')
            ->join('users as p', 'p.id', '=', 'services_availed.patient_id')
            ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
            ->groupBy(['created_at', 'deleted_at', 'patient_id', 'p.first_name', 'p.middle_name', 'p.last_name', 'discount'])
            ->get();
        
        return view('pages.admin.billing')->with('bills', $bill);
    }

    public function service()
    {
        $services = medical_service::all();
        return view('pages.admin.medical_service')->with('services', $services);
    }

    public function user_mgt()
    {
        $users = user::withTrashed()->get();
        $sexs = user::getEnumValues('sex');
        $civil_statuses = user::getEnumValues('civil_status');
        $roles = role::all();
        $bloodtypes = bloodtype::all();
       
        return view('pages.admin.user_mgt', compact('users', 'roles', 'bloodtypes', 'sexs', 'civil_statuses'));
    }
    
    public function patient_records()
    {
        $patients = appointment::join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
        ->join('users', 'users.id', '=', 'appointments.patient_id')
        ->join('medical_histories', 'medical_histories.user_id', '=', 'users.id')
        ->join('user_vital_signs', 'user_vital_signs.patient_id', '=', 'users.id')        
        ->get(); 

        $users = user::all()->where('role_id', 2);

        $vitals = vital_sign::all();
                    
        return view('pages.admin.patient_record', compact('patients', 'vitals', 'users'));
    }

    public function doc_schedule()
    {
        $schedules = doctor_schedule::withTrashed()->get();
        $doctors = user::all()->where('role_id', 3);

        return view('pages.admin.doc_schedule', compact('schedules', 'doctors'));
    }

    public function message()
    {
        return view('pages.admin.message');
    }

    public function setting()
    {
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $user = user::find(Auth::user()->id);

        return view('pages.admin.setting', compact('user', 'items_1', 'items_2'));
    }
}
