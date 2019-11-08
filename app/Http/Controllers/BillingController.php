<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\services_availed;
use App\medical_service;
use Auth;

class BillingController extends Controller
{
    public function store(Request $request)
    {
        $medical_services = json_decode($request->input('medical_services'));

        foreach($medical_services as $medical_service){
            $data = new services_availed;
            $data->medical_service_id = $medical_service->id;
            $data->patient_id = $request->input('patient_id');
            $data->staff_id = Auth::user()->id;
            $data->save();
        }
    }

    public function getMedicalService(Request $request)
    {
        $medical_services = DB::table('services_availed')
            ->select('ms.description', 'ms.rate')
            ->join('medical_services as ms', 'ms.medical_service_id', '=', 'services_availed.medical_service_id')
            ->where('patient_id', $request->input('patient_id'))
            ->where('services_availed.created_at', $request->input('created_at'))
            ->get();

        $results = '';

        foreach($medical_services as $ms){
            $results .= "<tr><td>".$ms->description."</td><td>".$ms->rate."</td></tr>";
        }

        return $results;
    }

    public function destroy(Request $request)
    {
        $bills = DB::table('services_availed')
            ->select('services_availed_id')
            ->where('created_at', $request->input('created_at'))
            ->where('patient_id', $request->input('patient_id'))
            ->get();

        foreach($bills as $b){
            $data = services_availed::find($b->services_availed_id)->delete();
        }

        return "Entry successfully deleted!";
    }

    public function restore(Request $request)
    {
        $bills = DB::table('services_availed')
            ->select('services_availed_id')
            ->where('created_at', $request->input('created_at'))
            ->where('patient_id', $request->input('patient_id'))
            ->whereNotNull('deleted_at')
            ->get();

        foreach($bills as $b){
            $data = services_availed::withTrashed()->find($b->services_availed_id)->restore();
        }

        return "Entry successfully restored!";
    }
}
