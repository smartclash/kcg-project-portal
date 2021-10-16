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
        $students = User::factory()->count(150)->student()->create();
        $mentors = User::factory()->count(30)->mentor()->create();
        $heads = User::factory()->count(5)->head()->create();
        $admin = user::factory()->count(3)->admin()->create();
    }
}
