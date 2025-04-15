<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(Request $request) {
        $post = Post::create($request->only(['slug', 'contenu', 'cover_image', 'author_id', 'published_at']));
        return redirect()->route('posts.index');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
        $post->update($request->only(['slug', 'contenu', 'cover_image', 'author_id', 'published_at']));
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
