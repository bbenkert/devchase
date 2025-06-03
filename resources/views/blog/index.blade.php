<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Blog</h1>

        {{-- Search & Filter Bar --}}
        <form method="GET" class="mb-10 flex flex-wrap gap-4 items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search posts..."
                class="border border-gray-300 rounded px-3 py-2 w-full md:w-auto flex-1"
            />

            <select name="category" class="border border-gray-300 rounded px-3 py-2">
                <option value="">All Categories</option>
                @foreach ($allCategories as $category)
                    <option value="{{ $category }}" @selected(request('category') === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            <select name="tag" class="border border-gray-300 rounded px-3 py-2">
                <option value="">All Tags</option>
                @foreach ($allTags as $tag)
                    <option value="{{ $tag }}" @selected(request('tag') === $tag)>
                        {{ $tag }}
                    </option>
                @endforeach
            </select>

            <button
                type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
            >
                Filter
            </button>
        </form>

        {{-- Posts Grid --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <a
                    href="{{ route('blog.show', $post->slug) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"
                >
                    @if ($post->featured_image)
                        <img
                            src="{{ asset('storage/' . $post->featured_image) }}"
                            alt="{{ $post->title }}"
                            loading="lazy"
                            class="w-full h-48 object-cover"
                        />
                    @endif

                    <div class="p-4">
                        <p class="text-xs text-gray-500 mb-1">
                            {{ $post->category ?? 'Uncategorized' }}
                        </p>
                        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-600 mt-2">{!! $post->excerpt !!}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">No posts available.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
