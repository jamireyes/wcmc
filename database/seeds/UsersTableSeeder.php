<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => 1,
                'email' => 'admin@mail.com',
                'contact_no' => '09171358000',
                'username' => 'admin',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 4,
                'email' => 'nurse@mail.com',
                'contact_no' => '09171358000',
                'username' => 'nurse',
                'password' => bcrypt('secret'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        User::insert($users);

        $users2 = [
            [
                'role_id' => 2,
                'username' => 'johndoe',
                'password' => bcrypt('secret'),
                'email' => 'johndoe@mail.com',
                'contact_no' => '09171358001',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'middle_name' => 'Michael',
                'sex' => 'MALE',
                'birthday' => '1997-02-18',
                'citizenship' => 'FILIPINO',
                'civil_status' => 'SINGLE',
                'address_line_1' => 'Apas',
                'address_line_2' => 'Cebu City',
                'bloodtype_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'username' => 'doctor',
                'password' => bcrypt('secret'),
                'email' => 'doctor@mail.com',
                'contact_no' => '09171358002',
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'middle_name' => 'Santos',
                'sex' => 'MALE',
                'birthday' => '1990-05-14',
                'citizenship' => 'FILIPINO',
                'civil_status' => 'SINGLE',
                'address_line_1' => 'Lahug',
                'address_line_2' => 'Cebu City',
                'bloodtype_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'username' => 'doctor1',
                'password' => bcrypt('secret'),
                'email' => 'doctor1@mail.com',
                'contact_no' => '09171358011',
                'first_name' => 'Fernando',
                'last_name' => 'Villaflores',
                'middle_name' => 'Concepcion',
                'sex' => 'MALE',
                'birthday' => '1985-06-12',
                'citizenship' => 'FILIPINO',
                'civil_status' => 'SINGLE',
                'address_line_1' => 'Banilad',
                'address_line_2' => 'Cebu City',
                'bloodtype_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'username' => 'doctor2',
                'password' => bcrypt('secret'),
                'email' => 'doctor2@mail.com',
                'contact_no' => '09171358011',
                'first_name' => 'Maria',
                'last_name' => 'Josefina',
                'middle_name' => 'Napoles',
                'sex' => 'FEMALE',
                'birthday' => '1984-12-12',
                'citizenship' => 'FILIPINO',
                'civil_status' => 'SINGLE',
                'address_line_1' => 'Talamban',
                'address_line_2' => 'Cebu City',
                'bloodtype_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        User::insert($users2);
    }
}
