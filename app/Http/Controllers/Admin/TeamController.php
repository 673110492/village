<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Affiche la liste des projects.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Enregistre un nouveau project.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required|string',
            'fonction' => 'required|string',
            'tel' => 'required|string|regex:/^\+\d{8,15}$/',
            'tel' => 'required',
            'image' => 'nullable|image',
            'presentation' => 'nullable|string',

        ]);

        // Gestion du fichier image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        // Par défaut, un project est actif
        $data['is_active'] = true;
        $data['tel'] = $request->input('full_phone');

        Team::create($data);

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Membre créé avec succès.');
    }

    /**
     * Affiche les détails d'un project.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Met à jour un project.
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'tel' => 'nullable|string|max:50',
            'full_phone' => 'nullable|string|max:50',
            'presentation' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('teams', 'public');
        }
        $data['tel'] = $request->input('full_phone');
        $team->update($data);
    
        return redirect()->route('admin.teams.index')->with('success', 'Membre de l\'équipe mis à jour avec succès.');
    }
    

    /**
     * Supprime un project.
     */
    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();

        return redirect()->route('admin.teams.index')
                         ->with('success', 'team supprimé.');
    }

    /**
     * Bascule l'état actif/inactif du team.
     */
    public function toggleStatus(Team $team)
    {
        $team->is_active = ! $team->is_active;
        $team->save();

        return redirect()->route('admin.teams.index')
                         ->with('success', 'Statut du team mis à jour.');
    }
}
