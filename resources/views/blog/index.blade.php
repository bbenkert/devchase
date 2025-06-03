<x-layout>
    <div class="bg-slate-50">
        {{-- Page Header --}}
        <section class="py-16 bg-gradient-to-r from-slate-800 via-slate-700 to-sky-800 text-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">The DevChase Blog</h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-sky-100">
                    Insights, tutorials, and reflections from my journey in code and faith.
                </p>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{-- Search & Filter Bar --}}
            <form method="GET" action="{{ route('blog.index') }}" class="mb-12 p-6 bg-white rounded-xl shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-end">
                    <div>
                        <label for="search" class="block text-sm font-medium text-slate-700 mb-1">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Keywords..."
                               class="w-full px-4 py-2.5 border-slate-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 transition text-sm">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                        <select name="category" id="category" class="w-full px-4 py-2.5 border-slate-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 transition text-sm">
                            <option value="">All Categories</option>
                            @foreach ($allCategories as $categoryName)
                                <option value="{{ $categoryName }}" @selected(request('category') === $categoryName)>
                                    {{ $categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tag" class="block text-sm font-medium text-slate-700 mb-1">Tag</label>
                        <select name="tag" id="tag" class="w-full px-4 py-2.5 border-slate-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 transition text-sm">
                            <option value="">All Tags</option>
                            @foreach ($allTags as $tagName)
                                <option value="{{ $tagName }}" @selected(request('tag') === $tagName)>
                                    {{ $tagName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                            class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 text-sm">
                        Apply Filters
                    </button>
                </div>
            </form>

            {{-- Posts Grid --}}
            @if ($posts->isNotEmpty())
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transform transition hover:-translate-y-2 hover:shadow-2xl">
                            @if ($post->featured_image)
                                <a href="{{ route('blog.show', $post->slug) }}" class="block h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                         loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                </a>
                            @else
                                <a href="{{ route('blog.show', $post->slug) }}" class="block h-48 bg-slate-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </a>
                            @endif
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="text-sm text-sky-600 font-semibold mb-1">
                                    {{-- Assuming $post->category can be an object with a name, or a string, or null --}}
                                    {{ $post->category->name ?? $post->category ?? 'Uncategorized' }}
                                </p>
                                <h3 class="text-xl font-bold text-slate-800 mb-2">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-sky-700 transition-colors">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="text-slate-600 text-sm mb-4 flex-grow">{!! Str::limit(strip_tags($post->excerpt), 120) !!}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                       class="inline-flex items-center text-sky-600 font-semibold hover:text-sky-800 transition-colors">
                                        Read More
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($posts->hasPages())
                    <div class="mt-12 pt-8 border-t border-slate-200">
                        {{ $posts->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-2xl font-semibold text-slate-800">No Posts Found</h3>
                    <p class="mt-1 text-lg text-slate-500">Your search or filter criteria didn't match any posts. Try broadening your search!</p>
                    <div class="mt-6">
                        <a href="{{ route('blog.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Clear Filters & View All Posts
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
