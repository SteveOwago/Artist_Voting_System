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
                'name'         => 'Nairobi',
            ],
            [
                'id'                 => 2,
                'name'         => 'Rift',
            ],
            [
                'id'                 => 3,
                'name'         => 'Western',
            ],
            [
                'id'                 => 4,
                'name'         => 'Coast',
            ],
            [
                'id'                 => 5,
                'name'         => 'Upper Eastern',
            ],
            [
                'id'                 => 6,
                'name'         => 'Lower Eastern',
            ],
            [
                'id'                 => 7,
                'name'         => 'Nyanza',
            ],
            [
                'id'                 => 8,
                'name'         => 'Meru',
            ],
            [
                'id'                 => 9,
                'name'         => 'Kiambu',
            ],
            [
                'id'                 => 10,
                'name'         => 'Thika',
            ],
            [
                'id'                 => 11,
                'name'         => 'Nyeri',
            ],
        ];
        Region::insert($regions);
    }
}
