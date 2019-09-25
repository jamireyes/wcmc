<?php

use Illuminate\Database\Seeder;
use App\doctor_schedule;

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
                'doctor_id' => 2,
                'day' => 'MON',
                'start_time' => '8:00 AM',
                'end_time' => '12:00 PM',
            ],
            [
                'doctor_id' => 2,
                'day' => 'WED',
                'start_time' => '8:00 AM',
                'end_time' => '12:00 PM',
            ],
            [
                'doctor_id' => 2,
                'day' => 'FRI',
                'start_time' => '8:00 AM',
                'end_time' => '12:00 PM',
            ]
        ];
        doctor_schdule::insert($data);
    }
}
