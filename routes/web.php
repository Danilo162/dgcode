<?php
// routes/web.php - VERSION MISE À JOUR

use App\Http\Controllers\OngController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ===== PAGE D'ACCUEIL =====
Route::get('/', [HomeController::class, 'index'])->name('home');

// ===== ACTUALITÉS =====
Route::get('/actualites', [NewsController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{slug}', [NewsController::class, 'show'])->name('actualites.show');
Route::get('/actualites/categorie/{category}', [NewsController::class, 'category'])->name('actualites.category');

// ===== PROJETS =====
Route::get('/projets', [ProjectController::class, 'index'])->name('projets.index');
Route::get('/projets/{slug}', [ProjectController::class, 'show'])->name('projets.show');
Route::get('/projets/categorie/{category}', [ProjectController::class, 'category'])->name('projets.category');
Route::get('/projets/statut/{status}', [ProjectController::class, 'status'])->name('projets.status');

// ===== ÉVÉNEMENTS =====
Route::get('/evenements', [EventController::class, 'index'])->name('evenements.index');
Route::get('/evenements/{slug}', [EventController::class, 'show'])->name('evenements.show');
Route::post('/evenements/{slug}/inscription', [EventController::class, 'register'])->name('evenements.register');
Route::get('/evenements/calendrier', [EventController::class, 'calendar'])->name('evenements.calendar');

// ===== ACTIVITÉS =====
Route::get('/activites', [ActivityController::class, 'index'])->name('activites.index');
Route::get('/activites/{slug}', [ActivityController::class, 'show'])->name('activites.show');
Route::get('/activites/type/{type}', [ActivityController::class, 'type'])->name('activites.type');

// ===== FORMATIONS =====
Route::get('/formations', [TrainingController::class, 'index'])->name('formations.index');
Route::get('/formations/{slug}', [TrainingController::class, 'show'])->name('formations.show');
Route::post('/formations/{slug}/candidature', [TrainingController::class, 'apply'])->name('formations.apply');
Route::get('/formations/domaine/{domain}', [TrainingController::class, 'domain'])->name('formations.domain');

// ===== GALERIE =====
Route::get('/galerie/photos', [GalleryController::class, 'photos'])->name('galerie.photos');
Route::get('/galerie/videos', [GalleryController::class, 'videos'])->name('galerie.videos');
Route::get('/galerie/albums/{album}', [GalleryController::class, 'album'])->name('galerie.album');
Route::get('/galerie/photo/{id}', [GalleryController::class, 'photo'])->name('galerie.photo');

// ===== À PROPOS =====
Route::get('/qui-sommes-nous', [AboutController::class, 'quiSommesNous'])->name('qui-sommes-nous');
Route::get('/organigramme', [AboutController::class, 'organigramme'])->name('organigramme');
Route::get('/nos-missions', [AboutController::class, 'nosMissions'])->name('nos-missions');

// ===== CONTACT =====
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ===== NOUS REJOINDRE =====
Route::get('/nous-rejoindre', [HomeController::class, 'nousRejoindre'])->name('nous-rejoindre');
Route::post('/nous-rejoindre', [HomeController::class, 'submitJoinUs'])->name('nous-rejoindre.submit');

// ===== ONG PARTENAIRES =====
Route::get('/ong/{slug}', [OngController::class, 'show'])->name('ong.profile');
Route::post('/ong/{slug}/contact', [OngController::class, 'contact'])->name('ong.contact');

// ===== API ROUTES (optionnelles) =====
Route::get('/api/projets/search', [ProjectController::class, 'search'])->name('api.projets.search');
Route::get('/api/evenements/upcoming', [EventController::class, 'upcoming'])->name('api.evenements.upcoming');
Route::get('/api/actualites/recent', [NewsController::class, 'recent'])->name('api.actualites.recent');
Route::get('/api/galerie/random', [GalleryController::class, 'random'])->name('api.galerie.random');

// Routes additionnelles pour fonctionnalités spéciales
Route::prefix('special')->name('special.')->group(function () {
    // Newsletter subscription
    Route::post('/newsletter/subscribe', function (Illuminate\Http\Request $request) {
        $request->validate(['email' => 'required|email']);

        // Ici vous pourriez sauvegarder l'email en base de données
        // ou l'envoyer vers un service comme Mailchimp, SendGrid, etc.

        return response()->json([
            'success' => true,
            'message' => 'Inscription à la newsletter réussie !'
        ]);
    })->name('newsletter.subscribe');

    // Search functionality
    Route::get('/search', function (Illuminate\Http\Request $request) {
        $query = $request->get('q');

        // Simuler une recherche dans le contenu
        $results = [
            'projects' => [],
            'activities' => [],
            'news' => [],
            'events' => []
        ];

        return response()->json([
            'query' => $query,
            'results' => $results,
            'total' => 0
        ]);
    })->name('search');

    // Contact form submission with enhanced validation
    Route::post('/contact/submit', function (Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'type' => 'required|in:general,partnership,volunteer,donation,project'
        ]);

        // Ici vous pourriez :
        // - Sauvegarder en base de données
        // - Envoyer un email
        // - Intégrer avec un CRM

        return response()->json([
            'success' => true,
            'message' => 'Votre message a été envoyé avec succès !'
        ]);
    })->name('contact.submit');
});

// Redirections pour compatibilité (optionnel)
Route::redirect('/home', '/');
Route::redirect('/actualites', '/news');
Route::redirect('/nouvelles', '/news');

// Sitemap XML (pour SEO)
Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => route('home'), 'priority' => '1.0'],
        ['loc' => route('about'), 'priority' => '0.9'],
        ['loc' => route('activities.index'), 'priority' => '0.9'],
        ['loc' => route('projects.index'), 'priority' => '0.9'],
        ['loc' => route('events.index'), 'priority' => '0.8'],
        ['loc' => route('news.index'), 'priority' => '0.8'],
        ['loc' => route('trainings.index'), 'priority' => '0.8'],
        ['loc' => route('gallery.index'), 'priority' => '0.7'],
        ['loc' => route('contact.index'), 'priority' => '0.7'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . $url['loc'] . '</loc>';
        $xml .= '<priority>' . $url['priority'] . '</priority>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// Robots.txt
Route::get('/robots.txt', function () {
    $content = "User-agent: *\n";
    $content .= "Disallow: /admin/\n";
    $content .= "Disallow: /api/\n";
    $content .= "Allow: /\n\n";
    $content .= "Sitemap: " . route('sitemap') . "\n";

    return response($content, 200, ['Content-Type' => 'text/plain']);
})->name('robots');

// Route de fallback pour les pages non trouvées (404 personnalisé)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Routes de développement (uniquement en mode local)
if (app()->environment('local')) {
    Route::prefix('dev')->name('dev.')->group(function () {
        // Test des emails
        Route::get('/test-email', function () {
            // Tester l'envoi d'emails
            return 'Test email functionality';
        });

        // Test des données
        Route::get('/test-data', function () {
            // Afficher les données de test
            return response()->json([
                'activities' => app(ActivityController::class)->getAllActivities(),
                'projects' => app(ProjectController::class)->getAllProjects(),
                'news' => app(NewsController::class)->getAllNews()
            ]);
        });

        // Générateur de données factices
        Route::get('/generate-fake-data', function () {
            // Générer des données factices pour les tests
            return 'Fake data generated successfully';
        });
    });
}
