<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }
    public function update(Request $request, $id)
{
    $setting = Setting::findOrFail($id);

    switch ($setting->key) {
        case 'Logo':
            if ($request->hasFile('logo')) {
                // Supprimer l'ancien fichier s'il existe
                if ($setting->logo && file_exists(public_path($setting->logo))) {
                    unlink(public_path($setting->logo));
                }

                $file = $request->file('logo');
                $filename = 'logo.' . $file->getClientOriginalExtension();
                $file->move(public_path(), $filename); // stocke directement dans /public
                $setting->logo = $filename;
            }
            break;

        case 'Adresse':
            $request->validate(['adresse' => 'required|string|max:255']);
            $setting->adresse = $request->adresse;
            break;

        case 'Email':
            $request->validate(['email' => 'required|email']);
            $setting->email = $request->email;
            break;

        case 'Téléphone1':
            $request->validate(['tel1' => 'required|string|max:20']);
            $setting->tel1 = $request->tel1;
            break;

        case 'Téléphone2':
            $request->validate(['tel2' => 'required|string|max:20']);
            $setting->tel2 = $request->tel2;
            break;

        default:
            $request->validate(['value' => 'nullable|string']);
            $setting->value = $request->value;
            break;
    }

    $setting->save();
    Cache::forget('settings_global');

    return redirect()->route('admin.settings.index')->with('success', 'Paramètre mis à jour avec succès.');
}

}