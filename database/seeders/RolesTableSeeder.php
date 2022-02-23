<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'                 => 1,
                'title'         => 'Judge',
            ],
            [
                'id'                 => 2,
                'title'         => 'Artist',
            ],
            [
                'id'                 => 3,
                'title'         => 'Sportstar',
            ],

        ];
        Role::insert($roles);
    }
}
