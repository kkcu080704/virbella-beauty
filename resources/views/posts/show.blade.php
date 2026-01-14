<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->judul }} - Virbella Beauty</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-50/50 font-sans text-gray-700 antialiased">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ url('/') }}" class="text-2xl font-serif font-bold text-virbella-darkpink tracking-wider hover:opacity-80 transition">
                    Virbella<span class="text-virbella-gold">Beauty</span>
                </a>
                <a href="{{ url('/') }}" class="text-xs md:text-sm font-bold text-gray-500 hover:text-virbella-darkpink transition uppercase tracking-wide flex items-center">
                    <span class="mr-2">&larr;</span> Kembali ke Home
                </a>
            </div>
        </div>
    </nav>

    <article class="max-w-4xl mx-auto bg-white min-h-screen shadow-2xl shadow-pink-100 overflow-hidden relative mt-6 mb-12 rounded-xl">
        
        <div class="h-[400px] w-full relative bg-gray-200 group">
            
            {{-- Logika Gambar: Upload vs Dummy --}}
            @if($post->gambar)
                <img src="{{ asset('storage/' . $post->gambar) }}" class="w-full h-full object-cover">
            @else
                <img src="https://images.unsplash.com/photo-1596462502278-27bfdd403348?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover">
            @endif
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full text-white">
                <span class="bg-virbella-gold text-white px-3 py-1 text-xs font-bold uppercase tracking-wider rounded mb-4 inline-block shadow-sm">
                    {{ $post->kategori }}
                </span>
                
                <h1 class="text-3xl md:text-5xl font-serif font-bold leading-tight mb-3 shadow-sm">
                    {{ $post->judul }}
                </h1>
                
                <div class="flex items-center text-gray-300 text-sm font-light space-x-4">
                    <span>Ditulis pada {{ $post->created_at->format('d M Y') }}</span>
                    <span>&bull;</span>
                    <span>Oleh Admin Virbella</span>
                </div>
            </div>
        </div>

        <div class="p-8 md:p-12 leading-loose text-lg text-gray-700">
            <div class="prose prose-pink prose-lg max-w-none 
                        first-letter:text-5xl first-letter:font-serif first-letter:font-bold 
                        first-letter:text-virbella-darkpink first-letter:mr-3 first-letter:float-left">
                {!! $post->isi !!}
            </div>
        </div>

        <div class="bg-pink-50 p-8 md:p-12 text-center border-t border-pink-100">
            <h3 class="font-serif italic text-2xl text-gray-700 mb-6">Suka dengan artikel ini? Bagikan yuk!</h3>
            
            <div class="flex flex-col md:flex-row justify-center items-center space-y-3 md:space-y-0 md:space-x-4">
                
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                   target="_blank"
                   class="w-full md:w-auto bg-[#1877F2] text-white border border-blue-700 px-8 py-3 rounded-full text-sm font-bold hover:bg-blue-800 hover:shadow-lg transition flex items-center justify-center transform hover:-translate-y-1">
                   <svg class="w-5 h-5 mr-2 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                   Share to Facebook
                </a>

                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->judul) }}&url={{ urlencode(url()->current()) }}" 
                   target="_blank"
                   class="w-full md:w-auto bg-black text-white border border-gray-800 px-8 py-3 rounded-full text-sm font-bold hover:bg-gray-800 hover:shadow-lg transition flex items-center justify-center transform hover:-translate-y-1">
                   <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                   Share to X
                </a>

            </div>
            
            <div class="mt-10">
                <a href="{{ url('/') }}" class="text-virbella-darkpink font-bold hover:underline text-xs uppercase tracking-widest">
                    &larr; Baca artikel lainnya
                </a>
            </div>
        </div>

    </article>

    <footer class="text-center py-8 text-gray-400 text-sm">
        &copy; 2026 Virbella Beauty. Shine Your Inner Gold.
    </footer>

</body>
</html>