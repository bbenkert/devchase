<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $projects = Project::where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('posts', 'projects'));
    }
}
