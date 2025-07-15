<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():View
    {
        return view('posts.index', [
            'posts' => DB::table('posts')->paginate(5)
        ]);
    }
    public function add():View
    {
        $categories = DB::table('categories')->get();
        return view('posts.add', compact('categories'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $request->input('title'),
            'author' => auth()->user()->name, // Assuming you have user authentication set up
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id // Assuming you have user authentication set up
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
}
