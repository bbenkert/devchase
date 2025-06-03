<x-layout>
    <div class="bg-slate-50">
        {{-- Page Header --}}
        <section class="py-16 bg-gradient-to-r from-sky-700 via-sky-600 to-blue-700 text-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">My Expeditions</h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-sky-50">
                    A showcase of projects I've built, from web applications to experiments in code.
                </p>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if ($projects->isNotEmpty())
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects as $project)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group transform transition hover:-translate-y-2 hover:shadow-2xl">
                            <div class="relative h-48 bg-slate-200 overflow-hidden">
                                @if ($project->screenshot)
                                    <img src="{{ asset('storage/' . $project->screenshot) }}" alt="{{ $project->title }} screenshot"
                                         loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-slate-300">
                                        <svg class="w-16 h-16 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 11.286a8 8 0 11-14.856 0M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $project->title }}</h3>
                                @if($project->description)
                                    <p class="text-slate-600 text-sm mb-4 flex-grow">{{ Str::limit($project->description, 150) }}</p>
                                @else
                                    <div class="flex-grow"></div> {{-- Placeholder to push buttons down if no description --}}
                                @endif

                                @if (!empty($project->tech_stack))
                                    <div class="mb-4">
                                        <h4 class="text-xs text-slate-500 uppercase font-semibold mb-1">Tech Stack:</h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($project->tech_stack as $tech)
                                                <span class="px-2 py-1 bg-sky-100 text-sky-700 text-xs font-medium rounded-full">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-auto pt-4 border-t border-slate-200 flex items-center justify-start space-x-3">
                                    @if ($project->demo_link)
                                        <a href="{{ $project->demo_link }}" target="_blank" rel="noopener noreferrer"
                                           class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition transform hover:scale-105">
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" /></svg>
                                            View Demo
                                        </a>
                                    @endif
                                    @if ($project->github_link)
                                        <a href="{{ $project->github_link }}" target="_blank" rel="noopener noreferrer"
                                           class="inline-flex items-center justify-center px-4 py-2 border border-slate-300 text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition transform hover:scale-105">
                                            <svg class="-ml-1 mr-2 h-5 w-5 text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.483 0-.237-.009-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.378.201 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.309.678.92.678 1.853 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0020 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                                            Source Code
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 11.286a8 8 0 11-14.856 0M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="mt-2 text-2xl font-semibold text-slate-800">No Expeditions Yet</h3>
                    <p class="mt-1 text-lg text-slate-500">I'm currently charting my course. Check back soon to see my completed projects!</p>
                    <div class="mt-6">
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Return to Homepage
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
