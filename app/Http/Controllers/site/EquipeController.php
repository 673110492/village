<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    // Liste de tous les membres
    public function index(){
        $equipes = Team::all();
        return view('front.equipe', compact('equipes'));
    }

    // Détail d'un membre
    public function show($id){
        $membre = Team::findOrFail($id);
        return view('front.equipe_detail', compact('membre'));
    }
}
