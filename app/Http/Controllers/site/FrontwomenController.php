<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Women_emporment;
use Illuminate\Http\Request;

class FrontwomenController extends Controller
{
    public function index()
    {
        $wemen = Women_emporment::where('status', 'activé')->latest()->get();
        return view('front.women', compact('wemen'));
    }

    // Affiche le détail d'un élément Women_emporment
    public function show($id)
    {
        $item = Women_emporment::findOrFail($id);
        return view('front.women_show', compact('item'));
    }
}