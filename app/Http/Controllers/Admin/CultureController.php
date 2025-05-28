<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    /**
     * Affiche la liste des cultures.
     */
    public function index()
    {
        $cultures = Culture::all();
        return view('admin.cultures.index', compact('cultures'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.cultures.create');
    }

    /**
     * Enregistre une nouvelle culture.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'origine' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:255',
            'date_celebration' => 'nullable|date',
            'lieu_celebration' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video1' => 'nullable|file|mimes:mp4,mov,avi|max:2048000',
            'video2' => 'nullable|file|mimes:mp4,mov,avi|max:2048000',
        ]);

        $image1 = $request->file('image1')?->store('cultures/images', 'public');
        $image2 = $request->file('image2')?->store('cultures/images', 'public');
        $video1 = $request->file('video1')?->store('cultures/videos', 'public');
        $video2 = $request->file('video2')?->store('cultures/videos', 'public');

        Culture::create([
            'nom' => $request->nom,
            'origine' => $request->origine,
            'description' => $request->description,
            'type' => $request->type,
            'date_celebration' => $request->date_celebration,
            'lieu_celebration' => $request->lieu_celebration,
            'image1' => $image1,
            'image2' => $image2,
            'video1' => $video1,
            'video2' => $video2,
        ]);

        return redirect('admin/admin/cultures')->with('success', 'Culture enregistrée avec succès.');
    }

    /**
     * Affiche les détails d'une culture.
     */
    public function show(string $id)
    {
        $culture = Culture::findOrFail($id);
        return view('admin.cultures.show', compact('culture'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(string $id)
    {
        $culture = Culture::findOrFail($id);
        return view('admin.cultures.edit', compact('culture'));
    }

    /**
     * Met à jour une culture existante.
     */
    public function update(Request $request, string $id)
    {
        $culture = Culture::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'origine' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:255',
            'date_celebration' => 'nullable|date',
            'lieu_celebration' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video1' => 'nullable|file|mimes:mp4,mov,avi|max:2048000',
            'video2' => 'nullable|file|mimes:mp4,mov,avi|max:2048000',
        ]);

        // Mise à jour fichiers si nouveaux envoyés
        if ($request->hasFile('image1')) {
            $culture->image1 = $request->file('image1')->store('cultures/images', 'public');
        }

        if ($request->hasFile('image2')) {
            $culture->image2 = $request->file('image2')->store('cultures/images', 'public');
        }

        if ($request->hasFile('video1')) {
            $culture->video1 = $request->file('video1')->store('cultures/videos', 'public');
        }

        if ($request->hasFile('video2')) {
            $culture->video2 = $request->file('video2')->store('cultures/videos', 'public');
        }

        $culture->update([
            'nom' => $request->nom,
            'origine' => $request->origine,
            'description' => $request->description,
            'type' => $request->type,
            'date_celebration' => $request->date_celebration,
            'lieu_celebration' => $request->lieu_celebration,
        ]);

        return redirect()->route('cultures.index')->with('success', 'Culture mise à jour avec succès.');
    }

    /**
     * Supprime une culture.
     */
    public function destroy(string $id)
    {
        $culture = Culture::findOrFail($id);
        $culture->delete();
        return redirect()->route('cultures.index')->with('success', 'Culture supprimée avec succès.');
    }
}
