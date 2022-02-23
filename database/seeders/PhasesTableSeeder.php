<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Seeder;

class PhasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phases = [
            [
                'id'                 => 1,
                'title'         => 'Round One',
            ],
            [
                'id'                 => 2,
                'title'         => 'Round Two',
            ],
            [
                'id'                 => 3,
                'title'         => 'Semi Final',
            ],
            [
                'id'                 => 4,
                'title'         => 'Finalist',
            ],
        ];
        Phase::insert($phases);
    }
}
