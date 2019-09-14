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
                'password' => bcrypt('adminadmin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 2,
                'email' => 'johndoe@mail.com',
                'contact_no' => '09171358001',
                'username' => 'johndoe',
                'password' => bcrypt('johndoe'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 3,
                'email' => 'doctor@mail.com',
                'contact_no' => '09171358002',
                'username' => 'doctor',
                'password' => bcrypt('doctordoctor'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'role_id' => 4,
                'email' => 'nurse@mail.com',
                'contact_no' => '09171358000',
                'username' => 'nurse',
                'password' => bcrypt('nursenurse'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        User::insert($users);
    }
}
