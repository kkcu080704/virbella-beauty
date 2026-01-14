<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| 1. HALAMAN PUBLIK (Pengunjung)
|--------------------------------------------------------------------------
*/

// Halaman Depan (Homepage)
Route::get('/', function () {
    // Ambil semua artikel terbaru
    $posts = Post::latest()->get(); 
    return view('welcome', compact('posts'));
})->name('home');

// Halaman Baca Detail Artikel
// Halaman Baca Detail Artikel
Route::get('/read/{post:slug}', function (App\Models\Post $post) {
    return view('posts.show', compact('post'));
})->name('posts.show');


/*
|--------------------------------------------------------------------------
| 2. HALAMAN ADMIN / DASHBOARD (Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    // Nanti tambahkan Route Resource untuk CRUD Artikel di sini
    
});

require __DIR__.'/auth.php';