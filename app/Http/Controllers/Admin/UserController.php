<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendGeneratedPassword;
class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable',
            'address' => 'nullable|string|max:255',
        ]);
    
        // Générer un mot de passe aléatoire
        $password = Str::random(8);
    
        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($password),
        ]);
    
        // Envoyer le mot de passe à l'utilisateur par mail
        Mail::to($user->email)->send(new SendGeneratedPassword($user, $password));
    
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'phone'   => 'nullable',
            'address' => 'nullable|string|max:255',
        ]);

        // Mise à jour des données
        $user->update($validated);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Utilisateur mis à jour avec succès.');
    }
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}