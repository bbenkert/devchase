@vite('resources/css/app.css')
<x-layout>
    <div class="bg-slate-50 py-12 md:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                @if ($post->featured_image)
                    <img
                        src="{{ asset('storage/' . $post->featured_image) }}"
                        alt="{{ $post->title }} featured image"
                        class="w-full h-64 md:h-96 object-cover"
                    />
                @endif

                <div class="p-6 md:p-10">
                    <div class="mb-6">
                        {{-- Check if category is an object with a name, or just a string --}}
                        @if ($post->category)
                            @php
                                $categoryName = is_object($post->category) ? $post->category->name : $post->category;
                            @endphp

                            @if ($categoryName)
                                <a
                                    href="{{ route('blog.index', ['category' => $categoryName]) }}"
                                    class="inline-block bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-semibold hover:bg-sky-200 transition mb-2"
                                >
                                    {{ $categoryName }}
                                </a>
                            @endif
                        @endif

                        <h1
                            class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight"
                        >
                            {{ $post->title }}
                        </h1>
                        <p class="mt-3 text-base text-slate-500">
                            Published on
                            <time datetime="{{ $post->published_at->toDateString() }}">
                                {{ $post->published_at->format('F j, Y') }}
                            </time>
                        </p>
                    </div>

                    <article
                        class="prose prose-lg lg:prose-xl max-w-none prose-slate prose-headings:text-slate-900 prose-headings:font-semibold prose-h1:text-3xl prose-h1:mb-6 prose-h1:mt-8 prose-h2:text-2xl prose-h2:mb-4 prose-h2:mt-8 prose-h3:text-xl prose-h3:mb-3 prose-h3:mt-6 prose-h4:text-lg prose-h4:mb-3 prose-h4:mt-4 prose-h5:text-base prose-h5:mb-2 prose-h5:mt-4 prose-h6:text-sm prose-h6:mb-2 prose-h6:mt-4 prose-p:text-slate-700 prose-p:leading-relaxed prose-p:mb-4 prose-a:text-sky-600 prose-a:no-underline hover:prose-a:underline prose-a:font-medium prose-strong:text-slate-900 prose-strong:font-semibold prose-em:text-slate-700 prose-em:italic prose-code:text-rose-600 prose-code:bg-rose-50 prose-code:px-2 prose-code:py-1 prose-code:rounded prose-code:font-mono prose-code:text-sm prose-code:before:content-none prose-code:after:content-none prose-pre:bg-slate-900 prose-pre:text-slate-200 prose-pre:rounded-lg prose-pre:p-6 prose-pre:overflow-x-auto prose-pre:shadow-lg prose-pre:prose-code:text-slate-200 prose-pre:prose-code:bg-transparent prose-pre:prose-code:p-0 prose-pre:prose-code:rounded-none prose-blockquote:border-l-4 prose-blockquote:border-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:p-4 prose-blockquote:rounded-r-lg prose-blockquote:italic prose-blockquote:text-slate-700 prose-ul:list-disc prose-ul:pl-6 prose-ul:mb-4 prose-ol:list-decimal prose-ol:pl-6 prose-ol:mb-4 prose-li:text-slate-700 prose-li:mb-1 prose-table:border-collapse prose-table:w-full prose-table:text-sm prose-thead:bg-slate-50 prose-th:border prose-th:border-slate-300 prose-th:p-3 prose-th:text-left prose-th:font-semibold prose-th:text-slate-900 prose-td:border prose-td:border-slate-300 prose-td:p-3 prose-td:text-slate-700 prose-img:rounded-lg prose-img:shadow-md prose-img:mb-6 prose-hr:border-slate-300 prose-hr:my-8"
                    >
                        {!! $post->content !!}
                    </article>

                    {{-- Check if tags is a collection and not empty --}}
                    @if ($post->tags && (is_countable($post->tags) ? count($post->tags) : false) > 0)
                        <div class="mt-8 pt-6 border-t border-slate-200">
                            <h3 class="text-sm font-medium text-slate-500 mb-2">Tags:</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($post->tags as $tag)
                                    {{-- Check if tag is an object with a name, or just a string --}}
                                    @php
                                        $tagName = is_object($tag) ? $tag->name : $tag;
                                    @endphp

                                    @if ($tagName)
                                        <a
                                            href="{{ route('blog.index', ['tag' => $tagName]) }}"
                                            class="inline-block bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-medium hover:bg-slate-200 hover:text-slate-700 transition"
                                        >
                                            #{{ $tagName }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mt-10 pt-8 border-t border-slate-200">
                        <a
                            href="{{ route('blog.index') }}"
                            class="inline-flex items-center text-sky-600 font-semibold hover:text-sky-700 transition"
                        >
                            <svg
                                class="mr-2 w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                ></path>
                            </svg>
                            Back to Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
