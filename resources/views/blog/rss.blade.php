{{ '<?xml version="1.0" encoding="UTF-8"?>' }}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ config('app.name') }} - Blog</title>
        <description>Latest blog posts from {{ config('app.name') }}</description>
        <link>{{ url('/') }}</link>
        <atom:link href="{{ url('/feed') }}" rel="self" type="application/rss+xml" />
        <language>en-us</language>
        <lastBuildDate>{{ $posts->first()?->published_at?->format('r') ?? now()->format('r') }}</lastBuildDate>
        <generator>Laravel</generator>

        @foreach($posts as $post)
        <item>
            <title>{{ htmlspecialchars($post->title) }}</title>
            <description>{{ htmlspecialchars($post->excerpt ?? Str::limit(strip_tags($post->renderedContent()), 300)) }}</description>
            <link>{{ url('/blog/' . $post->slug) }}</link>
            <guid>{{ url('/blog/' . $post->slug) }}</guid>
            <pubDate>{{ $post->published_at?->format('r') ?? $post->created_at->format('r') }}</pubDate>
            @if($post->category)
            <category>{{ htmlspecialchars($post->category) }}</category>
            @endif
            @if($post->tags)
                @foreach($post->tags as $tag)
                <category>{{ htmlspecialchars($tag) }}</category>
                @endforeach
            @endif
        </item>
        @endforeach
    </channel>
</rss>
