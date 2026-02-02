<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    public function index(Request $request): View
    {
        $query = Post::query()
            ->where('published', true);

        // Filter by search
        $search = $request->input('search');
        if (is_string($search) && $search !== '') {
            $query->where(function ($q) use ($search): void {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        // Filter by tag
        if ($tag = $request->input('tag')) {
            $query->whereJsonContains('tags', $tag);
        }

        $posts = $query->orderByDesc('published_at')->paginate(6);

        // Get unique categories and tags for filter dropdowns
        $allCategories = Post::distinct()->pluck('category')->filter()->values();
        $allTags = Post::query()->pluck('tags')->flatten()->filter()->unique()->values();

        return view('blog.index', compact('posts', 'allCategories', 'allTags'));
    }

    public function rss(): Response
    {
        $posts = Post::where('published', true)
            ->orderByDesc('published_at')
            ->limit(20)
            ->get();

        return response()->view('blog.rss', compact('posts'))
            ->header('Content-Type', 'application/rss+xml; charset=utf-8');
    }
}
