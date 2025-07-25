<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Post; // Assuming you have a Post model

class PostController extends Controller
{
    public function showIndex(Request $request, ?int $categories=null): View
    {
        $search = $request->input('search', '');

        $posts = Post::query()
        ->where('is_published', true)
        ->when($categories, fn($q) => $q->where('category_id', $categories))
        ->when($search, function ($q) use ($search) {
            $q->where(function ($q2) use ($search) {
                $q2->where('title', 'like', "%{$search}%")
                   ->orWhere('excerpt', 'like', "%{$search}%")
                   ->orWhere('content', 'like', "%{$search}%");
            });
        })
        ->latest()
        ->paginate(10);

        return view('posts.index', compact('posts'));
    }
    public function lookup(Request $request): View
    {
        $search = $request->input('search');
        $posts = Post::query()
            ->where('is_published', true)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function myPosts():View
    {
        $posts = auth()->user()->posts()->paginate(5);
        return view('posts.my_posts', compact('posts'));
    }

    public function show(int $id): View
    {
        if (!Post::where('id', $id)->exists()) {
            abort(404, 'Post not found');
        }
        return view('posts.show', [
            'post' => DB::table('posts')->where('id', $id)->first()
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
            'title' => 'bail|required|string|max:50',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $request->input('title'),
            'author' => auth()->user()->name, // Assuming you have user authentication set up
            'excerpt' => $request->input('excerpt'),
            'featured_image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null, // Store image if provided
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id // Assuming you have user authentication set up
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(int $id): View
    {
        $post = DB::table('posts')->where('id', $id)->first();
        if (!$post) {
            abort(404, 'Post not found');
        }
        $categories = DB::table('categories')->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);
        $post = DB::table('posts')->where('id', $id)->first();
        if (!$post) {
            abort(404, 'Post not found');
        }
        DB::table('posts')->where('id', $id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $request->input('title'),
            'updated_at' => now(),
            'category_id' => $request->input('category_id')
        ]);
        return redirect()->route('posts.my_posts')->with('success', 'Post updated successfully.');
    }

    public function destroy(int $id){
        $post = DB::table('posts')->where('id', $id)->first();
        if (!$post) {
            abort(404, 'Post not found');
        }
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.my_posts')->with('success', 'Post deleted successfully.');
    }
}
