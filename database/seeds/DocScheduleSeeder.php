<?php

use Illuminate\Database\Seeder;
use App\doctor_schedule;
use Carbon\Carbon;

class DocScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'doctor_id' => 4,
                'day' => "MON,WED,FRI",     //"MON,WED,FRI",
                'start_time' => '8:00',
                'end_time' => '12:00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'doctor_id' => 4,
                'day' => "TUES,THUR",
                'start_time' => '13:00',
                'end_time' => '17:00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];
        doctor_schedule::insert($data);
    }
}
