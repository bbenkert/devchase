<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    public function index(Request $request)
    {
        $query = Post::query()
            ->where('published', true);

        // Filter by search
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
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
        $allTags = Post::select('tags')->get()->pluck('tags')->flatten()->unique()->values();

        return view('blog.index', compact('posts', 'allCategories', 'allTags'));
    }
}
