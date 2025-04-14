<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevChase</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white shadow p-4">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold">DevChase</a>
            <nav class="space-x-4">
                <a href="/" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="/blog" class="text-gray-700 hover:text-blue-600">Blog</a>
                <a href="/projects" class="text-gray-700 hover:text-blue-600">Projects</a>
                <a href="/about" class="text-gray-700 hover:text-blue-600">About</a>
            </nav>
        </div>
    </header>

    <main class="py-10">
        {{ $slot }}
    </main>
</body>
</html>
