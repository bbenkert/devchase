<x-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-6">{{ $post->title }}</h1>

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                 alt="{{ $post->title }} featured image"
                 class="w-full h-auto object-cover rounded shadow mb-6" />
        @endif

        <article class="prose lg:prose-lg max-w-none prose-slate">
            {!! $post->content !!}
        </article>

        <p class="text-sm text-gray-500 mt-8">
            Published {{ $post->published_at->format('F j, Y') }}
        </p>
    </div>
</x-layout>
