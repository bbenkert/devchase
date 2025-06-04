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
                <a href="/" class="text-xl font-bold text-blue-700">DevChase</a>
                <nav class="flex space-x-4 text-sm font-medium">
                    <a
                        href="/"
                        class="hover:text-blue-600 {{ request()->is('/') ? 'text-blue-700' : 'text-gray-700' }}"
                    >
                        Home
                    </a>
                    <a
                        href="/blog"
                        class="hover:text-blue-600 {{ request()->is('blog*') ? 'text-blue-700' : 'text-gray-700' }}"
                    >
                        Blog
                    </a>
                    <a
                        href="/projects"
                        class="hover:text-blue-600 {{ request()->is('projects*') ? 'text-blue-700' : 'text-gray-700' }}"
                    >
                        Projects
                    </a>
                    <a
                        href="/about"
                        class="hover:text-blue-600 {{ request()->is('about') ? 'text-blue-700' : 'text-gray-700' }}"
                    >
                        About
                    </a>
                </nav>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="py-12">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer
            class="relative mt-16 text-center text-sm text-slate-700 border-t bg-gradient-to-r from-sky-50 via-white to-sky-100 py-12 shadow-inner"
        >
            <div class="max-w-4xl mx-auto px-4 space-y-4">
                <p class="text-base font-medium text-slate-800">
                    © {{ now()->year }}
                    <span class="font-bold text-sky-600">DevChase</span>
                </p>
                <p class="text-slate-600 italic">Building in faith. Learning in public.</p>
                <p class="text-xs text-slate-500">
                    Crafted with Laravel, Tailwind, and a whole lot of prayer.
                </p>
            </div>

            {{-- Optional SVG flare --}}
            <div
                class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-sky-400 via-sky-600 to-sky-400 opacity-30"
            ></div>
        </footer>
    </body>
</html>
