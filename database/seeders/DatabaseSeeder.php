<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
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
        User::factory()->create([
            "name"      =>  "spike",
            "email"     =>  "spike@spiegel.com"
        ]);

        User::factory()->create([
            "name"      =>  "testuser",
            "email"     =>  "user@test.com"
        ]);

        Project::factory(200)->create();
    }
}
