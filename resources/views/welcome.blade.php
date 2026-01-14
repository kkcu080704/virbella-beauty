<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Virbella Beauty - Shine Your Inner Gold</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-virbella-pink/30 font-sans text-virbella-text antialiased">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="text-3xl font-serif font-bold text-virbella-darkpink tracking-wider">
                    Virbella<span class="text-virbella-gold">Beauty</span>
                </div>
                <div class="space-x-8">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-virbella-darkpink transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-virbella-darkpink transition font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-virbella-darkpink text-white px-5 py-2 rounded-full hover:bg-pink-700 transition shadow-lg shadow-pink-500/30">Join Us</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto py-24 px-4 text-center relative z-10">
            <span class="text-virbella-gold font-bold tracking-[0.2em] uppercase text-sm mb-4 block">Premium Beauty Blog</span>
            <h1 class="text-5xl md:text-7xl font-serif font-bold text-gray-900 mb-6 leading-tight">
                Unlock Your <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-virbella-gold to-yellow-600">Golden Glow</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10 font-light">
                Temukan tips kecantikan terbaik, review jujur, dan inspirasi gaya hidup modern bersama Virbella.
            </p>
        </div>
        <div class="absolute top-0 left-0 w-64 h-64 bg-virbella-pink rounded-full blur-3xl opacity-50 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-50 translate-x-1/3 translate-y-1/3"></div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-serif font-bold text-gray-800 mb-10 text-center relative">
            Latest Articles
            <div class="w-16 h-1 bg-virbella-gold mx-auto mt-4"></div>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($posts as $post)
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-pink-50 group">
                
                <div class="h-64 bg-gray-200 overflow-hidden relative">
                    @if($post->gambar)
                        <img src="{{ asset('storage/' . $post->gambar) }}" 
                             alt="{{ $post->judul }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    @else
                        <img src="https://images.unsplash.com/photo-1596462502278-27bfdd403348?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                             alt="Dummy Image"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    @endif

                    <div class="absolute top-4 left-4 bg-white/90 px-3 py-1 rounded-full text-xs font-bold text-virbella-darkpink uppercase tracking-wide">
                        {{ $post->kategori }}
                    </div>
                </div>
                
                <div class="p-8">
                    <h3 class="text-2xl font-serif font-bold text-gray-800 mb-3 group-hover:text-virbella-darkpink transition">
                        {{ $post->judul }}
                    </h3>
                    <p class="text-gray-500 leading-relaxed mb-6 font-light">
                        {{ $post->excerpt }}
                    </p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-virbella-gold font-bold uppercase text-sm tracking-wider hover:underline">
                        Read More <span class="ml-2">&rarr;</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-12 text-center mt-12">
        <div class="text-2xl font-serif font-bold text-virbella-gold mb-4">Virbella Beauty</div>
        <p class="text-gray-400 text-sm">&copy; 2026 Virbella Beauty. All rights reserved.</p>
    </footer>
</body>
</html>