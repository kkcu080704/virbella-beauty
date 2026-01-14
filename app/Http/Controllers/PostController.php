<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // 1. INDEX (Daftar)
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        return view('admin.posts.create');
    }

    // 3. STORE (Simpan Baru)
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|min:5',
            'isi'      => 'required|min:10',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required',
            'excerpt'  => 'required|max:150',
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul, '-'),
            'kategori' => $request->kategori,
            'excerpt'  => $request->excerpt,
            'isi'      => $request->isi,
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('posts', $image->hashName());
            $data['gambar'] = 'posts/' . $image->hashName();
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    // 4. EDIT (Form Edit) - BARU
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    // 5. UPDATE (Simpan Perubahan) - BARU
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul'    => 'required|min:5',
            'isi'      => 'required|min:10',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required',
            'excerpt'  => 'required|max:150',
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul, '-'),
            'kategori' => $request->kategori,
            'excerpt'  => $request->excerpt,
            'isi'      => $request->isi,
        ];

        // Cek jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama agar hemat memori
            if ($post->gambar) {
                Storage::delete($post->gambar);
            }

            $image = $request->file('gambar');
            $image->storeAs('posts', $image->hashName());
            $data['gambar'] = 'posts/' . $image->hashName();
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // 6. DESTROY (Hapus) - BARU
    public function destroy(Post $post)
    {
        // Hapus gambar fisiknya dulu
        if ($post->gambar) {
            Storage::delete($post->gambar);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus!');
    }
}