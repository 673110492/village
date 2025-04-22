<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMission;
use Illuminate\Http\Request;

class CompanyMissionController extends Controller
{
    public function index()
    {
        $missions = CompanyMission::all();
        return view('admin.missions.index', compact('missions'));
    }

    public function create()
    {
        return view('admin.missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        $data['is_active'] = true;
        CompanyMission::create($data);

        return redirect()->route('admin.missions.index')->with('success', 'Mission ajoutée avec succès.');
    }
    public function show(CompanyMission $mission)
    {
        return view('admin.missions.show', compact('mission'));
    }
    public function edit(CompanyMission $mission)
    {
        return view('admin.missions.edit', compact('mission'));
    }

    public function update(Request $request, CompanyMission $mission)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $mission->update($request->all());

        return redirect()->route('admin.missions.index')->with('success', 'Mission modifiée avec succès.');
    }

    public function destroy(CompanyMission $mission)
    {
        $mission->delete();
        return redirect()->route('admin.missions.index')->with('success', 'Mission supprimée avec succès.');
    }

    public function toggleStatus($id)
    {
        $mission = CompanyMission::findOrFail($id);
        $mission->is_active = !$mission->is_active;
        $mission->save();

        return redirect()->route('admin.missions.index')->with('success', 'statut modifiée avec succès.');
    }
}
