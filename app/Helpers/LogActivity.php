<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;

class LogActivity
{
    public static function addToLog($subject, $action, $status = 'success', $details = null)
    {
        $log = [
            'timestamp'  => now()->format('Y-m-d H:i:s'),
            'ip'         => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'subject'    => $subject,
            'action'     => $action,
            'status'     => $status,
            'details'    => $details,
            'url'        => Request::fullUrl(),
            'method'     => Request::method(),
        ];

        // Créer le dossier logs s'il n'existe pas
        $logPath = storage_path('logs/activity');
        if (!File::exists($logPath)) {
            File::makeDirectory($logPath, 0777, true);
        }

   /*     dd($logPath);*/
        // Créer un fichier log par jour
        $filename = $logPath . '/activity-' . now()->format('Y-m') . '.log';

        // Formater le message de log
        $logMessage = json_encode($log, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";

        // Écrire dans le fichier
        File::append($filename, $logMessage);
    }
}
