<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'DevChase') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900 leading-relaxed antialiased">

    {{-- Header --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold text-red-700">DevChase</a>
            <nav class="flex space-x-4 text-sm font-medium">
                <a href="/" class="hover:text-red-600 {{ request()->is('/') ? 'text-red-700' : 'text-gray-700' }}">Home</a>
                <a href="/blog" class="hover:text-red-600 {{ request()->is('blog*') ? 'text-red-700' : 'text-gray-700' }}">Blog</a>
                <a href="/projects" class="hover:text-red-600 {{ request()->is('projects*') ? 'text-red-700' : 'text-gray-700' }}">Projects</a>
                <a href="/about" class="hover:text-red-600 {{ request()->is('about') ? 'text-red-700' : 'text-gray-700' }}">About</a>
            </nav>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="py-12">
        {{ $slot }}
    </main>

    {{-- Footer (optional) --}}
    <footer class="text-center text-sm text-gray-500 py-10">
        © {{ date('Y') }} DevChase. Built in faith. Learning in public.
    </footer>

</body>
</html>
