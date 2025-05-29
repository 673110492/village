<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Women_emporment;
use Illuminate\Http\Request;

class WomentemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $womenValues = Women_emporment::latest()->get();
        return view('admin.women.index', compact('womenValues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.women.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'nullable|string',
            'description' => 'nullable|string',
            'lien_youtube1' => 'nullable|url',
            'lien_youtube2' => 'nullable|url',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'nullable|date',
            'status' => 'required|in:activé,désactivé',
        ]);

        $data = $request->all();

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('images/women', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('images/women', 'public');
        }

        Women_emporment::create($data);

        return redirect()->route('admin.women.index')->with('success', 'Valeur ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $value = Women_emporment::findOrFail($id);
        return view('admin.women.show', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $value = Women_emporment::findOrFail($id);
        return view('admin.women.edit', compact('value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $value = Women_emporment::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'edition' => 'nullable|string',
            'description' => 'nullable|string',
            'lien_youtube1' => 'nullable|url',
            'lien_youtube2' => 'nullable|url',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'nullable|date',
            'status' => 'required|in:activé,désactivé',
        ]);

        $data = $request->all();

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('images/women', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('images/women', 'public');
        }

        $value->update($data);

        return redirect()->route('admin.women.index')->with('success', 'Valeur mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $value = Women_emporment::findOrFail($id);
        $value->delete();

        return redirect()->route('admin.women.index')->with('success', 'Valeur supprimée avec succès.');
    }

    /**
     * Activer ou désactiver une valeur.
     */
    public function toggleStatus(string $id)
    {
        $value = Women_emporment::findOrFail($id);

        $value->status = $value->status === 'activé' ? 'désactivé' : 'activé';
        $value->save();

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }
}