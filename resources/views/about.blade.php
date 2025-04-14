<x-layout>
    <div class="max-w-3xl mx-auto px-4 py-12 space-y-6">

        <h1 class="text-4xl font-bold text-blue-700">About Me</h1>

        <p class="text-lg text-gray-700">
            Hey, I’m Ben. I’m a full-time pastor, part-time developer, and full-time learner.
            I created DevChase to document my journey into full-stack development and to share
            what I’m building in both code and calling.
        </p>

        <p class="text-gray-700">
            My story with web development goes all the way back to when the internet began.
            I don’t even remember what age I was when I started playing with HTML and CSS,
            but I know I was young and hooked early. I’ve been building websites ever since.
        </p>

        <p class="text-gray-700">
            My first site was built in a plain text editor and hosted on a free provider.
            From there, I remember using Microsoft FrontPage and later Dreamweaver. I learned to
            create Flash animations, write dynamic PHP, build custom navbars, and design
            interactive experiences with JavaScript and jQuery.
        </p>

        <p class="text-gray-700">
            I eventually built full programs hosted on local office servers, I helped maintain a large one
            for a law office called CaseTracker that my dad built. I also worked on API integrations with programs like QuickBooks
            for invoicing systems, and built a variety of unique tools for real-world problems.
            I spent years in the WordPress world freelancing and consulting before recently discovering
            the Laravel ecosystem, where I finally felt at home.
        </p>

        <p class="text-gray-700">
            For 9 years, I worked alongside my dad in his computer shop. I later ran my own computer
            consulting business for 12 years. But eventually, I laid all that down to pursue ministry.
        </p>

        <p class="text-gray-700">
            Today, I still code but I do it for a different reason. I build tools for the Church.
            I help others when I can. I create systems for ministries. And I see this work as an
            extension of my calling: to serve, to build, and to bring glory to Jesus.
        </p>

        <p class="text-gray-700 font-semibold">
            DevChase is my story and my prayer is that it inspires someone else out there who's
            called to create for the Kingdom too.
        </p>

    </div>
    <hr class="my-10 border-gray-200" />

<div class="flex items-center justify-center space-x-6 mt-10">
    <img src="{{ asset('storage/profile.jpg') }}" alt="Ben's Photo"
         class="w-20 h-20 rounded-full object-cover border-2 border-blue-900" />
    <div>
        <p class="text-gray-800 font-semibold text-lg text-center">Ben Benkert</p>
        <p class="text-gray-500 text-sm text-center">Builder. Pastor. Creator. Disciple.</p>
    </div>
</div>

</x-layout>
