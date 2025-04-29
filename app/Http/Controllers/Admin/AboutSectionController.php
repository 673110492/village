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
        // Validation des données du formulaire
        $data = $request->validate([
            'slug' => 'required|unique:about_sections,slug',
            'image' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,avi,mov,webm|max:20000',
            'contenu' => 'nullable|string',
        ]);

        // Upload de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('abouts/images', 'public');
        }

        // Upload de la vidéo
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            if ($videoFile->isValid()) { // Vérification de la validité du fichier vidéo
                $data['video'] = $videoFile->store('abouts/videos', 'public');
            } else {
                // Si le fichier vidéo est invalide, afficher un message d'erreur
                return redirect()->route('admin.about_sections.create')->with('error', 'Le fichier vidéo n\'est pas valide.');
            }
        }

        // Marquer comme actif par défaut
        $data['is_active'] = true;

        // Créer la section "A propos"
        AboutSection::create($data);

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
        // Validation des données du formulaire
        $data = $request->validate([
            'slug' => 'required|unique:about_sections,slug,' . $aboutSection->id,
            'image' => 'nullable|image|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov,webm|max:1024000',
            'contenu' => 'nullable|string',
        ]);

        // Mise à jour de l'image si elle est présente
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            $data['image'] = $request->file('image')->store('abouts/images', 'public');
        }

        // Mise à jour de la vidéo si elle est présente
        if ($request->hasFile('video')) {
            // Vérification de la validité du fichier vidéo
            $videoFile = $request->file('video');
            if ($videoFile->isValid()) {
                // Supprimer l'ancienne vidéo si elle existe
                if ($aboutSection->video) {
                    Storage::disk('public')->delete($aboutSection->video);
                }
                $data['video'] = $videoFile->store('abouts/videos', 'public');
            } else {
                // Si le fichier vidéo est invalide, afficher un message d'erreur
                return redirect()->route('admin.about_sections.edit', $aboutSection->id)->with('error', 'Le fichier vidéo n\'est pas valide.');
            }
        }

        // Mise à jour de la section "A propos"
        $aboutSection->update($data);

        return redirect()->route('admin.about_sections.index')->with('success', 'Apropos modifié avec succès.');
    }

    public function destroy(AboutSection $aboutSection) {
        // Supprimer l'image et la vidéo si elles existent
        if ($aboutSection->image) {
            Storage::disk('public')->delete($aboutSection->image);
        }
        if ($aboutSection->video) {
            Storage::disk('public')->delete($aboutSection->video);
        }
        // Supprimer la section "A propos"
        $aboutSection->delete();
        return redirect()->route('admin.about_sections.index')->with('success', 'Apropos supprimé avec succès.');
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
