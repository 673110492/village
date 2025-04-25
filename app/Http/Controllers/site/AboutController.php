<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts = AboutSection::all();
        $teams = Team::all();

        return view('front.about', compact('abouts','teams'));
    }
}
