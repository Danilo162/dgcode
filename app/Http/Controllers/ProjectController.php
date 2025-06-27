<?php
// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

// ===== ProjectController =====
class ProjectController extends Controller
{
    public function index()
    {
        $projets = [
            ['id' => 1, 'titre' => 'AgriTech Africa', 'slug' => 'agritech-africa', 'statut' => 'en_cours'],
            ['id' => 2, 'titre' => 'Énergie Solaire', 'slug' => 'energie-solaire', 'statut' => 'en_cours']
        ];
        return view('projects.index', compact('projets'));
    }

    public function show($slug)
    {
        $projet = ['id' => 1, 'titre' => 'AgriTech Africa', 'slug' => $slug, 'description' => 'Description du projet'];
        return view('projets.show', compact('projet'));
    }

    public function category($category)
    {
        $projets = [['titre' => 'Projet ' . $category]];
        return view('projets.category', compact('projets', 'category'));
    }

    public function status($status)
    {
        $projets = [['titre' => 'Projet avec statut ' . $status]];
        return view('projets.status', compact('projets', 'status'));
    }

    public function search(Request $request)
    {
        return response()->json([['titre' => 'Résultat recherche']]);
    }
}
