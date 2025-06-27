<?php

namespace App\services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslationService
{
    protected $translator;
    protected $supportedLanguages = ['fr', 'en', 'ar'];
    protected $sourceLanguage = 'fr'; // Langue source par défaut

    public function __construct()
    {
        $this->translator = new GoogleTranslate();
    }

    /**
     * Traduire un texte vers toutes les langues supportées
     */
    public function translateToAllLanguages(string $text, string $sourceLanguage = 'fr'): array
    {
        $translations = [];

        // Ajouter le texte source
        $translations[$sourceLanguage] = $text;

        foreach ($this->supportedLanguages as $targetLanguage) {
            if ($targetLanguage === $sourceLanguage) {
                continue;
            }

            $translations[$targetLanguage] = $this->translateText($text, $sourceLanguage, $targetLanguage);
        }

        return $translations;
    }

    /**
     * Traduire un texte d'une langue vers une autre
     */
    public function translateText(string $text, string $from, string $to): string
    {
        // Clé de cache unique
        $cacheKey = "translation." . md5($text . $from . $to);

        // Vérifier le cache d'abord
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            $this->translator->setSource($from);
            $this->translator->setTarget($to);
            $translatedText = $this->translator->translate($text);

            // Mettre en cache pour 24 heures
            Cache::put($cacheKey, $translatedText, now()->addHours(24));

            return $translatedText;

        } catch (\Exception $e) {
            Log::error('Translation failed: ' . $e->getMessage(), [
                'text' => $text,
                'from' => $from,
                'to' => $to
            ]);

            // Retourner le texte original en cas d'erreur
            return $text;
        }
    }

    /**
     * Traduire automatiquement un modèle
     */
    public function translateModel($model, array $fields, string $sourceLanguage = 'fr'): void
    {
        foreach ($fields as $field) {
            if (isset($model->{$field})) {
                $sourceText = is_array($model->{$field})
                    ? $model->{$field}[$sourceLanguage] ?? ''
                    : $model->{$field};

                if (!empty($sourceText)) {
                    $translations = $this->translateToAllLanguages($sourceText, $sourceLanguage);
                    $model->{$field} = $translations;
                }
            }
        }

        $model->save();
    }

    /**
     * Traduire en lot plusieurs modèles
     */
    public function batchTranslateModels($models, array $fields, string $sourceLanguage = 'fr'): void
    {
        foreach ($models as $model) {
            $this->translateModel($model, $fields, $sourceLanguage);

            // Petite pause pour éviter les limites de l'API
            usleep(100000); // 0.1 seconde
        }
    }

    /**
     * Vérifier si un champ est traduit dans toutes les langues
     */
    public function isFullyTranslated(array $translations): bool
    {
        foreach ($this->supportedLanguages as $language) {
            if (empty($translations[$language])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Obtenir les langues manquantes pour une traduction
     */
    public function getMissingLanguages(array $translations): array
    {
        $missing = [];
        foreach ($this->supportedLanguages as $language) {
            if (empty($translations[$language])) {
                $missing[] = $language;
            }
        }
        return $missing;
    }

    /**
     * Nettoyer le cache des traductions
     */
    public function clearTranslationCache(): void
    {
        $keys = Cache::get('translation_keys', []);
        foreach ($keys as $key) {
            Cache::forget($key);
        }
        Cache::forget('translation_keys');
    }
}
