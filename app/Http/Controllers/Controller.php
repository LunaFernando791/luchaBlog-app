<?php

namespace App\Http\Controllers;
use App\Models\Post;

abstract class Controller
{
    public function __construct()
    {
        // Initialization code can go here if needed

    }
    /**
     * Handle the request and return a response.
     *
     * @param  mixed  $request
     * @return mixed
     */
    public function index(){
        $posts = Post::all(); // Assuming you have a Post model to fetch posts
        return view('index', compact('posts'));
    }
}
