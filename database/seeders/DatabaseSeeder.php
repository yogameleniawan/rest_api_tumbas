<?php

namespace Database\Seeders;

use App\Models\CategoryTask;
use App\Models\Task;
use Database\Factories\TaskFactory;
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
        $this->call(CategoryTaskSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
