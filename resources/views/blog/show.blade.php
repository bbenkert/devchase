<x-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-64 object-cover mb-6 rounded shadow" />
        @endif

        <div class="prose prose-lg max-w-none">
            {!! $post->renderedContent() !!}
        </div>

        <p class="text-sm text-gray-500 mt-8">
            Published {{ $post->published_at->format('F j, Y') }}
        </p>
    </div>
</x-layout>
