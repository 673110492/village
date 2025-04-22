<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function index()
    {
        $values = CompanyValue::all();
        return view('admin.values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        $data['is_active'] = true;
        CompanyValue::create($data);

        return redirect()->route('admin.values.index')->with('success', 'value ajoutée avec succès.');
    }
    public function show(CompanyValue $value)
    {
        return view('admin.values.show', compact('value'));
    }
    public function edit(CompanyValue $value)
    {
        return view('admin.values.edit', compact('value'));
    }

    public function update(Request $request, CompanyValue $value)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $value->update($request->all());

        return redirect()->route('admin.values.index')->with('success', 'value modifiée avec succès.');
    }

    public function destroy(CompanyValue $value)
    {
        $value->delete();
        return redirect()->route('admin.values.index')->with('success', 'value supprimée avec succès.');
    }

    public function toggleStatus($id)
    {
        $value = CompanyValue::findOrFail($id);
        $value->is_active = !$value->is_active;
        $value->save();

        return redirect()->route('admin.values.index')->with('success', 'statut modifiée avec succès.');
    }
}
