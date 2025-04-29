<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = AboutSection::all();
        $teams = Team::all();
        $projects = Project::all();

        return view('front.about', compact('abouts', 'teams', 'projects'));
    }

    public function show($id)
    {
        
        $project = Project::findOrFail($id);
        return view('front.projet_detail', compact('project'));
    }
}
