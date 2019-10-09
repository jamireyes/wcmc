<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\doctor_schedule;

class DoctorSchedController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $days = $request->input('day');
        
        foreach($days as $day){
            $data = new doctor_schedule;
            $data->doctor_id = $request->input('doctor_id');
            $data->day = $day;
            $data->start_time = $request->input('start_time');
            $data->end_time = $request->input('end_time');
            $data->save();
        }
        
        toastr()->success('New doctor schedule created!');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $doctor_id = $request->input('doctor_id');
        $day = $request->input('day');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        if ($validator->fails()) {
            toastr()->warning('Validation failed :/', 'Error!');
        } else {
            $query = doctor_schedule::where('doctor_id', $doctor_id)
                        ->where('day', $day)
                        ->where('start_time', $start_time)
                        ->where('end_time', $end_time);
            if ($query->doesntExist()) {
                $data = doctor_schedule::find($id);
                $data->doctor_id = $doctor_id;
                $data->day = $day;
                $data->start_time = $start_time;
                $data->end_time = $end_time;
                $data->save();

                toastr()->success('Doctor schedule updated!');
            } else {
                toastr()->error('Record already exists!');
            }
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = doctor_schedule::find($id)->delete();
        toastr()->error('Doctor schedule deleted!');

        return redirect()->back();
    }

    public function restore($id)
    {
        $data = doctor_schedule::withTrashed()->find($id)->restore();
        toastr()->info('Doctor schedule restored!');

        return redirect()->back();
    }
}
