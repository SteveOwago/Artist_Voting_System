<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($x=0; $x<200;$x++){
            Vote::create([
                'ip_address' => mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255),
                'artist_id' => mt_rand(1,13),
                'name'=> 'Voter'.mt_rand(1,200),
                'email' => 'somebody'.mt_rand(1,200).'@example.com' ,
                'region_id' => mt_rand(1,7),
            ]);
        }
    }
}
