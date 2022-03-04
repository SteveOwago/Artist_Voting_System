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
                'title'         => 'Mount Kenya Auditions',
                'start_date'       => '2022-02-01 08:00:00',
                'end_date'       => '2022-03-31 23:59:00',
                'status' =>1,
                'region_id' =>11,
                'phase_id' =>1,
                'venue' => 'City Hall Nyeri Town',
            ],
            [
                'id'                 => 2,
                'title'         => 'Lake Region Auditions',
                'start_date'       => '2022-02-01 08:00:00',
                'end_date'       => '2022-03-31 23:59:00',
                'status' =>1,
                'region_id' =>7,
                'phase_id' =>1,
                'venue' => 'City Square Kisumu'
            ],
        ];
        Activity::insert($activities);
    }
}
