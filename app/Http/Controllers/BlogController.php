<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
