<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Project;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index(){
        $abouts = AboutSection::all();
        $projects = Project::all();

        return view('front.index', compact('abouts','projects'));
    }
}
