<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }
    
    public function updateInfos(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
    
        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'phone', 'address']));
    
        return back()->with('success', 'Informations mises à jour avec succès.');
    }
    
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Auth::user();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            // dd($user);
            $user->update(['photo' => $path]);
        }
    
        return back()->with('success', 'Photo de profil mise à jour.');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }
    
        $user->update(['password' => Hash::make($request->password)]);
        Auth::logout(); // 🔐 Déconnexion

    return redirect()->route('login')->with('status', 'Mot de passe modifié avec succès. Veuillez vous reconnecter.');
    }
    
}
