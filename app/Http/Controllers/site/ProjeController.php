<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Project;  // Assure-toi d'importer le modèle Project
use Illuminate\Http\Request;

class ProjeController extends Controller
{
    // Fonction pour afficher tous les projets
    public function index()
    {
        $projects = Project::all();  // Récupère tous les projets
        return view('front.projet', compact('projects'));  // Renvoie la vue avec les projets
    }

    // Fonction pour afficher les détails d'un projet spécifique
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $otherProjects = Project::all();

        return view('front.projet_detail', compact('project','otherProjects'));
    }
}
