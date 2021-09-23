<?php

namespace Database\Seeders;

use App\Models\CategoryTask;
use Illuminate\Database\Seeder;

class CategoryTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryTask::factory(5)->create();
    }
}
