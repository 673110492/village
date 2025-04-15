<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    public function index() {
        $sections = AboutSection::all();
        return view('admin.about_sections.index', compact('sections'));
    }

    public function create() {
        return view('admin.about_sections.create');
    }

    public function store(Request $request) {
        $section = AboutSection::create($request->only(['slug', 'image', 'contenu']));
        return redirect()->route('about_sections.index');
    }

    public function edit(AboutSection $aboutSection) {
        return view('admin.about_sections.edit', compact('aboutSection'));
    }

    public function update(Request $request, AboutSection $aboutSection) {
        $aboutSection->update($request->only(['slug', 'image', 'contenu']));
        return redirect()->route('about_sections.index');
    }

    public function destroy(AboutSection $aboutSection) {
        $aboutSection->delete();
        return redirect()->route('about_sections.index');
    }
}

