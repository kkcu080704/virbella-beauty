<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // KITA HARUS DAFTARKAN SEMUA KOLOM YANG BOLEH DIISI DISINI
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'excerpt',
        'isi',
        'gambar',
    ];
}