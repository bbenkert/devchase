<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6">Projects</h1>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($projects as $project)
                <div class="bg-white rounded-lg shadow p-5 flex flex-col">
                    @if ($project->screenshot)
                        <img
                            src="{{ asset('storage/' . $project->screenshot) }}"
                            class="w-full h-50 object-cover rounded mb-4"
                        />
                    @endif

                    <h3 class="text-lg font-bold mb-2">{{ $project->title }}</h3>

                    <div class="flex gap-2 flex-wrap mb-4">
                        @foreach ($project->tech_stack ?? [] as $tag)
                            <span class="bg-gray-100 px-2 py-1 text-xs rounded">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mt-auto space-x-2">
                        @if ($project->demo_link)
                            <a
                                href="{{ $project->demo_link }}"
                                target="_blank"
                                class="text-sm text-blue-600 hover:underline"
                            >
                                Demo
                            </a>
                        @endif

                        @if ($project->github_link)
                            <a
                                href="{{ $project->github_link }}"
                                target="_blank"
                                class="text-sm text-gray-700 hover:underline"
                            >
                                GitHub
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No projects available yet.</p>
            @endforelse
        </div>
    </div>
</x-layout>
