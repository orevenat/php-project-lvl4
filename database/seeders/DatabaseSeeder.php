<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $statuses = ['new', 'finished', 'processing', 'testing'];
        foreach ($statuses as $status) {
            TaskStatus::firstOrCreate(['name' => $status]);
        }
    }
}
