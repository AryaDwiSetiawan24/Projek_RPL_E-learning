<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat categori 'dumy' (data acak)
        // Category::factory(3)->create();

        // membuat category kelas x,xi,xii
        $categories = [
            ['name' => 'Kelas X', 'color' => 'blue'],
            ['name' => 'Kelas XI', 'color' => 'yellow'],
            ['name' => 'Kelas XII', 'color' => 'red'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'color' => $category['color'],
                ]
            );
        }
    }
}
