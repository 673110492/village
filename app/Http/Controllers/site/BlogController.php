<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('front.new', compact('post'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('front.new_detail', compact('post'));
    }

    public function storeComment(Request $request, $slug)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $comment = new Comment();
        $comment->nom = $request->nom;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->back()->with('success', 'Votre commentaire a été soumis avec succès.');
    }
}
