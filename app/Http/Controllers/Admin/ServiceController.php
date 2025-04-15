<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(Request $request) {
        $service = Service::create($request->only(['slug', 'image', 'description']));
        return redirect()->route('services.index');
    }

    public function edit(Service $service) {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service) {
        $service->update($request->only(['slug', 'image', 'description']));
        return redirect()->route('services.index');
    }

    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('services.index');
    }
}
