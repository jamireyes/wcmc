<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\medical_history;
use App\user_vital_signs;
use Response;
use Carbon\Carbon;
use Auth;


class PatientRecordController extends Controller
{
    public function getMedicalHistory(Request $request)
    {
        $datas = DB::table('medical_histories')
            ->select('medical_histories.description', DB::raw("DATE_FORMAT(medical_histories.created_at, '%b %d, %Y %l:%i %p') as created_at"), DB::raw("DATE_FORMAT(medical_histories.updated_at, '%b %d, %Y %l:%i %p') as updated_at"))
            ->join('users', 'users.id', '=', 'medical_histories.user_id')
            ->where('user_id', '=', $request->input('patient_id'))
            ->get();

        return datatables()->of($datas)
            ->addColumn('Action', function($data){
                // return "<a id='DoneBtn' data-id=".$data->medical_history_id." data-toggle='modal' data-target='#DoneModal'><i class='fas fa-check-circle text-success pr-1' aria-hidden='true'></i></a><a id='EditBtn' data-id=".$appointment->appointment_id." data-patient=".json_encode($appointment->fullname)." data-date=".$appointment->appointment_date." data-time=".$appointment->doctor_schedule_id." data-toggle='modal' data-target='#EditModal'><i class='fas fa-edit text-warning'></i></a>";
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function getVitalSigns(Request $request)
    {
        $datas = DB::table('user_vital_signs')
            ->select(DB::raw("concat(users.first_name, ' ', users.middle_name, ' ', users.last_name) as fullname"), 'vital_signs.name', 'user_vital_signs.value', DB::raw("DATE_FORMAT(user_vital_signs.created_at, '%b %d, %Y %l:%i %p') as created_at"), DB::raw("DATE_FORMAT(user_vital_signs.updated_at, '%b %d, %Y %l:%i %p') as updated_at"))
            ->join('users', 'users.id', '=', 'user_vital_signs.staff_id')
            ->join('vital_signs', 'vital_signs.vital_sign_id', '=', 'user_vital_signs.vital_sign_id')
            ->where('patient_id', '=', $request->input('patient_id'))
            ->get();

        return datatables()->of($datas)
            ->addColumn('Action', function($data){
                // return "<a id='DoneBtn' data-id=".$data->medical_history_id." data-toggle='modal' data-target='#DoneModal'><i class='fas fa-check-circle text-success pr-1' aria-hidden='true'></i></a><a id='EditBtn' data-id=".$appointment->appointment_id." data-patient=".json_encode($appointment->fullname)." data-date=".$appointment->appointment_date." data-time=".$appointment->doctor_schedule_id." data-toggle='modal' data-target='#EditModal'><i class='fas fa-edit text-warning'></i></a>";
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function storeMedicalHistory(Request $request)
    {
        $data = new medical_history;
        $data->user_id = $request->input('user_id');
        $data->description = $request->input('description');
        $data->save();
    }

    public function storeVitalSigns(Request $request)
    {
        $p_id = $request->input('patient_id');
        $temperature = $request->input('temperature');
        $respiratory_rate = $request->input('respiratory_rate');
        $pulse_rate = $request->input('pulse_rate');
        $blood_pressure = $request->input('blood_pressure');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $last_menstrual_period = $request->input('last_menstrual_period');

        if($request->has('temperature')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 1;
            $data->value = $temperature;
            $data->save();
        }

        if($request->has('respiratory_rate')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 2;
            $data->value = $respiratory_rate;
            $data->save();
        }

        if($request->has('pulse_rate')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 3;
            $data->value = $pulse_rate;
            $data->save();
        }

        if($request->has('blood_pressure')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 4;
            $data->value = $blood_pressure;
            $data->save();
        }

        if($request->has('height')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 5;
            $data->value = $height;
            $data->save();
        }

        if($request->has('weight')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 6;
            $data->value = $weight;
            $data->save();
        }

        if($request->has('last_menstrual_period')){
            $data = new user_vital_signs;
            $data->patient_id = $p_id;
            $data->staff_id = Auth::id();
            $data->vital_sign_id = 7;
            $data->value = $last_menstrual_period;
            $data->save();
        }
    }
}
