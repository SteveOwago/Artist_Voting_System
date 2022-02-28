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
                'status'    =>1,
            ],
            [
                'id'                 => 2,
                'title'         => 'Round Two',
                'status'    =>0,
            ],
            [
                'id'                 => 3,
                'title'         => 'Semi Final',
                'status'    =>0,
            ],
            [
                'id'                 => 4,
                'title'         => 'Finalist',
                'status'    =>0,
            ],
        ];
        Phase::insert($phases);
    }
}
