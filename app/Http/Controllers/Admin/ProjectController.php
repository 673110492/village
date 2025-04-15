<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $project = Project::create($request->only(['slug', 'image', 'description']));
        return redirect()->route('projects.index');
    }

    public function edit(Project $project) {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $project->update($request->only(['slug', 'image', 'description']));
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
