<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\TranslationHelper;

class ServiceController extends Controller
{
    /**
     * Affiche la liste des services.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Enregistre un nouveau service.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|unique:services,slug',
            'image' => 'nullable',
            'description' => 'nullable|string',
        ]);
    
        // Gestion de l'image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }
    
        // Le service est actif par défaut
        $data['is_active'] = true;
    
        // Création du service
        $service = Service::create($data);
    
        // Enregistrement en français (par défaut)
        // ServiceTranslation::create([
        //     'service_id' => $service->id,
        //     'locale' => 'fr',
        //     'title' => $data['slug'],
        //     'description' => $data['description'],
        // ]);
    
        // Langues à traduire
        // $languages = ['en', 'es'];
    
        // foreach ($languages as $lang) {
        //     $translatedTitle = TranslationHelper::translateText($data['slug'], $lang);
        //     $translatedDescription = TranslationHelper::translateText($data['description'], $lang);
    
        //     ServiceTranslation::create([
        //         'service_id' => $service->id,
        //         'locale' => $lang,
        //         'title' => $translatedTitle,
        //         'description' => $translatedDescription,
        //     ]);
        // }
    
        return redirect()->route('admin.services.index')
                         ->with('success', 'Service créé avec succès.');
    }

    /**
     * Affiche les détails d'un service.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Met à jour un service.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'slug' => 'required',
            'image' => 'nullable',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si existante
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service mis à jour avec succès.');
    }

    /**
     * Supprime un service.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service supprimé.');
    }

    /**
     * Bascule l'état actif/inactif du service.
     */
    public function toggleStatus(Service $service)
    {
        $service->is_active = ! $service->is_active;
        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Statut du service mis à jour.');
    }
}