<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin Virbella (Bisa Login Langsung)
        User::factory()->create([
            'name' => 'Admin Virbella',
            'email' => 'admin@virbella.com',
            'password' => bcrypt('password'), // Password login: password
            // Jika nanti nambah kolom role, tambahkan: 'role' => 'admin'
        ]);

        // 2. Panggil Seeder Artikel
        $this->call([
            PostSeeder::class,
        ]);
    }
}