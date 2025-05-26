<x-layout>
    <div class="max-w-3xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-75 object-cover mb-6 rounded shadow" />
        @endif

        <article class="prose prose-lg prose-slate max-w-none 
                        prose-headings:text-slate-900 prose-headings:font-semibold
                        prose-h1:text-3xl prose-h1:mb-6 prose-h1:mt-8
                        prose-h2:text-2xl prose-h2:mb-4 prose-h2:mt-8
                        prose-h3:text-xl prose-h3:mb-3 prose-h3:mt-6
                        prose-p:text-slate-700 prose-p:leading-relaxed prose-p:mb-4
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-a:font-medium
                        prose-strong:text-slate-900 prose-strong:font-semibold
                        prose-em:text-slate-700 prose-em:italic
                        prose-code:text-rose-600 prose-code:bg-rose-50 prose-code:px-2 prose-code:py-1 prose-code:rounded prose-code:font-mono prose-code:text-sm prose-code:before:content-none prose-code:after:content-none
                        prose-pre:bg-slate-900 prose-pre:text-slate-200 prose-pre:rounded-lg prose-pre:p-6 prose-pre:overflow-x-auto prose-pre:shadow-lg
                        prose-pre:prose-code:text-slate-200 prose-pre:prose-code:bg-transparent prose-pre:prose-code:p-0 prose-pre:prose-code:rounded-none
                        prose-blockquote:border-l-4 prose-blockquote:border-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:p-4 prose-blockquote:rounded-r-lg prose-blockquote:italic prose-blockquote:text-slate-700 prose-blockquote:not-italic
                        prose-ul:list-disc prose-ul:pl-6 prose-ul:mb-4
                        prose-ol:list-decimal prose-ol:pl-6 prose-ol:mb-4
                        prose-li:text-slate-700 prose-li:mb-1
                        prose-table:border-collapse prose-table:w-full prose-table:text-sm
                        prose-thead:bg-slate-50
                        prose-th:border prose-th:border-slate-300 prose-th:p-3 prose-th:text-left prose-th:font-semibold prose-th:text-slate-900
                        prose-td:border prose-td:border-slate-300 prose-td:p-3 prose-td:text-slate-700
                        prose-img:rounded-lg prose-img:shadow-md prose-img:mb-6
                        prose-hr:border-slate-300 prose-hr:my-8">
            {!! $post->renderedContent() !!}
        </article>

        <p class="text-sm text-gray-500 mt-8">
            Published {{ $post->published_at->format('F j, Y') }}
        </p>
    </div>
</x-layout>
