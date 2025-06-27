<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ===== HomeController MINIMAL =====


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        // Statistics data
        $stats = [
            'projects' => 150,
            'countries' => 25
        ];

        // Featured projects data
        $featured_projects = [
            [
                'title' => 'Agriculture Durable',
                'description' => 'Formation de 500 agriculteurs aux techniques d\'agriculture biologique et distribution d\'équipements modernes pour améliorer les rendements.',
                'icon' => 'fas fa-seedling',
                'period' => '2024-2026',
                'funding' => 'Banque Mondiale'
            ],
            [
                'title' => 'Accès à l\'Eau Potable',
                'description' => 'Construction de 50 forages équipés de pompes solaires dans les zones rurales du Burkina Faso et formation des comités de gestion.',
                'icon' => 'fas fa-tint',
                'period' => '2024-2025',
                'funding' => 'Union Européenne'
            ],
            [
                'title' => 'Énergie Renouvelable',
                'description' => 'Installation de systèmes solaires dans 30 villages isolés, électrification de centres de santé et écoles avec formation technique locale.',
                'icon' => 'fas fa-solar-panel',
                'period' => '2025-2027',
                'funding' => 'AFD'
            ]
        ];

        // Upcoming events data
        $upcoming_events = [
            [
                'title' => 'Forum Régional du Développement Durable',
                'date' => '2025-07-15',
                'location' => 'Abidjan, Côte d\'Ivoire',
                'participants' => '200'
            ],
            [
                'title' => 'Atelier Formation Entrepreneuriat Féminin',
                'date' => '2025-07-22',
                'location' => 'Ouagadougou, Burkina Faso',
                'participants' => '50'
            ],
            [
                'title' => 'Conférence Changement Climatique en Afrique',
                'date' => '2025-08-10',
                'location' => 'Dakar, Sénégal',
                'participants' => '300'
            ]
        ];

        // Partners data
        $partners = collect([
            [
                'name' => 'Banque Mondiale',
                'abbreviation' => 'BM',
                'description' => 'Financement de projets d\'infrastructures et de développement rural en Afrique de l\'Ouest.',
                'since' => '2020'
            ],
            [
                'name' => 'Union Européenne',
                'abbreviation' => 'UE',
                'description' => 'Soutien aux programmes d\'éducation, santé et gouvernance démocratique.',
                'since' => '2019'
            ],
            [
                'name' => 'Agence Française de Développement',
                'abbreviation' => 'AFD',
                'description' => 'Partenaire pour les projets d\'énergie renouvelable et d\'adaptation climatique.',
                'since' => '2021'
            ],
            [
                'name' => 'Programme des Nations Unies',
                'abbreviation' => 'PNUD',
                'description' => 'Collaboration sur les objectifs de développement durable et la réduction de la pauvreté.',
                'since' => '2018'
            ],
            [
                'name' => 'Banque Africaine de Développement',
                'abbreviation' => 'BAD',
                'description' => 'Financement d\'infrastructures et de projets de transformation agricole.',
                'since' => '2022'
            ],
            [
                'name' => 'Fondation Gates',
                'abbreviation' => 'FG',
                'description' => 'Soutien aux initiatives de santé publique et d\'innovation technologique.',
                'since' => '2023'
            ]
        ]);

        return view('index', compact('stats', 'featured_projects', 'upcoming_events', 'partners'));
    }

    public function nousRejoindre()
    {
        $opportunites = [
            [
                'titre' => 'Chargé de Projet',
                'type' => 'emploi',
                'description' => 'Gestion et suivi des projets de développement en Afrique de l\'Ouest',
                'lieu' => 'Abidjan',
                'contrat' => 'CDI'
            ],
            [
                'titre' => 'Coordinateur Formation',
                'type' => 'emploi',
                'description' => 'Animation d\'ateliers de formation et développement de capacités',
                'lieu' => 'Ouagadougou',
                'contrat' => 'CDD 24 mois'
            ],
            [
                'titre' => 'Bénévole Terrain',
                'type' => 'benevolat',
                'description' => 'Accompagnement des communautés locales dans la mise en œuvre des projets',
                'lieu' => 'Multi-pays',
                'contrat' => 'Mission 6 mois'
            ]
        ];

        return view('nous-rejoindre', compact('opportunites'));
    }

    public function submitJoinUs(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'poste' => 'required|string',
            'motivation' => 'required|string|min:50',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        // Store CV file
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Here you would typically:
        // 1. Save to database
        // 2. Send notification email
        // 3. Process the application

        // For now, just return success
        return redirect()->back()->with('success', 'Votre candidature a été envoyée avec succès. Nous vous contacterons prochainement.');
    }
}
