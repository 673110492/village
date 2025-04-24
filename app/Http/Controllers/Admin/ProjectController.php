<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Affiche la liste des projects.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Enregistre un nouveau project.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|unique:projects,slug',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        // Gestion du fichier image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        // Par défaut, un project est actif
        $data['is_active'] = true;

        Project::create($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project créé avec succès.');
    }

    /**
     * Affiche les détails d'un project.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Met à jour un project.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'slug' => 'required|unique:projects,slug,' . $project->id,
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si existante
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project mis à jour avec succès.');
    }

    /**
     * Supprime un project.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project supprimé.');
    }

    /**
     * Bascule l'état actif/inactif du project.
     */
    public function toggleStatus(Project $project)
    {
        $project->is_active = ! $project->is_active;
        $project->save();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Statut du project mis à jour.');
    }
}
