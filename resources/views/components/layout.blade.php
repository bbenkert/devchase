<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'DevChase') }}</title>
        @vite('resources/css/app.css')

<!-- Fathom analytics -->
@if(app()->environment('production'))
<script src="https://cdn.usefathom.com/script.js" data-site="DMUDSFWO" defer></script>
@endif
<!-- / Fathom -->
        <-- Analytics -->
<script 
 defer 
 src="https://assets.onedollarstats.com/stonks.js"
></script>
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
        
            <div class="max-w-4xl mx-auto px-4">
                
                <div class="space-y-6">
                    <p>{{-- Social Links --}}
                    
                        <a 
                            href="https://x.com/Benjaminbenkert" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center w-10 h-10 text-slate-500 hover:text-sky-600 hover:bg-sky-50 rounded-full transition-all duration-200"
                            aria-label="Follow Ben on X (Twitter)"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a></p>
                    <p class="text-base font-medium text-slate-800">
                        © {{ now()->year }}
                        <span class="font-bold text-sky-600">DevChase</span>
                    </p>
                    <p class="text-slate-600 italic">Building in faith. Learning in public.</p>
                    
                    
                    </div>
                    
                    <p class="text-xs text-slate-500">
                        Crafted with Laravel, Tailwind, and a whole lot of prayer.
                    </p>
                </div>
            </div>

            {{-- Optional SVG flare --}}
            <div
                class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-sky-400 via-sky-600 to-sky-400 opacity-30"
            ></div>
        </footer>
    </body>
</html>
