<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\services_availed;
use App\services_availed_lines;
use App\medical_service;
use App\appointment;
use Auth;

class BillingController extends Controller
{
    public function store(Request $request)
    {
        $medical_services = json_decode($request->input('medical_services'));

        $data = new services_availed;
        $data->medical_service_id = $medical_service->id;
        $data->patient_id = $request->input('patient_id');
        $data->staff_id = Auth::user()->id;
        $data->discount = $request->input('discount');
        $data->amount_paid = $request->input('amount_paid');
        foreach($medical_services as $medical_service){
            
        }
        $data->save();

        
        // if($medical_service->id == 1){
            //     $data->staff_id = $request->input('doctor_id');
            // }else{
            //     $
            // }
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

    public function getBilling(Request $request)
    {
        $patient_id = $request->input('patient_hidden');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $bills = services_availed::withTrashed()
                ->where('patient_id', $patient_id)
                ->whereBetween('created_at', [$start_date, $end_date])
                ->get();
        if($bills->isEmpty()){
            toastr()->warning('Record not found!');
        }

        $patients = user::where('role_id', 2)->get();
        $services = services_availed_lines::all();
        $appointments = appointment::all();
        
        if(Auth::user()->role_id == 1){
            return view('pages.admin.billing', compact('bills', 'services', 'appointments', 'patients'));
        }elseif(Auth::user()->role_id == 4){
            return view('pages.nurse.billing', compact('bills', 'services', 'appointments', 'patients'));
        }
    }

    public function getPatientBilling(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $bills = services_availed::withTrashed()
                ->where('patient_id', Auth::user()->id)
                ->whereBetween('created_at', [$start_date, $end_date])
                ->get();
        if($bills->isEmpty()){
            toastr()->warning('Record not found!');
        }

        $services = services_availed_lines::all();
        $appointments = appointment::all();

        return view('pages.patient.billing', compact('bills', 'services', 'appointments'));
    }

    public function destroy(Request $request)
    {
        $bills = services_availed::find($request->input('id'))->delete();

        return "Entry successfully deleted!";
    }

    public function restore(Request $request)
    {
        $data = services_availed::withTrashed()->find($request->input('id'))->restore();

        return "Entry successfully restored!";
    }
}
