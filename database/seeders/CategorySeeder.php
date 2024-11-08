<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();
        
        Category::create([
            'name' => 'Bahasa Inggris',
            'slug' => 'bahasa-inggris',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Agama',
            'slug' => 'agama',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Fisika',
            'slug' => 'fisika',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Kimia',
            'slug' => 'kimia',
            'color' => 'yellow'
        ]);

        Category::create([
            'name' => 'Teknologi Informaasi',
            'slug' => 'teknologi-informasi',
            'color' => 'purple'
        ]);
    }
}
