<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

// ===== EventController =====
class EventController extends Controller
{
    public function index()
    {
        $evenements = [
            ['id' => 1, 'titre' => 'Sommet 2025', 'slug' => 'sommet-2025', 'date' => Carbon::now()->addMonth()],
            ['id' => 2, 'titre' => 'Formation AgriTech', 'slug' => 'formation-agritech', 'date' => Carbon::now()->addWeeks(2)]
        ];
        return view('evenements.index', compact('evenements'));
    }

    public function show($slug)
    {
        $evenement = ['id' => 1, 'titre' => 'Événement', 'slug' => $slug, 'description' => 'Description'];
        return view('evenements.show', compact('evenement'));
    }

    public function register(Request $request, $slug)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email'
        ]);

        // Logique d'inscription simple
        return redirect()->back()->with('success', 'Inscription confirmée');
    }

    public function calendar()
    {
        $evenements = [['titre' => 'Événement', 'date' => Carbon::now()]];
        return view('evenements.calendar', compact('evenements'));
    }

    public function upcoming()
    {
        return response()->json([['titre' => 'Événement à venir']]);
    }
}
