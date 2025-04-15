<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
class PartnerController extends Controller
{
    public function index() {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create() {
        return view('admin.partners.create');
    }

    public function store(Request $request) {
        $partner = Partner::create($request->only(['name', 'logo', 'url']));
        return redirect()->route('partners.index');
    }

    public function edit(Partner $partner) {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner) {
        $partner->update($request->only(['name', 'logo', 'url']));
        return redirect()->route('partners.index');
    }

    public function destroy(Partner $partner) {
        $partner->delete();
        return redirect()->route('partners.index');
    }
}
