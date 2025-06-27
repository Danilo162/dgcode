<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $formations = [
            ['id' => 1, 'titre' => 'Entrepreneuriat Digital', 'slug' => 'entrepreneuriat-digital', 'prix' => 0],
            ['id' => 2, 'titre' => 'Gestion Projet', 'slug' => 'gestion-projet', 'prix' => 200]
        ];
        return view('formations.index', compact('formations'));
    }

    public function show($slug)
    {
        $formation = ['id' => 1, 'titre' => 'Formation', 'slug' => $slug, 'description' => 'Description'];
        return view('formations.show', compact('formation'));
    }

    public function apply(Request $request, $slug)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'motivation' => 'required|min:50'
        ]);

        // Logique de candidature simple
        return redirect()->back()->with('success', 'Candidature envoyée');
    }

    public function domain($domain)
    {
        $formations = [['titre' => 'Formation domaine ' . $domain]];
        return view('formations.domain', compact('formations', 'domain'));
    }
}
