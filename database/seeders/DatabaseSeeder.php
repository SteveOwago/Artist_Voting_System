<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PhasesTableSeeder::class,
            RegionsTableSeeder::class,
            ReasonsTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            ActivitiesTableSeeder::class,
            VotesTableSeeder::class,
        ]);
    }
}
