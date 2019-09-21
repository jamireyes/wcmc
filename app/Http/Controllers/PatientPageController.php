<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientPageController extends Controller
{
    public function appointments()
    {
        return view('pages.patient.appointments');
    }
    public function billing()
    {
        return view('pages.patient.billing');
    }
    public function results()
    {
        return view('pages.patient.results');
    }
    public function settings()
    {
        return view('pages.patient.settings');
    }
}
