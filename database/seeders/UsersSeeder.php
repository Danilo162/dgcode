<?php

// Seeder: database/seeders/UsersSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenir l'ID de la Côte d'Ivoire pour les utilisateurs par défaut
        $coteIvoireId = DB::table('countries')->where('code', 'CI')->first()->id ?? 1;

        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@gdd.org',
                'password' => Hash::make('12345678@'),
                'phone' => '+225 01 02 03 04 05',
                'language_preference' => 'fr',
                'status' => 'active',
                'email_verified_at' => now(),
                'role' => 'super-admin'
            ],
            [
                'name' => 'Administrateur',
                'email' => 'admin.system@gdd.org',
                'password' => Hash::make('12345678@'),
                'phone' => '+225 01 02 03 04 06',
                'language_preference' => 'fr',
                'status' => 'active',
                'email_verified_at' => now(),
                'role' => 'admin'
            ],
            [

                'name' => 'Jean-Baptiste',
                'email' => 'coordinator@gdd.org',
                'password' => Hash::make('12345678@'),
                'phone' => '+225 07 08 09 10 11',
                'language_preference' => 'fr',
                'status' => 'active',
                'email_verified_at' => now(),
                'role' => 'project-coordinator'
            ],

        ];

        foreach ($users as $userData) {
            // Créer l'utilisateur
            $userId = DB::table('users')->insertGetId([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'phone' => $userData['phone'],
                'language_preference' => $userData['language_preference'],
                'timezone' => 'Africa/Abidjan',
                'status' => $userData['status'],
                'email_verified_at' => $userData['email_verified_at'],
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
            ]);

            // Assigner le rôle
            $role = DB::table('roles')->where('slug', $userData['role'])->first();
            if ($role) {
                DB::table('user_roles')->insert([
                    'user_id' => $userId,
                    'role_id' => $role->id,
                    'assigned_by' => 1,
                    'assigned_at' => now(),
                    'start_date' => now()->toDateString(),
                    'is_active' => true,
                    'notes' => 'Utilisateur créé lors du seeding initial',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'created_by' => 1,
                ]);
            }
        }

        $this->command->info('✅ ' . count($users) . ' utilisateurs créés avec succès!');
        $this->displayLoginCredentials();
    }

    /**
     * Afficher les informations de connexion
     */
    private function displayLoginCredentials(): void
    {
        $this->command->line('');
        $this->command->info('🔐 INFORMATIONS DE CONNEXION:');
        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');

        $credentials = [
            ['Super Admin', 'admin@gdd.org', '12345678@'],
            ['Administrateur', 'admin.system@gdd-ci.org', '12345678@'],
            ['Coordinateur', 'coordinator@gdd.org', '12345678@'],
        /*    ['Gestionnaire Contenu', 'content@gdd.org', '12345678@'],
            ['Resp. Communication', 'communication@gdd.org', '12345678@'],*/
        ];

        foreach ($credentials as $cred) {
            $this->command->line(sprintf(
                '%-20s | %-30s | %s',
                $cred[0],
                $cred[1],
                $cred[2]
            ));
        }

        $this->command->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->warn('⚠️  IMPORTANT: Changez ces mots de passe en production!');
        $this->command->line('');
    }
}
