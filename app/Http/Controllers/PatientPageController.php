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
        $doctors = user::all()->where('role_id', 3);

        return view('pages.patient.appointments', compact('doctors'));
    }
    public function billing()
    {
        $bill = DB::table('services_availed')
            ->select('services_availed_id', 'services_availed.created_at', 'd.first_name', 'd.last_name', 'd.middle_name', 'ms.description', 'ms.rate')
            ->join('users as d', 'd.id', '=', 'services_availed.staff_id')
            ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
            ->where('patient_id', Auth::user()->id)
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
