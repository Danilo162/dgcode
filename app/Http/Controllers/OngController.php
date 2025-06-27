<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OngController extends Controller
{
    /**
     * Afficher le profil d'une ONG
     */
    public function show($slug)
    {
     //   dd($slug);
        // Données des ONG (vous pouvez les stocker en base de données plus tard)
        $ongs = $this->getOngsData();

        // Vérifier si l'ONG existe
        if (!isset($ongs[$slug])) {
            abort(404, 'ONG non trouvée');
        }

        $ong = $ongs[$slug];

        // Récupérer les données dynamiques
        $ong['actualites'] = $this->getOngActualites($slug);
        $ong['projets'] = $this->getOngProjets($slug);
        $ong['activites'] = $this->getOngActivites($slug);
        $ong['evenements'] = $this->getOngEvenements($slug);
        $ong['formations'] = $this->getOngFormations($slug);
        $ong['statistiques'] = $this->getOngStatistiques($slug);

       /* dd($slug);*/
        return view('ong.index', compact('ong', 'slug'));
    }

    /**
     * Afficher la liste de toutes les ONG
     */
    public function index()
    {
        $ongs = $this->getOngsData();

        // Ajouter les statistiques pour chaque ONG
        foreach ($ongs as $slug => &$ong) {
            $ong['statistiques'] = $this->getOngStatistiques($slug);
        }

        return view('ong.index', compact('ongs'));
    }

    /**
     * Traiter le formulaire de contact d'une ONG
     */
    public function contact(Request $request, $slug)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'pays' => 'nullable|string|max:100',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'nom.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être valide',
            'sujet.required' => 'Le sujet est obligatoire',
            'message.required' => 'Le message est obligatoire',
            'message.min' => 'Le message doit contenir au moins 10 caractères',
        ]);

        // Enregistrer le message en base de données
        DB::table('ong_messages')->insert([
            'ong_slug' => $slug,
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'pays' => $request->pays,
            'sujet' => $request->sujet,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Envoyer une notification email (optionnel)
        // Mail::to($ong['email'])->send(new OngContactMail($request->all()));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }

    /**
     * Données statiques des ONG (à migrer en base de données)
     */
    private function getOngsData()
    {
        return [
            'stay-in-africa' => [
                'nom' => 'STAY IN AFRICA',
                'slug' => 'stay-in-africa',
                'description' => 'Organisation dédiée au développement durable et à l\'autonomisation des communautés africaines à travers des projets innovants et des partenariats stratégiques.',
                'logo' => '/images/ong/stay-in-africa-logo.png',
                'cover_image' => '/images/ong/stay-in-africa-cover.jpg',
                'mission' => 'STAY IN AFRICA est une organisation panafricaine qui œuvre pour le développement durable du continent en encourageant les jeunes africains à rester sur le continent et à contribuer à son développement.',
                'vision' => 'Une Afrique prospère où chaque jeune trouve les opportunités nécessaires pour s\'épanouir et contribuer au développement de son continent.',
                'valeurs' => ['Excellence', 'Innovation', 'Intégrité', 'Durabilité'],
                'annee_creation' => 2018,
                'siege' => [
                    'adresse' => '123 Avenue de l\'Innovation, Plateau, Abidjan',
                    'pays' => 'Côte d\'Ivoire',
                    'telephone' => '+225 27 20 XX XX XX',
                    'email' => 'contact@stayinafrica.org',
                    'site_web' => 'https://stayinafrica.org'
                ],
                'reseaux_sociaux' => [
                    'facebook' => 'https://facebook.com/stayinafrica',
                    'twitter' => 'https://twitter.com/stayinafrica',
                    'linkedin' => 'https://linkedin.com/company/stayinafrica',
                    'instagram' => 'https://instagram.com/stayinafrica',
                    'youtube' => 'https://youtube.com/stayinafrica'
                ]
            ],
            'ecosoc' => [
                'nom' => 'ECOSOC',
                'slug' => 'ecosoc',
                'description' => 'Organisation focalisée sur le développement économique et social durable en Afrique.',
                'logo' => '/images/ong/ecosoc-logo.png',
                'cover_image' => '/images/ong/ecosoc-cover.jpg',
                'mission' => 'Promouvoir le développement économique et social durable à travers des initiatives communautaires.',
                'vision' => 'Une société africaine économiquement forte et socialement équitable.',
                'valeurs' => ['Équité', 'Durabilité', 'Innovation', 'Partenariat'],
                'annee_creation' => 2015,
                'siege' => [
                    'adresse' => '456 Boulevard du Développement, Dakar',
                    'pays' => 'Sénégal',
                    'telephone' => '+221 33 XX XX XX',
                    'email' => 'contact@ecosoc.org',
                    'site_web' => 'https://ecosoc.org'
                ],
                'reseaux_sociaux' => [
                    'facebook' => 'https://facebook.com/ecosoc',
                    'twitter' => 'https://twitter.com/ecosoc',
                    'linkedin' => 'https://linkedin.com/company/ecosoc'
                ]
            ],
            'believe-in-the-world' => [
                'nom' => 'BELIEVE IN THE WORLD',
                'slug' => 'believe-in-the-world',
                'description' => 'Organisation internationale œuvrant pour l\'éducation et l\'autonomisation des jeunes.',
                'logo' => '/images/ong/believe-logo.png',
                'cover_image' => '/images/ong/believe-cover.jpg',
                'mission' => 'Croire en un monde où chaque jeune a accès à l\'éducation et aux opportunités.',
                'vision' => 'Un monde où l\'éducation transforme les vies et les communautés.',
                'valeurs' => ['Éducation', 'Espoir', 'Transformation', 'Inclusion'],
                'annee_creation' => 2012,
                'siege' => [
                    'adresse' => '789 Education Street, Accra',
                    'pays' => 'Ghana',
                    'telephone' => '+233 30 XX XX XX',
                    'email' => 'contact@believeintheworld.org',
                    'site_web' => 'https://believeintheworld.org'
                ],
                'reseaux_sociaux' => [
                    'facebook' => 'https://facebook.com/believeintheworld',
                    'instagram' => 'https://instagram.com/believeintheworld'
                ]
            ]
            // Ajoutez d'autres ONG ici...
        ];
    }

    /**
     * Récupérer les actualités d'une ONG
     */
    private function getOngActualites($slug)
    {
        // En attendant la base de données, retourner des données exemple
        $actualites = [
            'stay-in-africa' => [
                [
                    'id' => 1,
                    'titre' => 'Lancement du programme "Jeunes Entrepreneurs Africains 2025"',
                    'resume' => 'Nous sommes fiers d\'annoncer le lancement de notre nouveau programme destiné à accompagner 500 jeunes entrepreneurs africains.',
                    'contenu' => 'Contenu complet de l\'actualité...',
                    'image' => '/images/actualites/programme-entrepreneurs.jpg',
                    'date_publication' => Carbon::now()->subDays(5),
                    'auteur' => 'STAY IN AFRICA',
                    'categorie' => 'Développement'
                ],
                [
                    'id' => 2,
                    'titre' => 'Nouveau partenariat avec l\'Union Africaine',
                    'resume' => 'Signature d\'un accord de partenariat stratégique avec l\'Union Africaine pour le développement de projets d\'infrastructure.',
                    'contenu' => 'Contenu complet de l\'actualité...',
                    'image' => '/images/actualites/partenariat-ua.jpg',
                    'date_publication' => Carbon::now()->subDays(10),
                    'auteur' => 'STAY IN AFRICA',
                    'categorie' => 'Partenariat'
                ]
            ]
        ];

        return $actualites[$slug] ?? [];
    }

    /**
     * Récupérer les projets d'une ONG
     */
    private function getOngProjets($slug)
    {
        $projets = [
            'stay-in-africa' => [
                [
                    'id' => 1,
                    'titre' => 'Projet AgriTech for Africa',
                    'description' => 'Digitalisation de l\'agriculture africaine à travers l\'introduction de technologies innovantes.',
                    'budget' => 2500000,
                    'devise' => 'EUR',
                    'localisation' => 'Kenya, Ghana, Nigeria',
                    'date_debut' => Carbon::create(2024, 1, 1),
                    'date_fin' => Carbon::create(2026, 12, 31),
                    'progression' => 65,
                    'statut' => 'en_cours',
                    'image' => '/images/projets/agritech.jpg',
                    'objectifs' => [
                        'Former 1000 agriculteurs aux nouvelles technologies',
                        'Installer 50 centres de données agricoles',
                        'Créer 500 emplois dans le secteur AgriTech'
                    ]
                ],
                [
                    'id' => 2,
                    'titre' => 'Énergie Solaire Communautaire',
                    'description' => 'Installation de systèmes solaires dans 50 villages pour fournir un accès durable à l\'électricité.',
                    'budget' => 1800000,
                    'devise' => 'EUR',
                    'localisation' => 'Sénégal, Mali, Burkina Faso',
                    'date_debut' => Carbon::create(2025, 1, 1),
                    'date_fin' => Carbon::create(2027, 12, 31),
                    'progression' => 30,
                    'statut' => 'en_cours',
                    'image' => '/images/projets/energie-solaire.jpg',
                    'objectifs' => [
                        'Électrifier 50 villages ruraux',
                        'Former 200 techniciens solaires',
                        'Créer 300 micro-entreprises énergétiques'
                    ]
                ]
            ]
        ];

        return $projets[$slug] ?? [];
    }

    /**
     * Récupérer les activités d'une ONG
     */
    private function getOngActivites($slug)
    {
        $activites = [
            'stay-in-africa' => [
                [
                    'titre' => 'Ateliers de Mentorat Jeunes',
                    'description' => 'Sessions mensuelles de mentorat pour accompagner les jeunes dans leurs projets entrepreneuriaux.',
                    'frequence' => 'Mensuel',
                    'participants' => '200+ participants',
                    'type' => 'Formation'
                ],
                [
                    'titre' => 'Forum des Innovations Africaines',
                    'description' => 'Événements trimestriels rassemblant innovateurs, investisseurs et décideurs.',
                    'frequence' => 'Trimestriel',
                    'participants' => 'Multi-pays',
                    'type' => 'Networking'
                ]
            ]
        ];

        return $activites[$slug] ?? [];
    }

    /**
     * Récupérer les événements d'une ONG
     */
    private function getOngEvenements($slug)
    {
        $evenements = [
            'stay-in-africa' => [
                [
                    'titre' => 'Sommet de l\'Innovation Africaine',
                    'description' => 'Rassemblement des leaders de l\'innovation du continent.',
                    'date' => Carbon::create(2025, 7, 25),
                    'lieu' => 'Accra, Ghana',
                    'type' => 'Conférence',
                    'places_disponibles' => 500,
                    'prix' => 'Gratuit',
                    'lien_inscription' => '/evenements/sommet-innovation-2025'
                ],
                [
                    'titre' => 'Workshop AgriTech',
                    'description' => 'Formation intensive sur les technologies agricoles.',
                    'date' => Carbon::create(2025, 8, 10),
                    'lieu' => 'Kigali, Rwanda',
                    'type' => 'Formation',
                    'places_disponibles' => 100,
                    'prix' => '50 USD',
                    'lien_inscription' => '/evenements/workshop-agritech-2025'
                ]
            ]
        ];

        return $evenements[$slug] ?? [];
    }

    /**
     * Récupérer les formations d'une ONG
     */
    private function getOngFormations($slug)
    {
        $formations = [
            'stay-in-africa' => [
                [
                    'titre' => 'Formation Entrepreneuriat Digital',
                    'description' => 'Programme complet pour développer ses compétences entrepreneuriales dans le digital.',
                    'duree' => '3 mois',
                    'format' => 'Hybride (présentiel + en ligne)',
                    'prochaine_session' => Carbon::create(2025, 9, 1),
                    'prix' => 'Gratuit',
                    'places' => 50,
                    'niveau' => 'Débutant à Intermédiaire',
                    'certification' => true
                ],
                [
                    'titre' => 'Certification Gestion de Projet',
                    'description' => 'Formation certifiante en gestion de projet selon les standards internationaux.',
                    'duree' => '6 semaines',
                    'format' => 'En ligne',
                    'prochaine_session' => Carbon::create(2025, 8, 1),
                    'prix' => '200 USD',
                    'places' => 30,
                    'niveau' => 'Intermédiaire',
                    'certification' => true
                ]
            ]
        ];

        return $formations[$slug] ?? [];
    }

    /**
     * Récupérer les statistiques d'une ONG
     */
    private function getOngStatistiques($slug)
    {
        $stats = [
            'stay-in-africa' => [
                'projets_actifs' => 25,
                'pays_intervention' => 12,
                'beneficiaires' => 5000,
                'partenaires' => 15,
                'budget_total' => 10000000, // en EUR
                'formations_donnees' => 150,
                'emplois_crees' => 800
            ],
            'ecosoc' => [
                'projets_actifs' => 18,
                'pays_intervention' => 8,
                'beneficiaires' => 3500,
                'partenaires' => 10,
                'budget_total' => 6000000,
                'formations_donnees' => 120,
                'emplois_crees' => 600
            ]
        ];

        return $stats[$slug] ?? [
            'projets_actifs' => 0,
            'pays_intervention' => 0,
            'beneficiaires' => 0,
            'partenaires' => 0
        ];
    }

    /**
     * Rechercher dans les ONG
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $ongs = $this->getOngsData();

        $results = [];

        foreach ($ongs as $slug => $ong) {
            if (stripos($ong['nom'], $query) !== false ||
                stripos($ong['description'], $query) !== false) {
                $ong['statistiques'] = $this->getOngStatistiques($slug);
                $results[$slug] = $ong;
            }
        }

        return view('ong.search', compact('results', 'query'));
    }
}
