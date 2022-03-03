<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            [
                'id'                 => 1,
                'reason'         => 'Poor Audio',
            ],
            [
                'id'                 => 2,
                'reason'         => 'Low Confidence',
            ],
            [
                'id'                 => 3,
                'reason'         => 'Poor Flow of rhythm',
            ],
            [
                'id'                 => 4,
                'reason'         => 'Other',
            ],
        ];
        Reason::insert($reasons);
    }
}
