<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-12 space-y-12">

        {{-- Latest Posts --}}
        <section>
            <h2 class="text-2xl font-semibold mb-6">Latest Posts</h2>
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ($posts as $post)
                    <div class="bg-white rounded-lg shadow p-5 flex flex-col justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">{{ $post->category ?? 'Uncategorized' }}</p>
                            <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                            <p class="text-sm text-gray-600 mt-2">{{ $post->excerpt }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('blog.show', $post->slug) }}"
                               class="inline-block bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

       {{-- Featured Projects --}}
<section>
    <h2 class="text-2xl font-semibold mb-6">Featured Projects</h2>
    <div class="grid gap-6 md:grid-cols-3">
        @forelse ($projects as $project)
            <div class="bg-white rounded-lg shadow p-5">
                @if ($project->screenshot)
                    <img src="{{ asset('storage/' . $project->screenshot) }}" class="w-full h-32 object-cover rounded mb-4" />
                @else
                    <div class="h-32 bg-gray-200 rounded mb-4"></div>
                @endif

                <h3 class="text-lg font-bold mb-2">{{ $project->title }}</h3>

                <div class="flex gap-2 flex-wrap mb-4">
                    @foreach ($project->tech_stack ?? [] as $tag)
                        <span class="bg-gray-100 px-2 py-1 text-xs rounded">{{ $tag }}</span>
                    @endforeach
                </div>

                <a href="{{ $project->demo_link ?? '#' }}"
                   class="inline-block bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-red-700 transition"
                   target="_blank" rel="noopener noreferrer">
                    View Project
                </a>
            </div>
        @empty
            <p class="text-gray-500">No featured projects yet.</p>
        @endforelse
    </div>
</section>

    </div>
</x-layout>
