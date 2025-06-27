<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        // Langues supportées
        $supportedLanguages = ['fr', 'en', 'ar'];

        // Récupérer la langue depuis l'URL
        $locale = $request->segment(1);

        // Si la langue n'est pas dans l'URL ou n'est pas supportée, utiliser français par défaut
        if (!in_array($locale, $supportedLanguages)) {
            $locale = 'fr';
        }

        // Définir la locale de l'application
        App::setLocale($locale);

        // Sauvegarder en session pour la persistance
        Session::put('locale', $locale);

        return $next($request);
    }
}
