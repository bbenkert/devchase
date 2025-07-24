<x-layout>
    <div class="bg-slate-50 py-12 md:py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            {{-- Profile Intro Section --}}
            <section
                class="bg-gradient-to-br from-slate-50 via-white to-sky-100 border border-slate-200 rounded-xl shadow-md"
            >
                <div class="flex flex-col md:flex-row items-center md:items-stretch">
                    {{-- Profile Image --}}
                    <div class="w-full md:w-72 lg:w-80 xl:w-96 h-72 md:h-auto bg-slate-100">
                        <img
                            class="h-full w-full object-cover transition duration-300 ease-in-out hover:scale-105"
                            src="{{ asset('img/profile.jpg') }}"
                            alt="Photo of Ben Benkert"
                        />
                    </div>

                    {{-- Bio Text --}}
                    <div class="p-8 lg:p-12 flex flex-col justify-center text-center md:text-left">
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight"
                        >
                            Ben Benkert
                        </h1>

                        <p class="mt-2 text-slate-600 text-lg sm:text-xl font-medium">
                            Builder. Pastor. Creator. Disciple.
                        </p>
                        <p class="uppercase tracking-wider text-sm text-sky-600 font-semibold mb-1">
                            Full Stack Developer
                        </p>
                        
                        {{-- Social Link --}}
                        <div class="flex justify-center md:justify-start mt-4 mb-6">
                            <a 
                                href="https://x.com/Benjaminbenkert" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                class="inline-flex items-center space-x-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 hover:text-slate-900 rounded-lg transition-colors duration-200"
                            >
                            <span class="text-sm font-medium">Follow on </span>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                
                            </a>
                        </div>
                        
                        <p
                            class="text-slate-700 text-base sm:text-lg leading-relaxed max-w-3xl mx-auto md:mx-0"
                        >
                            Hey, I’m Ben. I’m a full-time pastor, part-time developer, and full-time
                            learner. I created DevChase to document my journey into full-stack
                            development and to share what I’m building in both code and calling.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Main Content Section --}}
            <section class="bg-white rounded-xl shadow-xl">
                <div class="p-8 md:p-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mb-8">My Journey</h2>
                    <article
                        class="prose prose-lg lg:prose-xl max-w-none prose-slate prose-p:text-slate-700 prose-p:leading-relaxed prose-headings:text-slate-800 prose-a:text-sky-600 hover:prose-a:text-sky-700 prose-strong:text-slate-800"
                    >
                        <p>
                            My story with web development goes all the way back to when the internet
                            began. I don’t even remember what age I was when I started playing with
                            HTML and CSS, but I know I was young and hooked early. I’ve been
                            building websites ever since.
                        </p>
                        <p>
                            My first site was built in a plain text editor and hosted on a free
                            provider. From there, I remember using Microsoft FrontPage and later
                            Dreamweaver. I learned to create Flash animations, write dynamic PHP,
                            build custom navbars, and design interactive experiences with JavaScript
                            and jQuery.
                        </p>
                        <p>
                            I eventually built full programs hosted on local office servers, I
                            helped maintain a large one for a law office called CaseTracker that my
                            dad built. I also worked on API integrations with programs like
                            QuickBooks for invoicing systems, and built a variety of unique tools
                            for real-world problems. I spent years in the WordPress world
                            freelancing and consulting before recently discovering the Laravel
                            ecosystem, where I finally felt at home.
                        </p>
                        <p>
                            For 9 years, I worked alongside my dad in his computer shop. I later ran
                            my own computer consulting business for 12 years. But eventually, I laid
                            all that down to pursue ministry.
                        </p>
                        <p>
                            Today, I still code but I do it for a different reason. I build tools
                            for the Church. I help others when I can. I create systems for
                            ministries. And I see this work as an extension of my calling: to serve,
                            to build, and to bring glory to Jesus.
                        </p>
                        <p class="font-semibold">
                            DevChase is my story and my prayer is that it inspires someone else out
                            there who's called to create for the Kingdom too.
                        </p>
                    </article>
                </div>
            </section>

            {{-- Tech Stack Section --}}
            <section
                class="bg-gradient-to-br from-slate-50 via-white to-sky-100 border border-slate-200 rounded-xl shadow-md"
            >
                <div class="px-8 lg:px-12 py-12">
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">Tech I Work With</h2>

                    <div class="grid gap-10 md:grid-cols-3">
                        {{-- Frameworks & Libraries --}}
                        <div>
                            <h3
                                class="text-sm font-semibold text-slate-600 uppercase tracking-wide mb-3"
                            >
                                Frameworks & Libraries
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ([
                                        'Laravel',
                                        'Livewire',
                                        'Filament',
                                        'Alpine.js',
                                        'Tailwind CSS',
                                        'React',
                                        'Vue',
                                        'Next.js',
                                        'T3 Stack'
                                    ]
                                    as $framework)
                                    <span
                                        class="bg-sky-100 text-sky-800 px-3 py-1 rounded-full text-sm font-medium hover:bg-sky-200 transition"
                                    >
                                        {{ $framework }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Languages --}}
                        <div>
                            <h3
                                class="text-sm font-semibold text-slate-600 uppercase tracking-wide mb-3"
                            >
                                Languages
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach (['HTML', 'CSS', 'JavaScript', 'TypeScript', 'PHP', 'Markdown', 'JSON', 'SQL'] as $language)
                                    <span
                                        class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium hover:bg-amber-200 transition"
                                    >
                                        {{ $language }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Tools --}}
                        <div>
                            <h3
                                class="text-sm font-semibold text-slate-600 uppercase tracking-wide mb-3"
                            >
                                Tools
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ([
                                        'WordPress',
                                        'MySQL',
                                        'PostgreSQL',
                                        'Laravel Forge',
                                        'GitHub',
                                        'PM2',
                                        'shadcn/ui',
                                        'Vite',
                                        'Docker',
                                        'Laravel Sail',
                                        'Composer',
                                        'pnpm',
                                        'Prisma',
                                        'Drizzle ORM',
                                        'Mailgun'
                                    ]
                                    as $tool)
                                    <span
                                        class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium hover:bg-indigo-200 transition"
                                    >
                                        {{ $tool }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
