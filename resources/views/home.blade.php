<x-layout>
    {{-- Hero Section --}}
    <section
        class="bg-gradient-to-r from-slate-900 via-blue-900 to-sky-700 text-white py-20 md:py-32"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight">
                DevChase:
                <span class="block sm:inline">Where Faith Meets Code.</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-sky-100">
                Documenting my growth as a developer and disciple. Building meaningful tools and
                sharing the process.
            </p>
            <div class="mt-10">
                <a
                    href="{{ route('blog.index') }}"
                    class="inline-block bg-sky-500 hover:bg-sky-400 text-white font-semibold px-8 py-3 rounded-lg shadow-lg transform transition hover:scale-105 text-lg"
                >
                    The DevChase Blog
                </a>
            </div>
        </div>
    </section>

    <div class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            {{-- Latest Dispatches (Blog Posts) --}}
            <section>
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Latest Posts</h2>
                    <p class="mt-2 text-lg text-slate-600">
                        Insights and updates from a developer following Jesus.
                    </p>
                </div>
                @if ($posts->isNotEmpty())
                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($posts->take(3) as $post)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transform transition hover:-translate-y-2 hover:shadow-2xl"
                            >
                                @if ($post->featured_image)
                                    <a
                                        href="{{ route('blog.show', $post->slug) }}"
                                        class="block h-48 overflow-hidden"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $post->featured_image) }}"
                                            alt="{{ $post->title }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        />
                                    </a>
                                @else
                                    <a
                                        href="{{ route('blog.show', $post->slug) }}"
                                        class="block h-48 bg-slate-200 flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-16 h-16 text-slate-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            ></path>
                                        </svg>
                                    </a>
                                @endif
                                <div class="p-6 flex flex-col flex-grow">
                                    <p class="text-sm text-sky-600 font-semibold mb-1">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </p>
                                    <h3 class="text-xl font-bold text-slate-800 mb-2">
                                        <a
                                            href="{{ route('blog.show', $post->slug) }}"
                                            class="hover:text-sky-700 transition-colors"
                                        >
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="text-slate-600 text-sm mb-4 flex-grow">
                                        {{ Str::limit($post->excerpt, 120) }}
                                    </p>
                                    <div class="mt-auto">
                                        <a
                                            href="{{ route('blog.show', $post->slug) }}"
                                            class="inline-flex items-center text-sky-600 font-semibold hover:text-sky-800 transition-colors"
                                        >
                                            Read More
                                            <svg
                                                class="ml-2 w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                                ></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($posts->count() > 3)
                        <div class="text-center mt-12">
                            <a
                                href="{{ route('blog.index') }}"
                                class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-semibold px-6 py-3 rounded-lg shadow transform transition hover:scale-105"
                            >
                                View All Articles
                            </a>
                        </div>
                    @endif
                @else
                    <p class="text-center text-slate-500 text-lg">No articles yet. Stay tuned!</p>
                @endif
            </section>

            {{-- Featured Expeditions (Projects) --}}
            <section>
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Featured Projects</h2>
                    <p class="mt-2 text-lg text-slate-600">
                        Building, creating, and solving real-world challenges.
                    </p>
                </div>
                @if ($projects->isNotEmpty())
                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($projects->take(3) as $project)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transform transition hover:-translate-y-2 hover:shadow-2xl"
                            >
                                @if ($project->screenshot)
                                    <a
                                        href="{{ $project->demo_link ?? '#' }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="block h-56 overflow-hidden"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $project->screenshot) }}"
                                            alt="{{ $project->title }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        />
                                    </a>
                                @else
                                    <a
                                        href="{{ $project->demo_link ?? '#' }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="block h-56 bg-slate-200 flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-20 h-20 text-slate-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6 15.5M6 12v9.75M6 20.25h12M6 12a9 9 0 0112 0v8.25"
                                            ></path>
                                        </svg>
                                    </a>
                                @endif
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="text-xl font-bold text-slate-800 mb-2">
                                        {{ $project->title }}
                                    </h3>
                                    <p class="text-slate-600 text-sm mb-3 flex-grow">
                                        {{ Str::limit($project->description, 100) }}
                                    </p>
                                    <div class="mb-4">
                                        <p class="text-xs text-slate-500 font-medium mb-1">
                                            Tech Stack:
                                        </p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach (is_array($project->tech_stack) ? $project->tech_stack : explode(',', $project->tech_stack) as $tech)
                                                <span
                                                    class="bg-sky-100 text-sky-700 px-2 py-0.5 rounded-full text-xs font-semibold"
                                                >
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-auto flex space-x-3">
                                        @if ($project->demo_link)
                                            <a
                                                href="{{ $project->demo_link }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="inline-flex items-center justify-center w-1/2 bg-sky-600 hover:bg-sky-500 text-white text-sm font-semibold px-4 py-2.5 rounded-lg shadow transform transition hover:scale-105"
                                            >
                                                View Demo
                                            </a>
                                        @endif

                                        @if ($project->repo_link)
                                            <a
                                                href="{{ $project->repo_link }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="inline-flex items-center justify-center w-1/2 bg-slate-600 hover:bg-slate-500 text-white text-sm font-semibold px-4 py-2.5 rounded-lg shadow transform transition hover:scale-105"
                                            >
                                                Source Code
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($projects->count() > 3)
                        <div class="text-center mt-12">
                            <a
                                href="{{ route('projects.index') }}"
                                class="inline-block bg-slate-700 hover:bg-slate-600 text-white font-semibold px-6 py-3 rounded-lg shadow transform transition hover:scale-105"
                            >
                                Browse All Projects
                            </a>
                        </div>
                    @endif
                @else
                    <p class="text-center text-slate-500 text-lg">
                        No expeditions charted yet. Exciting projects coming soon!
                    </p>
                @endif
            </section>

            {{-- The Navigator (About Me Snippet) --}}
            <section class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <div class="md:flex md:items-center md:space-x-10">
                    <div class="md:w-1/3 text-center md:text-left mb-8 md:mb-0">
                        {{-- Placeholder for an image --}}
                        <div
                            class="w-40 h-40 md:w-48 md:h-48 rounded-full bg-gradient-to-br from-sky-400 to-blue-600 mx-auto md:mx-0 shadow-xl flex items-center justify-center"
                        >
                            <img
                                class="h-full w-full object-cover md:h-full md:w-72 lg:w-80 xl:w-96"
                                src="{{ asset('img/profile.jpg') }}"
                                alt="Photo of Ben"
                            />
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <h2 class="text-3xl font-bold text-slate-800 mb-3">Behind the Code</h2>
                        <p class="text-slate-600 text-lg mb-4">
                            Hi, I&#39;m Ben! I&#39;m a developer who&#39;s passionate about building
                            things that make a real difference. My faith shapes everything I do from
                            coding new tools to finding better ways to help people through
                            technology. I&#39;m always learning, always experimenting, and always
                            chasing what&#39;s next.
                        </p>
                        <p class="text-slate-600 text-lg mb-6">
                            This is where I share the ups, downs, and lessons from my journey in
                            both code and calling. If you&#39;re curious about how faith and tech
                            can work together, or you just want to follow along as I grow as a
                            developer (and as a disciple), you&#39;re in the right place.
                        </p>
                        <a
                            href="{{ route('about') }}"
                            class="inline-block bg-sky-600 hover:bg-sky-500 text-white font-semibold px-6 py-3 rounded-lg shadow transform transition hover:scale-105"
                        >
                            Learn More About My Journey
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
