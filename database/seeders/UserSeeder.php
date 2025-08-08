<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->truncate();
              User::factory()
            ->count(5)
            ->create();
       
        // for($i=1;$i<=10;$i++){

        //     DB::table('users')->insert([
        //         'name' => "Test User{$i}",
        //         'email' => "test{$i}@example.com",
        //         'password' => Hash::make('123'),
        //     ]);
          
        // }
    
    }
}
