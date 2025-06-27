<?php

// Seeder: database/seeders/RolesAndPermissionsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer d'abord les permissions
        $this->createPermissions();

        // Puis créer les rôles
        $this->createRoles();

        // Ensuite assigner les permissions aux rôles
        $this->assignPermissionsToRoles();

        $this->command->info('✅ Rôles et permissions créés avec succès!');
    }

    /**
     * Créer les permissions du système
     */
    private function createPermissions(): void
    {
        $modules = [
            'users' => ['create', 'read', 'update', 'delete', 'manage_roles'],
            'organizations' => ['create', 'read', 'update', 'delete', 'manage_partnerships'],
            'projects' => ['create', 'read', 'update', 'delete', 'publish', 'manage'],
            'articles' => ['create', 'read', 'update', 'delete', 'publish'],
            'events' => ['create', 'read', 'update', 'delete', 'publish', 'manage_registrations'],
            'trainings' => ['create', 'read', 'update', 'delete', 'publish', 'manage_registrations'],
            'categories' => ['create', 'read', 'update', 'delete'],
            'galleries' => ['create', 'read', 'update', 'delete', 'upload'],
            'testimonials' => ['create', 'read', 'update', 'delete', 'approve'],
            'newsletter' => ['create', 'read', 'update', 'delete', 'send'],
            'contacts' => ['read', 'update', 'respond', 'assign'],
            'immigration' => ['create', 'read', 'update', 'delete', 'manage_cases'],
            'odd_goals' => ['read', 'manage'],
            'tasks' => ['create', 'read', 'update', 'delete', 'assign'],
            'reports' => ['read', 'generate', 'export'],
            'audit' => ['read'],
            'settings' => ['read', 'update'],
        ];

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                DB::table('permissions')->insert([
                    'name' => ucfirst($action) . ' ' . ucfirst($module),
                    'slug' => $module . '.' . $action,
                    'module' => $module,
                    'action' => $action,
                    'description' => json_encode([
                        'fr' => $this->getPermissionDescription($action, $module, 'fr'),
                        'en' => $this->getPermissionDescription($action, $module, 'en'),
                        'ar' => $this->getPermissionDescription($action, $module, 'ar')
                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'created_by' => 1,
                ]);
            }
        }
    }

    /**
     * Créer les rôles du système
     */
    private function createRoles(): void
    {
        $roles = [
            [
                'name' => 'Super Administrateur',
                'slug' => 'super-admin',
                'description' => [
                    'fr' => 'Accès complet à toutes les fonctionnalités du système',
                    'en' => 'Full access to all system features',
                    'ar' => 'وصول كامل لجميع ميزات النظام'
                ],
                'is_system_role' => true
            ],
            [
                'name' => 'Administrateur',
                'slug' => 'admin',
                'description' => [
                    'fr' => 'Gestion des contenus et des utilisateurs',
                    'en' => 'Content and user management',
                    'ar' => 'إدارة المحتوى والمستخدمين'
                ],
                'is_system_role' => true
            ],
            [
                'name' => 'Coordinateur de Projet',
                'slug' => 'project-coordinator',
                'description' => [
                    'fr' => 'Gestion et coordination des projets',
                    'en' => 'Project management and coordination',
                    'ar' => 'إدارة وتنسيق المشاريع'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Gestionnaire de Contenu',
                'slug' => 'content-manager',
                'description' => [
                    'fr' => 'Création et gestion des contenus éditoriaux',
                    'en' => 'Creation and management of editorial content',
                    'ar' => 'إنشاء وإدارة المحتوى التحريري'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Responsable Communication',
                'slug' => 'communication-manager',
                'description' => [
                    'fr' => 'Gestion des communications et événements',
                    'en' => 'Communication and event management',
                    'ar' => 'إدارة الاتصالات والأحداث'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Formateur',
                'slug' => 'trainer',
                'description' => [
                    'fr' => 'Animation et gestion des formations',
                    'en' => 'Training facilitation and management',
                    'ar' => 'تسهيل وإدارة التدريب'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Assistant Administratif',
                'slug' => 'admin-assistant',
                'description' => [
                    'fr' => 'Support administratif et gestion des contacts',
                    'en' => 'Administrative support and contact management',
                    'ar' => 'الدعم الإداري وإدارة جهات الاتصال'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Partenaire',
                'slug' => 'partner',
                'description' => [
                    'fr' => 'Accès limité pour les organisations partenaires',
                    'en' => 'Limited access for partner organizations',
                    'ar' => 'وصول محدود للمنظمات الشريكة'
                ],
                'is_system_role' => false
            ],
            [
                'name' => 'Observateur',
                'slug' => 'observer',
                'description' => [
                    'fr' => 'Accès en lecture seule aux informations publiques',
                    'en' => 'Read-only access to public information',
                    'ar' => 'وصول للقراءة فقط للمعلومات العامة'
                ],
                'is_system_role' => false
            ]
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'slug' => $role['slug'],
                'description' => json_encode($role['description']),
                'is_system_role' => $role['is_system_role'],
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
            ]);
        }
    }

    /**
     * Assigner les permissions aux rôles
     */
    private function assignPermissionsToRoles(): void
    {
        // Super Admin : toutes les permissions
        $superAdminRole = DB::table('roles')->where('slug', 'super-admin')->first();
        $allPermissions = DB::table('permissions')->get();

        foreach ($allPermissions as $permission) {
            DB::table('role_permissions')->insert([
                'role_id' => $superAdminRole->id,
                'permission_id' => $permission->id
            ]);
        }

        // Admin : presque toutes les permissions sauf gestion système
        $adminRole = DB::table('roles')->where('slug', 'admin')->first();
        $adminPermissions = DB::table('permissions')
            ->whereNotIn('slug', ['users.manage_roles', 'settings.update', 'audit.read'])
            ->get();

        foreach ($adminPermissions as $permission) {
            DB::table('role_permissions')->insert([
                'role_id' => $adminRole->id,
                'permission_id' => $permission->id
            ]);
        }

        // Coordinateur de Projet
        $this->assignSpecificPermissions('project-coordinator', [
            'projects.*', 'tasks.*', 'organizations.read', 'users.read',
            'categories.read', 'galleries.*', 'reports.read', 'reports.generate'
        ]);

        // Gestionnaire de Contenu
        $this->assignSpecificPermissions('content-manager', [
            'articles.*', 'galleries.*', 'categories.read', 'testimonials.*',
            'projects.read', 'events.read', 'trainings.read'
        ]);

        // Responsable Communication
        $this->assignSpecificPermissions('communication-manager', [
            'events.*', 'newsletter.*', 'articles.create', 'articles.read',
            'articles.update', 'galleries.*', 'testimonials.read', 'testimonials.approve'
        ]);

        // Formateur
        $this->assignSpecificPermissions('trainer', [
            'trainings.*', 'events.create', 'events.read', 'events.update',
            'galleries.create', 'galleries.read', 'galleries.upload'
        ]);

        // Assistant Administratif
        $this->assignSpecificPermissions('admin-assistant', [
            'contacts.*', 'immigration.*', 'newsletter.read', 'users.read',
            'events.read', 'trainings.read', 'projects.read'
        ]);

        // Partenaire
        $this->assignSpecificPermissions('partner', [
            'projects.read', 'articles.read', 'events.read', 'trainings.read',
            'organizations.read', 'galleries.read', 'testimonials.create'
        ]);

        // Observateur
        $this->assignSpecificPermissions('observer', [
            'projects.read', 'articles.read', 'events.read', 'trainings.read',
            'galleries.read', 'organizations.read'
        ]);
    }

    /**
     * Assigner des permissions spécifiques à un rôle
     */
    private function assignSpecificPermissions(string $roleSlug, array $permissionPatterns): void
    {
        $role = DB::table('roles')->where('slug', $roleSlug)->first();

        foreach ($permissionPatterns as $pattern) {
            if (str_ends_with($pattern, '*')) {
                // Pattern avec wildcard
                $module = str_replace('.*', '', $pattern);
                $permissions = DB::table('permissions')->where('module', $module)->get();
            } else {
                // Permission spécifique
                $permissions = DB::table('permissions')->where('slug', $pattern)->get();
            }

            foreach ($permissions as $permission) {
                // Vérifier si la relation n'existe pas déjà
                $exists = DB::table('role_permissions')
                    ->where('role_id', $role->id)
                    ->where('permission_id', $permission->id)
                    ->exists();

                if (!$exists) {
                    DB::table('role_permissions')->insert([
                        'role_id' => $role->id,
                        'permission_id' => $permission->id
                    ]);
                }
            }
        }
    }

    /**
     * Obtenir la description traduite d'une permission
     */
    private function getPermissionDescription(string $action, string $module, string $lang): string
    {
        $translations = [
            'fr' => [
                'create' => 'Créer des ' . $module,
                'read' => 'Voir les ' . $module,
                'update' => 'Modifier les ' . $module,
                'delete' => 'Supprimer les ' . $module,
                'publish' => 'Publier les ' . $module,
                'manage' => 'Gérer les ' . $module,
                'approve' => 'Approuver les ' . $module,
                'assign' => 'Assigner les ' . $module,
                'send' => 'Envoyer les ' . $module,
                'upload' => 'Télécharger dans ' . $module,
                'generate' => 'Générer les ' . $module,
                'export' => 'Exporter les ' . $module,
                'respond' => 'Répondre aux ' . $module,
            ],
            'en' => [
                'create' => 'Create ' . $module,
                'read' => 'View ' . $module,
                'update' => 'Update ' . $module,
                'delete' => 'Delete ' . $module,
                'publish' => 'Publish ' . $module,
                'manage' => 'Manage ' . $module,
                'approve' => 'Approve ' . $module,
                'assign' => 'Assign ' . $module,
                'send' => 'Send ' . $module,
                'upload' => 'Upload to ' . $module,
                'generate' => 'Generate ' . $module,
                'export' => 'Export ' . $module,
                'respond' => 'Respond to ' . $module,
            ],
            'ar' => [
                'create' => 'إنشاء ' . $module,
                'read' => 'عرض ' . $module,
                'update' => 'تحديث ' . $module,
                'delete' => 'حذف ' . $module,
                'publish' => 'نشر ' . $module,
                'manage' => 'إدارة ' . $module,
                'approve' => 'الموافقة على ' . $module,
                'assign' => 'تعيين ' . $module,
                'send' => 'إرسال ' . $module,
                'upload' => 'رفع إلى ' . $module,
                'generate' => 'توليد ' . $module,
                'export' => 'تصدير ' . $module,
                'respond' => 'الرد على ' . $module,
            ]
        ];

        return $translations[$lang][$action] ?? ucfirst($action) . ' ' . $module;
    }
}
