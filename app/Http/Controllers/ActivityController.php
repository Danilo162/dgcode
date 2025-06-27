<?php
// app/Http/Controllers/ActivityController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activites = [
            ['id' => 1, 'titre' => 'Mentorat Entrepreneurs', 'slug' => 'mentorat', 'type' => 'formation'],
            ['id' => 2, 'titre' => 'Forum Innovation', 'slug' => 'forum-innovation', 'type' => 'networking']
        ];
        return view('activites.index', compact('activites'));
    }

    public function show($slug)
    {
        $activite = ['id' => 1, 'titre' => 'Activité', 'slug' => $slug, 'description' => 'Description'];
        return view('activites.show', compact('activite'));
    }

    public function type($type)
    {
        $activites = [['titre' => 'Activité de type ' . $type]];
        return view('activites.type', compact('activites', 'type'));
    }
}
