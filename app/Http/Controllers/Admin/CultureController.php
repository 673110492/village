<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    public function index()
    {
        $cultures = Culture::all();
        return view('admin.cultures.index', compact('cultures'));
    }

    public function create()
    {
        return view('admin.cultures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reference' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lien_youtube1' => 'nullable|url|max:255',
            'lien_youtube2' => 'nullable|url|max:255',
        ]);

        $image1 = $request->file('image1')?->store('cultures/images', 'public');
        $image2 = $request->file('image2')?->store('cultures/images', 'public');

        Culture::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'reference' => $request->reference,
            'image1' => $image1,
            'image2' => $image2,
            'lien_youtube1' => $request->lien_youtube1,
            'lien_youtube2' => $request->lien_youtube2,
        ]);

        return redirect('admin/admin/cultures')->with('success', 'Culture enregistrée avec succès.');
    }

    public function show(string $id)
    {
        $culture = Culture::with('culturecommentaires')->findOrFail($id);
        return view('admin.cultures.show', compact('culture'));
    }

    public function edit(string $id)
    {
        $culture = Culture::findOrFail($id);
        return view('admin.cultures.edit', compact('culture'));
    }

    public function update(Request $request, string $id)
    {
        $culture = Culture::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reference' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lien_youtube1' => 'nullable|url|max:255',
            'lien_youtube2' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image1')) {
            $culture->image1 = $request->file('image1')->store('cultures/images', 'public');
        }

        if ($request->hasFile('image2')) {
            $culture->image2 = $request->file('image2')->store('cultures/images', 'public');
        }

        $culture->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'reference' => $request->reference,
            'image1' => $culture->image1,
            'image2' => $culture->image2,
            'lien_youtube1' => $request->lien_youtube1,
            'lien_youtube2' => $request->lien_youtube2,
        ]);

        return redirect()->route('cultures.index')->with('success', 'Culture mise à jour avec succès.');
    }

    public function destroy(string $id)
    {
        $culture = Culture::findOrFail($id);
        $culture->delete();
        return redirect()->route('cultures.index')->with('success', 'Culture supprimée avec succès.');
    }

    public function destroyCommentaire($cultureId, $commentaireId)
    {
        // On récupère le commentaire lié à la culture
        $commentaire = \App\Models\Culturecommentaire::where('id', $commentaireId)
            ->where('culture_id', $cultureId)
            ->firstOrFail();

        $commentaire->delete();

        return redirect()->route('admin.cultures.show', $cultureId)
            ->with('success', 'Commentaire supprimé avec succès.');
    }
}