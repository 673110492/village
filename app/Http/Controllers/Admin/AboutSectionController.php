<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index() {
        $abouts = AboutSection::all();
        return view('admin.about_sections.index', compact('abouts'));
    }

    public function create() {
        return view('admin.about_sections.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'slug' => 'required|unique:services,slug',
            'image' => 'nullable|image',
            'contenu' => 'nullable|string',
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        // Le service est actif par défaut
        $data['is_active'] = true;

        // Création du service
        $about = AboutSection::create($data);
        return redirect()->route('admin.about_sections.index')->with('success', 'Apropos créé avec succès.');
    }
    public function show(AboutSection $aboutSection)
    {
        $about = $aboutSection;
        return view('admin.about_sections.show', compact('about'));
    }
    public function edit(AboutSection $aboutSection) {
        $about = $aboutSection;
        return view('admin.about_sections.edit', compact('about'));
    }

    public function update(Request $request, AboutSection $aboutSection) {
        $data = $request->validate([
            'slug' => 'required',
            'image' => 'nullable|image|max:2048',
            'contenu' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si existante
            if ($aboutSection->image) {  // Utilise $aboutSection au lieu de $service
                Storage::disk('public')->delete($aboutSection->image);
            }
            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        $aboutSection->update($data);

        return redirect()->route('admin.about_sections.index')->with('success', 'Apropos modifié avec succès.');
    }


    public function destroy(AboutSection $aboutSection) {
        if ($aboutSection->image) {
            Storage::disk('public')->delete($aboutSection->image);
        }
        $aboutSection->delete();
        return redirect()->route('admin.about_sections.index')->with('success', 'Apropos msupprimé avec succès.');
    }
    public function toggleStatus(AboutSection $aboutSection)
{
    // Si on veut l'activer
    if (! $aboutSection->is_active) {
        // Désactiver tous les autres
        AboutSection::where('is_active', true)->update(['is_active' => false]);

        // Activer celui-ci
        $aboutSection->is_active = true;
        $aboutSection->save();
    } else {
        // Si on clique pour désactiver l'élément actif
        $aboutSection->is_active = false;
        $aboutSection->save();
    }

    return redirect()->route('admin.about_sections.index')->with('success', 'Statut mis à jour avec succès.');
}

}

