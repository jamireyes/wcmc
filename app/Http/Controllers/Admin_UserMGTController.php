<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class Admin_UserMGTController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'email' => 'required',
            'username' => 'required',
            'contact_no' => 'required'
        ]);

        $data = User::find($id);
        $data->role_id = $request->input('role_id');
        $data->email = $request->input('email');
        $data->username = $request->input('username');
        $data->contact_no = $request->input('contact_no');
        $data->save();

        if($validator->fails()){
            return redirect()->route('admin.user_mgt', ['name' => Auth::user()->username])->withErrors($validator);
        }

        return redirect()->route('admin.user_mgt', ['name' => Auth::user()->username]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        toastr()->info('User Account Deleted!', 'Notification');
        return redirect()->route('admin.user_mgt', ['name' => Auth::user()->username]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id)->restore();
        toastr()->info('User Account Restored!', 'Notification');
        return redirect()->route('admin.user_mgt', ['name' => Auth::user()->username]);
    }
}
