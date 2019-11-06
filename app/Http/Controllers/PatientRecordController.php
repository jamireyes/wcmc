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
}
