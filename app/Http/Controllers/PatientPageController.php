<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\services_availed;
use Auth;
use DB;

class PatientPageController extends Controller
{
    public function appointments()
    {
        return view('pages.patient.appointments');
    }
    public function billing()
    {
        $bill = DB::table('services_availed')
        ->join('Users as d', 'd.id', '=', 'services_availed.staff_id')
        ->join('Users as p', 'p.id', '=', 'services_availed.patient_id')
        ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
        ->select('services_availed.services_availed_id as id', 'd.first_name as doctorfname', 'd.middle_name as doctormname', 'd.last_name as doctorlname', 'services_availed.description', 'services_availed.updated_at as date', 'status', 'ms.rate as total')
        ->where('p.id', '=', AUTH::user()->id)
        ->get();
        return view('pages.patient.billing')->with('bills', $bill);
    }
    public function results()
    {
        return view('pages.patient.results');
    }
    public function settings()
    {
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $user = user::find(Auth::user()->id);

        return view('pages.patient.settings', compact('user', 'items_1', 'items_2'));
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

        return redirect()->route('patient.settings', ['name' => Auth::user()->username]);
    }
}
