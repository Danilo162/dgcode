<?php
// app/Http/Controllers/AboutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function quiSommesNous()
    {
        $data = [
            'histoire' => 'Notre histoire depuis 2010',
            'valeurs' => ['Excellence', 'Innovation', 'Intégrité'],
            'equipe' => [['nom' => 'Dr. Aminata Traoré', 'poste' => 'Directrice']]
        ];
        return view('about.qui-sommes-nous', $data);
    }

    public function organigramme()
    {
        $structure = ['niveau_1' => 'Direction Générale'];
        return view('about.organigramme', compact('structure'));
    }

    public function nosMissions()
    {
        $mission = ['enonce' => 'Contribuer au développement durable de l\'Afrique'];
        return view('about.nos-missions', compact('mission'));
    }
}
