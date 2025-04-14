<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Blog</h1>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-48 object-cover" />
                    @endif
                    <div class="p-4">
                        <p class="text-xs text-gray-500 mb-1">{{ $post->category ?? 'Uncategorized' }}</p>
                        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-600 mt-2">{{ $post->excerpt }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">No posts available.</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
