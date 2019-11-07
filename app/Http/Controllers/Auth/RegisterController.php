<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\role;
use App\bloodtype;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:NURSE,ADMIN']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contact_no' => ['required'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'sex' => ['required'],
            'birthday' => ['required'],
            'citizenship' => ['required'],
            'civil_status' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'bloodtype' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'contact_no' => $data['contact_no'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['last_name'].'1234'),
            'role_id' => $data['role_id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'sex' => $data['sex'],
            'birthday' => $data['birthday'],
            'citizenship' => $data['citizenship'],
            'civil_status' => $data['civil_status'],
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'bloodtype' => $data['bloodtype']
        ]);
    }

    public function showRegistrationForm()
    {
        $roles = role::all();
        $items_1 = user::getEnumValues('civil_status');
        $items_2 = user::getEnumValues('sex');
        $bloodtypes = bloodtype::all();

        return view('auth.register', compact('roles', 'items_1', 'items_2', 'bloodtypes'));
    }

    protected function redirectTo() 
    {
        if (Auth::check()) {
            $username = Auth::user()->username;
            if (Auth::user()->role->description == 'ADMIN') {
                $route = '/admin/dashboard'.'/'.$username;
            } elseif (Auth::user()->role->description == 'NURSE') {
                $route = '/nurse/dashboard'.'/'.$username;
            }
        }

        return $route; 
    }
}
