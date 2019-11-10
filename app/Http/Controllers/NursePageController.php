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
            ->select(DB::raw("SUM(ms.rate) as total"), 'patient_id', 'p.first_name as patientfname', 'p.middle_name as patientmname', 'p.last_name as patientlname', 'services_availed.created_at', 'services_availed.deleted_at', 'services_availed.discount')
            ->join('users as d', 'd.id', '=', 'services_availed.staff_id')
            ->join('users as p', 'p.id', '=', 'services_availed.patient_id')
            ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
            ->groupBy(['created_at', 'deleted_at', 'patient_id', 'p.first_name', 'p.middle_name', 'p.last_name', 'discount'])
            ->get();

        return view('pages.nurse.billing')->with('bills', $bill);
    }

    public function patientRecords()
    {
        $patients = user::all()->where('role_id', 2);
                    
        return view('pages.nurse.patient_record', compact('patients'));
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
