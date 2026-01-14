<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Artikel Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                            <input type="text" name="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-virbella-gold focus:ring-virbella-gold transition" placeholder="Contoh: Rahasia Wajah Glowing..." required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select name="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-virbella-gold focus:ring-virbella-gold">
                                    <option value="Tips Skincare">Tips Skincare</option>
                                    <option value="Review Produk">Review Produk</option>
                                    <option value="Tren Makeup">Tren Makeup</option>
                                    <option value="Edukasi">Edukasi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Cuplikan Pendek (Excerpt)</label>
                                <input type="text" name="excerpt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-virbella-gold focus:ring-virbella-gold" placeholder="Ringkasan singkat untuk tampilan depan..." required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar Utama</label>
                            <input type="file" name="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-virbella-darkpink hover:file:bg-pink-100 transition">
                            <p class="text-xs text-gray-400 mt-1">Format: JPG/PNG. Maks 2MB.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Isi Artikel Lengkap</label>
                            <textarea name="isi" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-virbella-gold focus:ring-virbella-gold" placeholder="Tulis konten lengkap di sini..." required></textarea>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t">
                            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Batal</a>
                            <button type="submit" class="px-6 py-2 bg-virbella-darkpink text-white font-bold rounded-md hover:bg-pink-700 transition shadow-lg shadow-pink-500/30">
                                Terbitkan Artikel
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>