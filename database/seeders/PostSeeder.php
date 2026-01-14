<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan folder penyimpanan 'posts' di storage ada
        // Ini membuat folder: storage/app/public/posts
        if (!Storage::disk('public')->exists('posts')) {
            Storage::disk('public')->makeDirectory('posts');
        }

        // 2. Data Artikel + Nama File Gambar Mentahannya
        $posts = [
            [
                'judul' => 'Rahasia Kulit Glowing dalam 7 Hari: Rutinitas Pagi & Malam',
                'slug' => 'rahasia-kulit-glowing-7-hari',
                'kategori' => 'Tips Skincare',
                'excerpt' => 'Ingin kulit bercahaya tanpa perawatan mahal? Simak panduan lengkap step-by-step skincare rutin untuk pemula.',
                'isi' => '<p>Mendapatkan kulit <strong>Glass Skin</strong> ala Korea tidak harus mahal. Kuncinya adalah konsistensi dan hidrasi.</p><h3>Rutinitas Pagi</h3><ul><li><strong>Gentle Cleanser:</strong> Cuci muka dengan sabun lembut.</li><li><strong>Vitamin C:</strong> Mencerahkan noda.</li><li><strong>Sunscreen:</strong> Wajib!</li></ul>',
                'gambar_file' => '1.png', // <--- Wajib sama dengan nama file di folder public/seeder-images
            ],
            [
                'judul' => 'Review Virbella Gold Serum: Mewah Tapi Terjangkau?',
                'slug' => 'review-virbella-gold-serum',
                'kategori' => 'Review Produk',
                'excerpt' => 'Kami mencoba serum viral dengan kandungan emas 24k selama sebulan penuh. Apakah hasilnya sepadan?',
                'isi' => '<p>Serum dengan kandungan emas seringkali mahal. Namun, <strong>Virbella Gold Serum</strong> berbeda.</p><blockquote><p>"Teksturnya ringan, cepat meresap, dan memberikan efek instant glow."</p></blockquote>',
                'gambar_file' => '2.png',
            ],
            [
                'judul' => 'Tren Makeup 2026: Kembali ke Natural & Flawless',
                'slug' => 'tren-makeup-2026-natural',
                'kategori' => 'Tren Makeup',
                'excerpt' => 'Lupakan makeup tebal! Tahun ini adalah tentang menonjolkan kecantikan alami Anda dengan teknik "No-Makeup" makeup.',
                'isi' => '<p>Tren <em>Heavy Contouring</em> sudah lewat. Sekarang era <strong>Skinmalism</strong>.</p><ol><li>Skin Tint pengganti Foundation.</li><li>Cream Blush untuk rona alami.</li></ol>',
                'gambar_file' => '3.png',
            ],
            [
                'judul' => '5 Kesalahan Pakai Sunscreen yang Bikin Wajah Kusam',
                'slug' => 'kesalahan-pakai-sunscreen',
                'kategori' => 'Edukasi',
                'excerpt' => 'Sudah pakai sunscreen tapi kulit masih belang? Mungkin cara pakai kamu yang salah. Cek faktanya di sini!',
                'isi' => '<p>Kesalahan umum pengguna sunscreen:</p><ul><li>Hanya pakai sekali sehari.</li><li>Takaran terlalu sedikit (Harus 2 jari).</li></ul>',
                'gambar_file' => '4.png',
            ],
        ];

        // 3. Loop untuk Simpan Data & Copy Gambar
        foreach ($posts as $item) {
            
            // Tentukan jalur file asal (mentahan)
            $sourcePath = public_path('seeder-images/' . $item['gambar_file']);
            
            // Tentukan nama file tujuan di database (posts/namafile.jpg)
            $dbPath = 'posts/' . $item['gambar_file'];

            // Cek: Apakah file mentahan ada?
            if (File::exists($sourcePath)) {
                // COPY file dari folder public ke storage
                Storage::disk('public')->put($dbPath, File::get($sourcePath));
            } else {
                // Jaga-jaga kalau lupa naruh gambar, set null
                $dbPath = null;
            }

            // Simpan ke Database (Tanpa kolom 'gambar_file' karena itu cuma bantuan)
            Post::create([
                'judul' => $item['judul'],
                'slug' => $item['slug'],
                'kategori' => $item['kategori'],
                'excerpt' => $item['excerpt'],
                'isi' => $item['isi'],
                'gambar' => $dbPath, // Path yang sudah siap dipakai
            ]);
        }
    }
}