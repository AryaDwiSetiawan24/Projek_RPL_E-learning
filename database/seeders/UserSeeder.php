<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arya Dwi Setiawan',
            'username' => 'aryadwis24',
            'email' => 'aryadwis24@gmail.com',
            'usertype' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Bintang Aryasatya',
            'username' => 'bintang11',
            'email' => 'bintang11@gmail.com',
            'usertype' => 'guru',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        
        User::create([
            'name' => 'Radju Alfarizi Amahala',
            'username' => 'radju61',
            'email' => 'radju61@gmail.com',
            'usertype' => 'siswa',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        // Buat user otomatis menggunakan faker
        // User::factory(5)->create();
    }
}
