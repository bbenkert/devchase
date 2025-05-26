<x-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-75 object-cover mb-6 rounded shadow" />
        @endif

        <div class="prose prose-lg max-w-none prose-img:rounded-lg prose-headings:text-gray-800 prose-a:text-blue-600 hover:prose-a:underline prose-blockquote:border-l-4 prose-blockquote:border-gray-300 prose-blockquote:pl-4 prose-blockquote:italic prose-blockquote:text-gray-700 prose-blockquote:bg-gray-50 prose-blockquote:rounded-r-md prose-code:bg-rose-100 prose-code:text-rose-700 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded-md prose-code:font-mono prose-code:text-sm prose-pre:bg-slate-800 prose-pre:text-slate-200 prose-pre:p-4 prose-pre:rounded-lg prose-pre:shadow-md prose-pre:overflow-x-auto prose-pre:prose-code:bg-transparent prose-pre:prose-code:text-inherit prose-pre:prose-code:p-0 prose-pre:prose-code:rounded-none prose-pre:prose-code:font-mono prose-pre:prose-code:text-sm">
            {!! $post->renderedContent() !!}
        </div>

        <p class="text-sm text-gray-500 mt-8">
            Published {{ $post->published_at->format('F j, Y') }}
        </p>
    </div>
</x-layout>
