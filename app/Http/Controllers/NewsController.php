<?php
// app/Http/Controllers/NewsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $actualites = [
            ['id' => 1, 'titre' => 'Lancement AgriTech', 'slug' => 'agritech-2025', 'date' => Carbon::now()],
            ['id' => 2, 'titre' => 'Partenariat UA', 'slug' => 'partenariat-ua', 'date' => Carbon::now()->subDays(5)]
        ];
        return view('actualites.index', compact('actualites'));
    }

    public function show($slug)
    {
        $actualite = ['id' => 1, 'titre' => 'Actualité', 'slug' => $slug, 'contenu' => 'Contenu de l\'actualité'];
        return view('actualites.show', compact('actualite'));
    }

    public function category($category)
    {
        $actualites = [['titre' => 'Actualité catégorie ' . $category]];
        return view('actualites.category', compact('actualites', 'category'));
    }

    public function recent()
    {
        return response()->json([['titre' => 'Actualité récente']]);
    }
}

