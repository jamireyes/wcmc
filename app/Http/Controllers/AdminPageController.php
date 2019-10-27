<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use App\doctor_schedule;
use App\appointment;
use App\medical_service;
use Auth;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function appointment()
    {
        $doctors = user::where('role_id', 3)->get();
        $schedules = doctor_schedule::all();

        return view('pages.admin.appointment', compact('doctors', 'schedules'));
    }

    public function billing()
    {
        return view('pages.admin.billing');
    }

    public function service()
    {
        $services = medical_service::all();
        return view('pages.admin.medical_service')->with('services', $services);
    }

    public function user_mgt()
    {
        $users = user::withTrashed()->get();
        $roles = role::all();

        return view('pages.admin.user_mgt', compact('users', 'roles'));
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
