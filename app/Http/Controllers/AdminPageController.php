<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function appointment()
    {
        return view('pages.admin.appointment');
    }

    public function billing()
    {
        return view('pages.admin.billing');
    }

    public function user_mgt()
    {
        $users = user::withTrashed()->get();
        $roles = role::all();

        return view('pages.admin.user_mgt', compact('users', 'roles'));
    }

    public function message()
    {
        return view('pages.admin.message');
    }

    public function setting()
    {
        return view('pages.admin.setting');
    }
}
