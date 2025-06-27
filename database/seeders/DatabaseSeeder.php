<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Début du seeding de la base de données GDD...');
        $this->command->line('');

        // Ordre d'exécution important pour respecter les contraintes de clés étrangères
        $this->call([
            // 1. Tables de base (sans dépendances)
            CountriesSeeder::class,
            RolesAndPermissionsSeeder::class,

            // 2. Utilisateurs (dépend des rôles)
            UsersSeeder::class,

            // 3. Catégories et ODD
            CategoriesSeeder::class,
            OddGoalsSeeder::class,

            // 4. Optionnel : Données de démonstration
            // DemoDataSeeder::class,
        ]);

        $this->command->line('');
        $this->command->info('🎉 Seeding terminé avec succès!');
        $this->command->line('');
        $this->displaySummary();
    }

    /**
     * Afficher un résumé des données créées
     */
    private function displaySummary(): void
    {
        $this->command->info('📊 RÉSUMÉ DES DONNÉES CRÉÉES:');
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

        $summary = [
            ['Pays', '65+ pays (focus Afrique de l\'Ouest)'],
            ['Rôles', '9 rôles (Super Admin → Observateur)'],
            ['Permissions', '80+ permissions granulaires'],
            ['Utilisateurs', '9 utilisateurs de test'],
            ['Catégories', '15+ catégories multilingues'],
            ['ODD', '17 Objectifs de Développement Durable'],
        ];

        foreach ($summary as $item) {
            $this->command->line(sprintf(
                '%-15s | %s',
                $item[0],
                $item[1]
            ));
        }

        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

        $this->command->line('');
        $this->command->info('🚀 PROCHAINES ÉTAPES:');
        $this->command->line('1. Connectez-vous avec: admin@gdd-ci.org / SuperAdmin@2024');
        $this->command->line('2. Changez les mots de passe par défaut');
        $this->command->line('3. Configurez les régions et villes');
        $this->command->line('4. Créez votre première organisation GDD');
        $this->command->line('5. Ajoutez vos premiers projets et contenus');
        $this->command->line('');
    }
}
