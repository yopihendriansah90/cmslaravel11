<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('blogs')->truncate();


    // for($i=1;$i<=10;$i++){
        
    //     DB::table('blogs')->insert([
    //         'title'=>"blog {$i}",
    //         'description'=>"ini adalah descrioptsion {$i}",
    //     ]);
    // }
        Blog::factory()
        ->count(30)
        ->create();
       

}
}
