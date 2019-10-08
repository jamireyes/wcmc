<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\doctor_schedule;
use App\appointment;
use App\User;
use Response;

class AppointmentController extends Controller
{
    
    public function getAppointments(Request $request)
    {                
        if($request->has(['doctor_id', 'appointment_date', 'appointment_time'])) {
            $appointments = DB::table('appointments')
                ->select('*')
                ->join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
                ->where('doctor_schedules.doctor_id', $request->input('doctor_id'))
                ->where('doctor_schedules.doctor_schedule_id', $request->input('appointment_time'))
                ->where('appointment_date', $request->input('appointment_date'))
                ->get();

            if($appointments->isEmpty()) {
                toastr()->error('No appointments found.', 'Error!');
                return redirect()->back();
            }
        } else {
            toastr()->error('Request error.', 'Error!');
            return redirect()->back();
        }

        toastr()->success('Request successful.', 'Successful!');
        // return json_encode(compact('appointments'));
        return datatables()->of($appointments)->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
