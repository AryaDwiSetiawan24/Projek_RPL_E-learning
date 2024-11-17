<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);

        Post::factory(99)->recycle([
            Category::all(),
            User::all()
        ])->create();

        // $comp= User::all()->except($vend->id->random());

        // Post::create([
        //     'title' => 'Bahasa Inggris',
        //     'author_id' => User::factory(),
        //     'category_id' => Category::factory(),
        //     'slug' => 'bahasa-inggris',
        //     'body' => fake()->text()
        // ]);
    }
}
