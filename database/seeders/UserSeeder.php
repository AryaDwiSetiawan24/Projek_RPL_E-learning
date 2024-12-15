<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user otomatis menggunakan faker
        // User::factory(5)->create();

        $categories = Category::all();

        // user admin
        User::firstOrCreate(
            ['username' => 'aryadwis24'], // Kolom untuk memeriksa duplikasi
            [
                'name' => 'Arya Dwi Setiawan',
                'email' => 'aryadwis24@gmail.com',
                'usertype' => 'admin',
                'category_id' => null, // Set category_id menjadi null untuk non-siswa
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        // user guru
        User::firstOrCreate(
            ['username' => 'bintang11'],
            [
                'name' => 'Bintang Aryasatya',
                'email' => 'bintang11@gmail.com',
                'usertype' => 'guru',
                'category_id' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['username' => 'guru1'],
            [
                'name' => 'Guru 1',
                'email' => 'guru1@gmail.com',
                'usertype' => 'guru',
                'category_id' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['username' => 'guru2'],
            [
                'name' => 'Guru 2',
                'email' => 'guru2@gmail.com',
                'usertype' => 'guru',
                'category_id' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['username' => 'guru3'],
            [
                'name' => 'Guru 3',
                'email' => 'guru3@gmail.com',
                'usertype' => 'guru',
                'category_id' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['username' => 'guru4'],
            [
                'name' => 'Guru 4',
                'email' => 'guru4@gmail.com',
                'usertype' => 'guru',
                'category_id' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        // user siswa
        User::firstOrCreate(
            ['username' => 'radju61'],
            [
                'name' => 'Radju Alfarizi Amahala',
                'email' => 'radju61@gmail.com',
                'usertype' => 'siswa',
                'category_id' => $categories->where('slug', 'kelas-x')->first()->id,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
            ['username' => 'siswa1'],
            [
                'name' => 'Siswa 1',
                'email' => 'siswa1@gmail.com',
                'usertype' => 'siswa',
                'category_id' => $categories->where('slug', 'kelas-xi')->first()->id,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        User::firstOrCreate(
            ['username' => 'siswa2'],
            [
                'name' => 'Siswa 2',
                'email' => 'siswa2@gmail.com',
                'usertype' => 'siswa',
                'category_id' => $categories->where('slug', 'kelas-xii')->first()->id,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
