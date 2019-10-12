<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\doctor_schedule;

class DoctorSchedController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required',
            'day' => 'required',
            'time_schedule' => 'required'
        ]);
        
        $days = implode(',', $request->input('day'));
        
        if ($request->input('time_schedule') == 1) {
            $start_time = '9:00';
            $end_time = '12:00';
        } elseif ($request->input('time_schedule') == 2) {
            $start_time = '13:00';
            $end_time = '17:00';
        }
        
        $data = new doctor_schedule;
        $data->doctor_id = $request->input('doctor_id');
        $data->day = $days;
        $data->start_time = $start_time;
        $data->end_time = $end_time;
        $data->save();
        
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
        $days = $request->input('day');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');

        if ($validator->fails()) {

            toastr()->warning('Missing entries');

        } else {
            
            foreach($days as $day){
                $query = doctor_schedule::where('doctor_id', $doctor_id)
                        ->where('day', $day)
                        ->where('start_time', $start_time)
                        ->where('end_time', $end_time);
                if ($query->exists()) {
                    toastr()->error('Record conflicts with an exising schedule!');
                    return redirect()->back();
                }
            }

            $data = doctor_schedule::find($id);
                    $data->doctor_id = $doctor_id;
                    $data->day = implode(',', $days);
                    $data->start_time = $start_time;
                    $data->end_time = $end_time;
                    $data->save();

            toastr()->success('Doctor schedule updated!');
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
