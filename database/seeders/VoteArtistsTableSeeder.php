<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoteArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x<=2000; $x++){
            \DB::table('votes_artists')->insert([
                'artist_id'=> mt_rand(1,19),
                'outlet_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'phone' => '2547'.mt_rand(1000,9999).mt_rand(1000,9999),

            ]);
        }
    }
}
