<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('home', compact('posts'));
    }
}
