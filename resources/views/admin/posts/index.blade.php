<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Artikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-virbella-darkpink">Daftar Artikel</h3>
                        <a href="{{ route('posts.create') }}" class="bg-virbella-darkpink text-white px-4 py-2 rounded-md hover:bg-pink-700 text-sm">
                            + Tulis Artikel Baru
                        </a>
                    </div>

                    <table class="w-full border-collapse border border-gray-200">
                        <thead class="bg-pink-50">
                            <tr>
                                <th class="border p-3 text-left">Judul</th>
                                <th class="border p-3 text-left">Kategori</th>
                                <th class="border p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">
                                    <div class="font-bold text-gray-700">{{ $post->judul }}</div>
                                    <div class="text-xs text-gray-500">Slug: {{ $post->slug }}</div>
                                </td>
                                <td class="border p-3">
                                    <span class="bg-pink-100 text-virbella-darkpink px-2 py-1 rounded text-xs font-bold">
                                        {{ $post->kategori }}
                                    </span>
                                </td>
                                <td class="border p-3 text-center">
    <div class="flex justify-center items-center space-x-2">
        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
            Edit
        </a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">
                Hapus
            </button>
        </form>
    </div>
</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>