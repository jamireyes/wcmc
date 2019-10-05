<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
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

        return view('pages.nurse.appointment');
    }

    public function billing()
    {
        return view('pages.nurse.billing');
    }

    public function settings()
    {
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $user = user::find(Auth::user()->id);

        return view('pages.nurse.settings', compact('user', 'items_1', 'items_2'));
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
