<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Liste des actualités.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Formulaire de création d’une actualité.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Enregistrement d’une nouvelle actualité.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|unique:posts,slug',
            'image' => 'nullable|image|max:2048',
            'contenu' => 'nullable|string',
        ]);

        // Image
        if ($request->hasFile('image')) {
            $data['cover_image'] = $request->file('image')->store('posts', 'public');
        }

        $data['is_active'] = true;
        $data['author_id'] = auth()->id();
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Actualité créée avec succès.');
    }

    /**
     * Affichage des détails d’une actualité.
     */
    public function show(Post $post)
    {
        $post->load('comments'); // Charger les Comments associés
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Formulaire d’édition.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Mise à jour de l’actualité.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'slug' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'contenu' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['cover_image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Actualité mise à jour.');
    }

    /**
     * Suppression d’une actualité.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Actualité supprimée.');
    }

    /**
     * Bascule le statut actif/inactif de l’actualité.
     */
    public function toggleStatus(Post $post)
    {
        $post->is_active = !$post->is_active;
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Statut mis à jour.');
    }

    /**
     * Approuver un Comment.
     */
    public function approveComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true;
        $comment->save();

        return back()->with('success', 'Comment approuvé.');
    }

    /**
     * Supprimer un Comment.
     */
    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment supprimé.');
    }
}
