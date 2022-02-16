<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'id'                 => 1,
                'name'         => 'Nyanza',
            ],
            [
                'id'                 => 2,
                'name'         => 'Coast',
            ],
            [
                'id'                 => 3,
                'name'         => 'Central',
            ],
            [
                'id'                 => 4,
                'name'         => 'Rift Valley',
            ],
            [
                'id'                 => 5,
                'name'         => 'Western',
            ],
            [
                'id'                 => 6,
                'name'         => 'North Eastern',
            ],
            [
                'id'                 => 7,
                'name'         => 'Nairobi',
            ],
        ];
        Region::insert($regions);
    }
}
