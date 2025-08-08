<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=[
            'PHP',
            'HTML',
            'CSS',
            'Laravel',
            'Javascript',
            'Web Development',
            'Programming',
            'Database',
            'API',
            'Vue.js',
            'React.js',
            'Frontend',
            'Backend',
            'Fullstack',
        ];


        
        foreach ($tags as $tag) {
          Tag::create(['name' => $tag]);
        }
        
    }
}
