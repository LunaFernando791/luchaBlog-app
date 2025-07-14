<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Assuming you have a Post model to fetch posts
        return view('posts.index', compact('posts'));
    }
}
