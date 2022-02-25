<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            [
                'id'                 => 1,
                'title'         => 'Registration',
                'start_date'       => '2022-02-01 00:00:00',
                'end_date'       => '2022-03-31 23:59:00',
            ],
            [
                'id'                 => 2,
                'title'         => 'Voting',
                'start_date'       => '2022-04-01 00:00:00',
                'end_date'       => '2022-05-31 23:59:00',
            ],
        ];
        Activity::insert($activities);
    }
}
