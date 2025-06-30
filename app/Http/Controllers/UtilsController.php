<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilsController extends Controller
{
    public static function saveCustomTheme(Request $request)
    {
        // Chemin vers le fichier JSON
        $filePath = storage_path('app/public/theme_config.json');

        // Crée le fichier s'il n'existe pas
        if (!file_exists($filePath)) {
            // Assure que le dossier existe
            if (!is_dir(dirname($filePath))) {
                mkdir(dirname($filePath), 0755, true);
            }

            // Crée un fichier JSON vide avec une structure par défaut
            file_put_contents($filePath, json_encode([
                'theme' => '',
                'type' => '',
                'headercolor' => '',
                'sidebarcolor' => ''
            ], JSON_PRETTY_PRINT));
        }

        // Lecture du fichier JSON existant
        $config = json_decode(file_get_contents($filePath), true);

        // Détermine la classe à enregistrer selon le type
        switch ($request->type) {
            case "header":
                $config['headercolor'] = $request->colorClass;
                $config['type'] = 'header';
                break;

            case "sidebar":
                $config['sidebarcolor'] = $request->colorClass;
                $config['type'] = 'sidebar';
                break;
            case "theme":
                $config['theme'] = $request->colorClass;
                $config['type'] = 'theme';
                break;
            case "sidebar-state":
                $config['menu'] = $request->colorClass;
               /* $config['type'] = 'theme';*/
                break;

            default:
                return response()->json(['success' => false, 'message' => "Type de couleur inconnu"], 400);
        }

        // Enregistrement dans le fichier JSON
        if (file_put_contents($filePath, json_encode($config, JSON_PRETTY_PRINT))) {
            return response()->json(['success' => true, 'message' => "Enregistrement effectué"], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Échec d'enregistrement"], 400);
        }
    }


    public static function getCustomTheme()
    {
        $filePath = storage_path('app/public/theme_config.json');

        // Crée le fichier avec une structure par défaut s’il n’existe pas
        if (!file_exists($filePath)) {
            if (!is_dir(dirname($filePath))) {
                mkdir(dirname($filePath), 0755, true);
            }

            file_put_contents($filePath, json_encode([
                'theme' => '',
                'type' => '',
                'headercolor' => '',
                'sidebarcolor' => '',
                'menu' => ''
            ], JSON_PRETTY_PRINT));
        }

        // Lire le contenu du fichier JSON
        $config = json_decode(file_get_contents($filePath), true);

        // Sécurité : si la lecture échoue ou retourne null
        if (!is_array($config)) {
            return [
                'theme' => '',
                'type' => '',
                'headercolor' => '',
                'sidebarcolor' => '',
                'menu' => ''
            ];
        }

        return [
            'menu' => $config['menu'] ?? '',
            'type' => $config['type'] ?? '',
            'theme' => $config['theme'] ?? '',
            'headercolor' => $config['headercolor'] ?? '',
            'sidebarcolor' => $config['sidebarcolor'] ?? ''
        ];
    }



}
