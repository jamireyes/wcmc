<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medical_service;

class Admin_ServiceController extends Controller
{
    public function index()
    {
        $services = medical_service::all();
        return view('pages.admin.medical_services')->with('services', $services);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $service = new medical_service($request->all());
        $service->save();
        return redirect()->back();
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
        $service = medical_service::query()
                    ->where('medical_service_id', '=', $id)
                    ->first();
        if($service){
            $service->fill($request->all());
            $service->save();
            $message = "true";
        }else{
            $message = "false";
        }

        // return $service;
        return $message ? redirect()->back()->with("message", "Successfully Updated") 
                        : redirect()->back()->with("message", "Failure to Update") ;
    }

    public function destroy($id)
    {        
        $service = medical_service::query()
            ->where('medical_service_id', '=', $id)
            ->first();
    
        if($service){
            $service->delete();
            $message = "true";
        }else{
            $message = "false";
        }

        // return $message;

        toastr()->success('Doctor schedule added!');
        return $message ? redirect()->back()->with("message", "Successfully Deleted") 
                        : redirect()->back()->with("message", "Failure to Delete") ;
            
    }
}
