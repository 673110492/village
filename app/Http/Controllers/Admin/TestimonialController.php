<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Affiche la liste des temoignages.
     */
    public function index()
    {
        $temoignages = Testimonial::all();
        return view('admin.temoignages.index', compact('temoignages'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.temoignages.create');
    }

    /**
     * Enregistre un nouveau temoignage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'fonction' => 'required',
            'photo' => 'nullable',
            'contenu' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Gestion du fichier photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('temoignages', 'public');
        }

        // Par défaut, un temoignage est actif
        $data['is_active'] = true;

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'temoignage créé avec succès.');
    }

    /**
     * Affiche les détails d'un temoignage.
     */
    public function show(int $id)
    {
        $temoignage = Testimonial::findOrFail($id);
        return view('admin.temoignages.show', compact('temoignage'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(int $id)
    {
        $temoignage = Testimonial::findOrFail($id);
        return view('admin.temoignages.edit', compact('temoignage'));
    }

    /**
     * Met à jour un temoignage.
     */
    public function update(Request $request, int $id)
    {
        $temoignage = Testimonial::findOrFail($id);  $data = $request->validate([
            'name' => 'required',
            'fonction' => 'required',
            'photo' => 'nullable',
            'contenu' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si existante
            if ($temoignage->photo) {
                Storage::disk('public')->delete($temoignage->photo);
            }
            $data['photo'] = $request->file('photo')->store('temoignages', 'public');
        }

        $temoignage->update($data);

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'temoignage mis à jour avec succès.');
    }

    /**
     * Supprime un temoignage.
     */
    public function destroy(int $id)
    {
        $temoignage = Testimonial::findOrFail($id);
        if ($temoignage->photo) {
            Storage::disk('public')->delete($temoignage->photo);
        }
        $temoignage->delete();

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'temoignage supprimé.');
    }

    /**
     * Bascule l'état actif/inactif du temoignage.
     */
    public function toggleStatus(int $id)
    {
        $temoignage = Testimonial::findOrFail($id);
        $temoignage->is_active = ! $temoignage->is_active;
        $temoignage->save();

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'Statut du temoignage mis à jour.');
    }
}