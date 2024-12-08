<?php

namespace Database\Seeders;

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
        $this->call([
            CategorySeeder::class, 
            UserSeeder::class,
            PostSeeder::class,
        ]);

        // tambah data dummy
        // Post::factory(99)->recycle([
        //     Category::all(),
        //     User::all()
        // ])->create();
    }
}
