<?php

// Seeder: database/seeders/CategoriesSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // CATÉGORIES PROJETS
            [
                'name' => [
                    'fr' => 'Agriculture & Alimentation',
                    'en' => 'Agriculture & Food',
                    'ar' => 'الزراعة والغذاء'
                ],
                'slug' => 'agriculture-alimentation',
                'description' => [
                    'fr' => 'Projets liés à l\'agriculture durable, sécurité alimentaire et développement rural',
                    'en' => 'Projects related to sustainable agriculture, food security and rural development',
                    'ar' => 'مشاريع متعلقة بالزراعة المستدامة والأمن الغذائي والتنمية الريفية'
                ],
                'type' => 'project',
                'icon' => 'fas fa-seedling',
                'color' => '#28a745',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Eau & Assainissement',
                    'en' => 'Water & Sanitation',
                    'ar' => 'المياه والصرف الصحي'
                ],
                'slug' => 'eau-assainissement',
                'description' => [
                    'fr' => 'Accès à l\'eau potable, assainissement et gestion des ressources hydriques',
                    'en' => 'Access to clean water, sanitation and water resource management',
                    'ar' => 'الوصول إلى المياه النظيفة والصرف الصحي وإدارة الموارد المائية'
                ],
                'type' => 'project',
                'icon' => 'fas fa-tint',
                'color' => '#007bff',
                'sort_order' => 2
            ],
            [
                'name' => [
                    'fr' => 'Énergie Renouvelable',
                    'en' => 'Renewable Energy',
                    'ar' => 'الطاقة المتجددة'
                ],
                'slug' => 'energie-renouvelable',
                'description' => [
                    'fr' => 'Projets d\'énergie solaire, éolienne et autres sources renouvelables',
                    'en' => 'Solar, wind and other renewable energy projects',
                    'ar' => 'مشاريع الطاقة الشمسية والرياح ومصادر الطاقة المتجددة الأخرى'
                ],
                'type' => 'project',
                'icon' => 'fas fa-solar-panel',
                'color' => '#ffc107',
                'sort_order' => 3
            ],
            [
                'name' => [
                    'fr' => 'Santé & Bien-être',
                    'en' => 'Health & Wellness',
                    'ar' => 'الصحة والعافية'
                ],
                'slug' => 'sante-bien-etre',
                'description' => [
                    'fr' => 'Amélioration de l\'accès aux soins de santé et promotion du bien-être',
                    'en' => 'Improving access to healthcare and promoting wellness',
                    'ar' => 'تحسين الوصول إلى الرعاية الصحية وتعزيز العافية'
                ],
                'type' => 'project',
                'icon' => 'fas fa-heartbeat',
                'color' => '#dc3545',
                'sort_order' => 4
            ],
            [
                'name' => [
                    'fr' => 'Éducation & Formation',
                    'en' => 'Education & Training',
                    'ar' => 'التعليم والتدريب'
                ],
                'slug' => 'education-formation',
                'description' => [
                    'fr' => 'Projets éducatifs, alphabétisation et développement des compétences',
                    'en' => 'Educational projects, literacy and skills development',
                    'ar' => 'المشاريع التعليمية ومحو الأمية وتطوير المهارات'
                ],
                'type' => 'project',
                'icon' => 'fas fa-graduation-cap',
                'color' => '#6f42c1',
                'sort_order' => 5
            ],

            // CATÉGORIES ARTICLES/ACTUALITÉS
            [
                'name' => [
                    'fr' => 'Actualités GDD',
                    'en' => 'GDD News',
                    'ar' => 'أخبار GDD'
                ],
                'slug' => 'actualites-gdd',
                'description' => [
                    'fr' => 'Actualités et nouvelles de l\'organisation GDD',
                    'en' => 'News and updates from GDD organization',
                    'ar' => 'الأخبار والتحديثات من منظمة GDD'
                ],
                'type' => 'article',
                'icon' => 'fas fa-newspaper',
                'color' => '#17a2b8',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Rapports & Études',
                    'en' => 'Reports & Studies',
                    'ar' => 'التقارير والدراسات'
                ],
                'slug' => 'rapports-etudes',
                'description' => [
                    'fr' => 'Rapports d\'impact, études de cas et analyses',
                    'en' => 'Impact reports, case studies and analyses',
                    'ar' => 'تقارير التأثير ودراسات الحالة والتحليلات'
                ],
                'type' => 'article',
                'icon' => 'fas fa-chart-line',
                'color' => '#6c757d',
                'sort_order' => 2
            ],
            [
                'name' => [
                    'fr' => 'Communiqués de Presse',
                    'en' => 'Press Releases',
                    'ar' => 'البيانات الصحفية'
                ],
                'slug' => 'communiques-presse',
                'description' => [
                    'fr' => 'Communications officielles et annonces importantes',
                    'en' => 'Official communications and important announcements',
                    'ar' => 'الاتصالات الرسمية والإعلانات المهمة'
                ],
                'type' => 'article',
                'icon' => 'fas fa-bullhorn',
                'color' => '#fd7e14',
                'sort_order' => 3
            ],

            // CATÉGORIES ÉVÉNEMENTS
            [
                'name' => [
                    'fr' => 'Conférences & Séminaires',
                    'en' => 'Conferences & Seminars',
                    'ar' => 'المؤتمرات والندوات'
                ],
                'slug' => 'conferences-seminaires',
                'description' => [
                    'fr' => 'Événements de formation et de partage de connaissances',
                    'en' => 'Training and knowledge sharing events',
                    'ar' => 'أحداث التدريب وتبادل المعرفة'
                ],
                'type' => 'event',
                'icon' => 'fas fa-chalkboard-teacher',
                'color' => '#20c997',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Ateliers & Formations',
                    'en' => 'Workshops & Training',
                    'ar' => 'ورش العمل والتدريب'
                ],
                'slug' => 'ateliers-formations',
                'description' => [
                    'fr' => 'Ateliers pratiques et sessions de formation technique',
                    'en' => 'Practical workshops and technical training sessions',
                    'ar' => 'ورش العمل العملية وجلسات التدريب التقني'
                ],
                'type' => 'event',
                'icon' => 'fas fa-tools',
                'color' => '#e83e8c',
                'sort_order' => 2
            ],
            [
                'name' => [
                    'fr' => 'Cérémonies & Célébrations',
                    'en' => 'Ceremonies & Celebrations',
                    'ar' => 'الاحتفالات والمناسبات'
                ],
                'slug' => 'ceremonies-celebrations',
                'description' => [
                    'fr' => 'Événements de célébration et cérémonies officielles',
                    'en' => 'Celebration events and official ceremonies',
                    'ar' => 'أحداث الاحتفال والمراسم الرسمية'
                ],
                'type' => 'event',
                'icon' => 'fas fa-trophy',
                'color' => '#ffc107',
                'sort_order' => 3
            ],

            // CATÉGORIES FORMATIONS
            [
                'name' => [
                    'fr' => 'Entrepreneuriat & Business',
                    'en' => 'Entrepreneurship & Business',
                    'ar' => 'ريادة الأعمال والأعمال التجارية'
                ],
                'slug' => 'entrepreneuriat-business',
                'description' => [
                    'fr' => 'Formations en création d\'entreprise et gestion d\'affaires',
                    'en' => 'Training in business creation and management',
                    'ar' => 'التدريب في إنشاء الأعمال والإدارة'
                ],
                'type' => 'training',
                'icon' => 'fas fa-briefcase',
                'color' => '#007bff',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Technologies & Innovation',
                    'en' => 'Technology & Innovation',
                    'ar' => 'التكنولوجيا والابتكار'
                ],
                'slug' => 'technologies-innovation',
                'description' => [
                    'fr' => 'Formations aux nouvelles technologies et à l\'innovation',
                    'en' => 'Training in new technologies and innovation',
                    'ar' => 'التدريب على التقنيات الجديدة والابتكار'
                ],
                'type' => 'training',
                'icon' => 'fas fa-microchip',
                'color' => '#6610f2',
                'sort_order' => 2
            ],
            [
                'name' => [
                    'fr' => 'Développement Personnel',
                    'en' => 'Personal Development',
                    'ar' => 'التطوير الشخصي'
                ],
                'slug' => 'developpement-personnel',
                'description' => [
                    'fr' => 'Formations en leadership, communication et compétences personnelles',
                    'en' => 'Leadership, communication and personal skills training',
                    'ar' => 'التدريب على القيادة والتواصل والمهارات الشخصية'
                ],
                'type' => 'training',
                'icon' => 'fas fa-user-graduate',
                'color' => '#28a745',
                'sort_order' => 3
            ],

            // CATÉGORIES ACTIVITÉS
            [
                'name' => [
                    'fr' => 'Assistance Humanitaire',
                    'en' => 'Humanitarian Aid',
                    'ar' => 'المساعدة الإنسانية'
                ],
                'slug' => 'assistance-humanitaire',
                'description' => [
                    'fr' => 'Actions d\'urgence et aide aux populations vulnérables',
                    'en' => 'Emergency actions and aid to vulnerable populations',
                    'ar' => 'الإجراءات الطارئة والمساعدة للسكان المستضعفين'
                ],
                'type' => 'activity',
                'icon' => 'fas fa-hands-helping',
                'color' => '#dc3545',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Protection Environnementale',
                    'en' => 'Environmental Protection',
                    'ar' => 'حماية البيئة'
                ],
                'slug' => 'protection-environnementale',
                'description' => [
                    'fr' => 'Actions pour la préservation de l\'environnement et la biodiversité',
                    'en' => 'Actions for environmental preservation and biodiversity',
                    'ar' => 'إجراءات لحفظ البيئة والتنوع البيولوجي'
                ],
                'type' => 'activity',
                'icon' => 'fas fa-leaf',
                'color' => '#28a745',
                'sort_order' => 2
            ],
            [
                'name' => [
                    'fr' => 'Sensibilisation & Plaidoyer',
                    'en' => 'Awareness & Advocacy',
                    'ar' => 'التوعية والدعوة'
                ],
                'slug' => 'sensibilisation-plaidoyer',
                'description' => [
                    'fr' => 'Campagnes de sensibilisation et actions de plaidoyer',
                    'en' => 'Awareness campaigns and advocacy actions',
                    'ar' => 'حملات التوعية وإجراءات الدعوة'
                ],
                'type' => 'activity',
                'icon' => 'fas fa-bullhorn',
                'color' => '#17a2b8',
                'sort_order' => 3
            ]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => json_encode($category['name']),
                'slug' => $category['slug'],
                'description' => json_encode($category['description']),
                'type' => $category['type'],
                'parent_id' => null,
                'icon' => $category['icon'],
                'color' => $category['color'],
                'sort_order' => $category['sort_order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
            ]);
        }

        // Créer quelques sous-catégories
        $this->createSubCategories();

        $this->command->info('✅ ' . count($categories) . ' catégories créées avec succès!');
    }

    /**
     * Créer des sous-catégories
     */
    private function createSubCategories(): void
    {
        // Récupérer l'ID de la catégorie Agriculture
        $agricultureId = DB::table('categories')->where('slug', 'agriculture-alimentation')->first()->id;

        $subCategories = [
            [
                'name' => [
                    'fr' => 'Agriculture Biologique',
                    'en' => 'Organic Agriculture',
                    'ar' => 'الزراعة العضوية'
                ],
                'slug' => 'agriculture-biologique',
                'description' => [
                    'fr' => 'Techniques agricoles respectueuses de l\'environnement',
                    'en' => 'Environmentally friendly farming techniques',
                    'ar' => 'تقنيات زراعية صديقة للبيئة'
                ],
                'type' => 'project',
                'parent_id' => $agricultureId,
                'icon' => 'fas fa-leaf',
                'color' => '#198754',
                'sort_order' => 1
            ],
            [
                'name' => [
                    'fr' => 'Élevage Durable',
                    'en' => 'Sustainable Livestock',
                    'ar' => 'الثروة الحيوانية المستدامة'
                ],
                'slug' => 'elevage-durable',
                'description' => [
                    'fr' => 'Pratiques d\'élevage respectueuses de l\'environnement',
                    'en' => 'Environmentally friendly livestock practices',
                    'ar' => 'ممارسات الثروة الحيوانية الصديقة للبيئة'
                ],
                'type' => 'project',
                'parent_id' => $agricultureId,
                'icon' => 'fas fa-cow',
                'color' => '#795548',
                'sort_order' => 2
            ]
        ];

        foreach ($subCategories as $subCategory) {
            DB::table('categories')->insert([
                'name' => json_encode($subCategory['name']),
                'slug' => $subCategory['slug'],
                'description' => json_encode($subCategory['description']),
                'type' => $subCategory['type'],
                'parent_id' => $subCategory['parent_id'],
                'icon' => $subCategory['icon'],
                'color' => $subCategory['color'],
                'sort_order' => $subCategory['sort_order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
            ]);
        }
    }
}
