<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public function index() {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function edit(Setting $setting) {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting) {
        $setting->update($request->only(['key', 'logo', 'adresse', 'email', 'tel1', 'tel2', 'value']));
        return redirect()->route('settings.index');
    }
}