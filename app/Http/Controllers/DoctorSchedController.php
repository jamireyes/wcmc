<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor_schedule;

class DoctorSchedController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        
        
        $data = new doctor_schedule;
        $data->doctor_id = $request->input('doctor_id');
        $data->day = implode(',', $request->input('day'));
        $data->start_time = $request->input('start_time');
        $data->end_time = $request->input('end_time');

        if(!$data->save()){
            toastr()->warning('Something seems to be wrong :/', 'Error!');
        } else {
            toastr()->success('New doctor schedule created!', 'Successful!');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        if($validator->fails()){
            toastr()->warning('Validation failed :/', 'Error!');
        } else {
            $data = doctor_schedule::find($id);
            $data->doctor_id = $request->input('doctor_id');
            $data->day = $request->input('day');
            $data->start_time = $request->input('start_time');
            $data->end_time = $request->input('end_time');
            
            if(!$data->save()){
                toastr()->warning('Something seems to be wrong :/', 'Error!');
            } else {
                toastr()->success('New doctor schedule created!', 'Successful!');
            }
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = doctor_schedule::find($id)->delete();
        toastr()->warning('Doctor schedule deleted!', 'Notification!');

        return redirect()->back();
    }

    public function restore($id)
    {
        $data = doctor_schedule::find($id)->restore();
        toastr()->info('Doctor schedule restored!', 'Notification!');

        return redirect()->back();
    }
}
