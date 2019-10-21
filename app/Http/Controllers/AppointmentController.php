<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\doctor_schedule;
use App\appointment;
use App\User;
use Response;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    
    public function getAppointments(Request $request)
    {
        $request->session()->put('doctor_id', $request->input('doctor_id'));
        $request->session()->put('appointment_date', $request->input('appointment_date'));
        $request->session()->put('appointment_time', $request->input('appointment_time'));


        $appointments = DB::table('appointments')
            ->select(DB::raw("concat(users.first_name, ' ', users.middle_name, ' ', users.last_name) as fullname"), 'appointments.appointment_id', DB::raw("DATE_FORMAT(appointments.created_at, '%l:%i %p') as appointment_date"))
            ->join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
            ->join('users', 'users.id', '=', 'appointments.patient_id')
            ->where('doctor_schedules.doctor_id', $request->session()->get('doctor_id'))
            ->where('doctor_schedules.doctor_schedule_id', $request->session()->get('appointment_time'))
            ->where('appointment_date', $request->session()->get('appointment_date'))
            ->where('status', 'PENDING')
            ->get();
        
        
        if ($appointments->isEmpty()) {
            toastr()->error('No appointments found.', 'Error!');
            return redirect()->back();
        }
        
        return datatables()->of($appointments)
            ->addColumn('Action', function($appointment){
                return "<a id='ApproveBtn' data-id=".$appointment->appointment_id." data-toggle='modal' data-target='#ApproveModal'><i class='fa fa-plus-circle text-success' aria-hidden='true'></i></a>";
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function getApprovedAppointments(Request $request)
    {                
        $request->session()->put('doctor_id', $request->input('doctor_id'));
        $request->session()->put('appointment_date', $request->input('appointment_date'));
        $request->session()->put('appointment_time', $request->input('appointment_time'));

        $appointments = DB::table('appointments')
            ->select(DB::raw("concat(users.first_name, ' ', users.middle_name, ' ', users.last_name) as fullname"), 'appointments.appointment_id', DB::raw("DATE_FORMAT(appointments.created_at, '%l:%i %p') as appointment_date"))
            ->join('doctor_schedules', 'doctor_schedules.doctor_schedule_id', '=', 'appointments.doctor_schedule_id')
            ->join('users', 'users.id', '=', 'appointments.patient_id')
            ->where('doctor_schedules.doctor_id', $request->session()->get('doctor_id'))
            ->where('doctor_schedules.doctor_schedule_id', $request->session()->get('appointment_time'))
            ->where('appointment_date', $request->session()->get('appointment_date'))
            ->where('status', 'APPROVED')
            ->get();

        if ($appointments->isEmpty()) {
            toastr()->error('No appointments found.', 'Error!');
            return redirect()->back();
        }
        
        return datatables()->of($appointments)
            ->addColumn('Action', function($appointment){
                return "<a id='DoneBtn' data-id=".$appointment->appointment_id." data-toggle='modal' data-target='#DoneModal'><i class='fas fa-check-circle text-success' aria-hidden='true'></i></a>";
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function approve($id)
    {
        $appointment = appointment::find($id);
        $appointment->status = 'APPROVED';
        $appointment->save();

    }

    public function getDocSchedules(Request $request)
    {
        $doctor_id = $request->get('doctor_id');
        $day = Carbon::parse($request->get('appointment_date'))->isoFormat('ddd');
        
        $query = DB::table('doctor_schedules')
            ->select('doctor_schedule_id', 'start_time', 'end_time')
            ->where('doctor_id', $doctor_id)
            ->whereRaw("FIND_IN_SET('".$day."', day)")
            ->get();
        
        $result = "<option value=''disabled selected>Select appointment time</option>";

        foreach($query as $row){
            $result .= "<option value='".$row->doctor_schedule_id."'>".Carbon::parse($row->start_time)->format('g:i A')." - ".Carbon::parse($row->end_time)->format('g:i A')."</option>";
        }
        
        return $result;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_schedule_id' => 'required',
            'appointment_date' => 'required',
            'nurse_id' => 'required',
            'patient_id' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->warning('Missing entries');
        } else {
            
        }
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
