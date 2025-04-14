<x-layout>
    <div class="max-w-5xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-4 text-center">Welcome to DevChase</h1>
        <p class="text-lg text-center text-gray-600 mb-10">
            Building in faith. Learning in public.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Latest Posts</h2>
        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="block rounded-lg overflow-hidden shadow hover:shadow-lg transition bg-white">
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-48 object-cover" />
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-600 mt-2">{{ $post->excerpt }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>