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
                'title'         => 'Stage One',
            ],
            [
                'id'                 => 2,
                'title'         => 'Stage Two',
            ],
        ];
        Phase::insert($phases);
    }
}
