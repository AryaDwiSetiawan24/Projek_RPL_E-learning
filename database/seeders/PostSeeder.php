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
                'slug' => 'inggris-'. $slug,
                'body' => 'Kita akan fokus pada pengembangan kemampuan berbahasa Inggris secara komprehensif, termasuk kemampuan berbahasa lisan dan tulisan yang fasih.',
            ]);
        }

        // Tambahkan mapel Matematika
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Matematika',
                'author_id' => $users->where('email', 'guru1@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'matematika-'. $slug,
                'body' => 'Kita akan menjelajahi konsep-konsep matematika yang lebih kompleks, seperti kalkulus, aljabar linear, dan statistika.',
            ]);
        }

        // Tambahkan mapel Agama
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Pendidikan Agama',
                'author_id' => $users->where('email', 'guru2@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'agama-'. $slug,
                'body' => 'Kita akan melakukan kajian mendalam terhadap teks-teks suci, menganalisis berbagai pandangan keagamaan, dan mengembangkan sikap toleransi dan saling menghormati antar umat beragama.',
            ]);
        }

        // Tambahkan mapel Bahasa Indonesia
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Bahasa Indonesia',
                'author_id' => $users->where('email', 'guru3@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'indonesia-'. $slug,
                'body' => 'Kita akan mempelajari ragam bahasa Indonesia, baik lisan maupun tulisan, serta menggali kekayaan sastra Indonesia.',
            ]);
        }

        // Tambahkan mapel Prakarya
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Prakarya dan Kewirausahaan',
                'author_id' => $users->where('email', 'guru4@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'prakarya-'. $slug,
                'body' => 'Kelas prakarya dan kewirausahaan ini akan membekali kalian dengan keterampilan yang dibutuhkan untuk menciptakan produk yang inovatif dan bernilai jual.',
            ]);
        }

        // Tambahkan mapel Seni
        foreach ($categoriesSlugs as $slug) {
            Post::create([
                'title' => 'Seni Budaya',
                'author_id' => $users->where('email', 'bintang11@gmail.com')->first()->id,
                'category_id' => $categories->where('slug', $slug)->first()->id,
                'slug' => 'seni-'. $slug,
                'body' => 'Kelas seni ini akan membuka kreativitas tanpa batas. Melalui berbagai teknik dan media seni, akan mengeksplorasi diri dan mengekspresikan ide-ide cemerlang.',
            ]);
        }
    }
}
