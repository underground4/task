<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(5)->withRoleUser()->withRoleAdmin()->create();
        User::factory(5)->withRoleUser()->withRoleEditor()->create();
        User::factory(5)->withRoleUser()->create();
        User::factory(5)->withRoleAdmin()->create();
        User::factory(5)->withRoleEditor()->create();
    }
}
