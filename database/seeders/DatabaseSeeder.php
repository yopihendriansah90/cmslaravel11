<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Error ini terjadi karena UserSeeder dan BlogSeeder belum di-import atau tidak ditemukan.

        $this->call([
            UserSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
