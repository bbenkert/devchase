<x-layout>
    <div class="bg-slate-50 py-12 md:py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            {{-- Profile Intro Section --}}
            <section class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:shrink-0">
                        {{-- Ensure 'profile.jpg' is in public/storage/profile.jpg or update path --}}
                        <img
                            class="h-64 w-full object-cover md:h-full md:w-72 lg:w-80 xl:w-96"
                            src="{{ asset('img/profile.jpg') }}"
                            alt="Photo of Ben Benkert"
                        />
                    </div>
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div class="uppercase tracking-wider text-sm text-sky-600 font-semibold">
                            Full Stack Developer
                        </div>
                        <h1
                            class="mt-1 block text-3xl sm:text-4xl lg:text-5xl leading-tight font-extrabold text-slate-900"
                        >
                            Ben Benkert
                        </h1>
                        <p class="mt-2 text-slate-600 text-lg sm:text-xl">
                            Builder. Pastor. Creator. Disciple.
                        </p>
                        <p class="mt-6 text-slate-700 text-lg leading-relaxed">
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
        </div>
    </div>
</x-layout>
