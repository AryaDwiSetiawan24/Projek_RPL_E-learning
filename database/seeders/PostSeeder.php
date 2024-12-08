<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user dan kategori
        $users = User::all();
        $categories = Category::all();

        $categoriesSlugs = ['kelas-x', 'kelas-xi', 'kelas-xii'];

        // Tambahkan mapel bahasa inggris
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Bahasa Inggris',
                'author_id' => $users->where('email', 'bintang11@gmail.com')->first()->id, 
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'bahasa-inggris-'. $slug,
                'body' => fake()->text(),
            ]);
        }

        // Tambahkan mapel Matematika
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Matematika',
                'author_id' => $users->where('email', 'guru1@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'matematika-'. $slug,
                'body' => fake()->text(),
            ]);
        }

        // Tambahkan mapel Agama
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Pendidikan Agama',
                'author_id' => $users->where('email', 'guru2@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'agama-'. $slug,
                'body' => fake()->text(),
            ]);
        }

        // Tambahkan mapel Bahasa Indonesia
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Bahasa Indonesia',
                'author_id' => $users->where('email', 'guru3@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'indonesia-'. $slug,
                'body' => fake()->text(),
            ]);
        }

        // Tambahkan mapel Prakarya
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Prakarya dan Kewirausahaan',
                'author_id' => $users->where('email', 'guru4@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'prakarya-'. $slug,
                'body' => fake()->text(),
            ]);
        }
    }
}
