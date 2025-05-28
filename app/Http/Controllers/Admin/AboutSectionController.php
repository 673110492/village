<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

class AboutSectionController extends Controller
{
    public function index()
    {
        $abouts = AboutSection::all();
        return view('admin.about_sections.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about_sections.create');
    }

    public function store(Request $request)
    {
        // ✅ 1. Validation des données
        $data = $request->validate([
            'slug'         => 'required|unique:about_sections,slug',
            'image'        => 'nullable|image',
            'lient_youtube' => 'nullable|string',
            'contenu'      => 'nullable|string',
        ]);

        // ✅ 2. Gestion du téléversement de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('abouts/images', 'public');
        }

        // ✅ 3. Par défaut, rendre actif l'élément
        $data['is_active'] = true;

        AboutSection::create($data);

        return redirect()
            ->route('admin.about_sections.index')
            ->with('success', 'A propos créé avec succès.');
    }








    public function show(AboutSection $aboutSection)
    {
        $about = $aboutSection;
        return view('admin.about_sections.show', compact('about'));
    }

    public function edit(AboutSection $aboutSection)
    {
        $about = $aboutSection;
        return view('admin.about_sections.edit', compact('about'));
    }


    public function update(Request $request, AboutSection $aboutSection)
    {
        // Validation des données du formulaire
        $data = $request->validate([
            'slug'          => 'required|unique:about_sections,slug,' . $aboutSection->id,
            'image'         => 'nullable|image|max:1024000',
            'lient_youtube'  => 'nullable|string',
            'contenu'       => 'nullable|string',
        ]);

        // Mise à jour de l'image si un nouveau fichier est fourni
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            // Stocker la nouvelle image
            $data['image'] = $request->file('image')->store('abouts/images', 'public');
        }

        // Mise à jour de la section "A propos"
        $aboutSection->update($data);

        // Redirection avec message de succès
        return redirect()
            ->route('admin.about_sections.index')
            ->with('success', 'A propos modifié avec succès.');
    }



    public function destroy(AboutSection $aboutSection)
    {
        // Supprimer l'image si elle existe
        if ($aboutSection->image) {
            Storage::disk('public')->delete($aboutSection->image);
        }

        // Supprimer la section "A propos"
        $aboutSection->delete();

        return redirect()->route('admin.about_sections.index')->with('success', 'A propos supprimé avec succès.');
    }

    public function toggleStatus(AboutSection $aboutSection)
    {
        // Activer ou désactiver la section "A propos"
        if (! $aboutSection->is_active) {
            AboutSection::where('is_active', true)->update(['is_active' => false]);
            $aboutSection->is_active = true;
        } else {
            $aboutSection->is_active = false;
        }

        $aboutSection->save();

        return redirect()->route('admin.about_sections.index')->with('success', 'Statut mis à jour avec succès.');
    }
}