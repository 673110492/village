<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable',
            'url' => 'nullable|url'
        ]);

        $data = $request->only('name', 'url');
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }
        $data['is_active'] = true;
        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire ajouté avec succès.');
    }

    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable',
            'url' => 'nullable|url'
        ]);

        $data = $request->only('name', 'url');
        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire mis à jour avec succès.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partenaire supprimé avec succès.');
    }

    public function toggleStatus(Partner $partner)
    {
        $partner->is_active = ! $partner->is_active;
        $partner->save();

        return redirect()->back()->with('success', 'Statut mis à jour.');
    }
}