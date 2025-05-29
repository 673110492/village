<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class TradictionController extends Controller
{
    // Affiche la liste des événements culturels
    public function index()
    {
        $cultures = Culture::latest()->get();
        return view('front.culture', compact('cultures'));
    }

    // Affiche le détail d’un événement
    public function show($id)
    {
        $culture = Culture::with('culturecommentaires')->findOrFail($id);
        return view('front.culture_detail', compact('culture'));
    }


    public function storeCommentaire(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required|string',
            'auteur' => 'nullable|string|max:255',
            'photo' => 'nullable',
        ]);

        $culture = Culture::findOrFail($id);

        $data = $request->only('contenu', 'auteur');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('commentaires', 'public');
        }

        $culture->culturecommentaires()->create($data);

        return redirect()->route('cultures.show', $id)->with('success', 'Commentaire ajouté avec succès.');
    }


    
}