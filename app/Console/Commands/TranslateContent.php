<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TranslationService;
use App\Models\Project;
use App\Models\Article;
use App\Models\Event;
use App\Models\Activity;

class TranslateContent extends Command
{
    protected $signature = 'content:translate
                           {--model= : Le modèle à traduire (project, article, event, activity, all)}
                           {--source=fr : Langue source}
                           {--force : Forcer la retraduction même si déjà traduit}';

    protected $description = 'Traduire automatiquement le contenu dans toutes les langues';

    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        parent::__construct();
        $this->translationService = $translationService;
    }

    public function handle()
    {
        $model = $this->option('model') ?? 'all';
        $sourceLanguage = $this->option('source');
        $force = $this->option('force');

        $this->info("🌍 Début de la traduction automatique...");

        switch ($model) {
            case 'project':
                $this->translateProjects($sourceLanguage, $force);
                break;
            case 'article':
                $this->translateArticles($sourceLanguage, $force);
                break;
            case 'event':
                $this->translateEvents($sourceLanguage, $force);
                break;
            case 'activity':
                $this->translateActivities($sourceLanguage, $force);
                break;
            case 'all':
                $this->translateProjects($sourceLanguage, $force);
                $this->translateArticles($sourceLanguage, $force);
                $this->translateEvents($sourceLanguage, $force);
                $this->translateActivities($sourceLanguage, $force);
                break;
            default:
                $this->error("Modèle non supporté: {$model}");
                return 1;
        }

        $this->info("✅ Traduction terminée!");
        return 0;
    }

    protected function translateProjects(string $sourceLanguage, bool $force)
    {
        $this->info("📁 Traduction des projets...");

        $projects = Project::all();
        $bar = $this->output->createProgressBar($projects->count());

        foreach ($projects as $project) {
            if (!$force && $this->translationService->isFullyTranslated($project->title ?? [])) {
                $bar->advance();
                continue;
            }

            $this->translationService->translateModel(
                $project,
                ['title', 'description', 'content'],
                $sourceLanguage
            );

            $bar->advance();
        }

        $bar->finish();
        $this->line("");
    }

    protected function translateArticles(string $sourceLanguage, bool $force)
    {
        $this->info("📰 Traduction des articles...");

        $articles = Article::all();
        $bar = $this->output->createProgressBar($articles->count());

        foreach ($articles as $article) {
            if (!$force && $this->translationService->isFullyTranslated($article->title ?? [])) {
                $bar->advance();
                continue;
            }

            $this->translationService->translateModel(
                $article,
                ['title', 'excerpt', 'content'],
                $sourceLanguage
            );

            $bar->advance();
        }

        $bar->finish();
        $this->line("");
    }

    protected function translateEvents(string $sourceLanguage, bool $force)
    {
        $this->info("🗓️ Traduction des événements...");

        $events = Event::all();
        $bar = $this->output->createProgressBar($events->count());

        foreach ($events as $event) {
            if (!$force && $this->translationService->isFullyTranslated($event->title ?? [])) {
                $bar->advance();
                continue;
            }

            $this->translationService->translateModel(
                $event,
                ['title', 'description', 'content', 'location_details'],
                $sourceLanguage
            );

            $bar->advance();
        }

        $bar->finish();
        $this->line("");
    }

    protected function translateActivities(string $sourceLanguage, bool $force)
    {
        $this->info("🎯 Traduction des activités...");

        $activities = Activity::all();
        $bar = $this->output->createProgressBar($activities->count());

        foreach ($activities as $activity) {
            if (!$force && $this->translationService->isFullyTranslated($activity->title ?? [])) {
                $bar->advance();
                continue;
            }

            $this->translationService->translateModel(
                $activity,
                ['title', 'description', 'content', 'impact_metrics'],
                $sourceLanguage
            );

            $bar->advance();
        }

        $bar->finish();
        $this->line("");
    }
}
