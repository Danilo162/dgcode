<?php

// Seeder: database/seeders/OddGoalsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OddGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oddGoals = [
            [
                'number' => 1,
                'title' => [
                    'fr' => 'Pas de pauvreté',
                    'en' => 'No Poverty',
                    'ar' => 'القضاء على الفقر'
                ],
                'description' => [
                    'fr' => 'Éliminer la pauvreté sous toutes ses formes et partout dans le monde',
                    'en' => 'End poverty in all its forms everywhere',
                    'ar' => 'القضاء على الفقر بجميع أشكاله في كل مكان'
                ],
                'color_code' => '#E5243B',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-01.jpg'
            ],
            [
                'number' => 2,
                'title' => [
                    'fr' => 'Faim "Zéro"',
                    'en' => 'Zero Hunger',
                    'ar' => 'القضاء التام على الجوع'
                ],
                'description' => [
                    'fr' => 'Éliminer la faim, assurer la sécurité alimentaire, améliorer la nutrition et promouvoir l\'agriculture durable',
                    'en' => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture',
                    'ar' => 'القضاء على الجوع وتوفير الأمن الغذائي والتغذية المحسّنة وتعزيز الزراعة المستدامة'
                ],
                'color_code' => '#DDA83A',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-02.jpg'
            ],
            [
                'number' => 3,
                'title' => [
                    'fr' => 'Bonne santé et bien-être',
                    'en' => 'Good Health and Well-being',
                    'ar' => 'الصحة الجيدة والرفاه'
                ],
                'description' => [
                    'fr' => 'Permettre à tous de vivre en bonne santé et promouvoir le bien-être de tous à tout âge',
                    'en' => 'Ensure healthy lives and promote well-being for all at all ages',
                    'ar' => 'ضمان تمتّع الجميع بأنماط عيش صحية وبالرفاهية في جميع الأعمار'
                ],
                'color_code' => '#4C9F38',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-03.jpg'
            ],
            [
                'number' => 4,
                'title' => [
                    'fr' => 'Éducation de qualité',
                    'en' => 'Quality Education',
                    'ar' => 'التعليم الجيد'
                ],
                'description' => [
                    'fr' => 'Assurer l\'accès de tous à une éducation de qualité, sur un pied d\'égalité, et promouvoir les possibilités d\'apprentissage tout au long de la vie',
                    'en' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all',
                    'ar' => 'ضمان التعليم الجيد المنصف والشامل للجميع وتعزيز فرص التعلّم مدى الحياة للجميع'
                ],
                'color_code' => '#C5192D',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-04.jpg'
            ],
            [
                'number' => 5,
                'title' => [
                    'fr' => 'Égalité entre les sexes',
                    'en' => 'Gender Equality',
                    'ar' => 'المساواة بين الجنسين'
                ],
                'description' => [
                    'fr' => 'Parvenir à l\'égalité des sexes et autonomiser toutes les femmes et les filles',
                    'en' => 'Achieve gender equality and empower all women and girls',
                    'ar' => 'تحقيق المساواة بين الجنسين وتمكين كل النساء والفتيات'
                ],
                'color_code' => '#FF3A21',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg'
            ],
            [
                'number' => 6,
                'title' => [
                    'fr' => 'Eau propre et assainissement',
                    'en' => 'Clean Water and Sanitation',
                    'ar' => 'المياه النظيفة والنظافة الصحية'
                ],
                'description' => [
                    'fr' => 'Garantir l\'accès de tous à l\'eau et à l\'assainissement et assurer une gestion durable des ressources en eau',
                    'en' => 'Ensure availability and sustainable management of water and sanitation for all',
                    'ar' => 'ضمان توافر المياه وخدمات الصرف الصحي للجميع وإدارتها إدارة مستدامة'
                ],
                'color_code' => '#26BDE2',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-06.jpg'
            ],
            [
                'number' => 7,
                'title' => [
                    'fr' => 'Énergie propre et d\'un coût abordable',
                    'en' => 'Affordable and Clean Energy',
                    'ar' => 'طاقة نظيفة وبأسعار معقولة'
                ],
                'description' => [
                    'fr' => 'Garantir l\'accès de tous à des services énergétiques fiables, durables et modernes, à un coût abordable',
                    'en' => 'Ensure access to affordable, reliable, sustainable and modern energy for all',
                    'ar' => 'ضمان حصول الجميع بتكلفة ميسورة على خدمات الطاقة الحديثة الموثوقة والمستدامة'
                ],
                'color_code' => '#FCC30B',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-07.jpg'
            ],
            [
                'number' => 8,
                'title' => [
                    'fr' => 'Travail décent et croissance économique',
                    'en' => 'Decent Work and Economic Growth',
                    'ar' => 'العمل اللائق ونمو الاقتصاد'
                ],
                'description' => [
                    'fr' => 'Promouvoir une croissance économique soutenue, partagée et durable, le plein emploi productif et un travail décent pour tous',
                    'en' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all',
                    'ar' => 'تعزيز النمو الاقتصادي المطرد والشامل والمستدام، والعمالة الكاملة والمنتجة، وتوفير العمل اللائق للجميع'
                ],
                'color_code' => '#A21942',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-08.jpg'
            ],
            [
                'number' => 9,
                'title' => [
                    'fr' => 'Industrie, innovation et infrastructure',
                    'en' => 'Industry, Innovation and Infrastructure',
                    'ar' => 'الصناعة والابتكار والهياكل الأساسية'
                ],
                'description' => [
                    'fr' => 'Bâtir une infrastructure résiliente, promouvoir une industrialisation durable qui profite à tous et encourager l\'innovation',
                    'en' => 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation',
                    'ar' => 'إقامة هياكل أساسية قادرة على الصمود، وتحفيز التصنيع الشامل والمستدام، وتشجيع الابتكار'
                ],
                'color_code' => '#FD6925',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-09.jpg'
            ],
            [
                'number' => 10,
                'title' => [
                    'fr' => 'Inégalités réduites',
                    'en' => 'Reduced Inequalities',
                    'ar' => 'الحد من أوجه عدم المساواة'
                ],
                'description' => [
                    'fr' => 'Réduire les inégalités dans les pays et d\'un pays à l\'autre',
                    'en' => 'Reduce inequality within and among countries',
                    'ar' => 'الحد من انعدام المساواة في البلدان وفيما بينها'
                ],
                'color_code' => '#DD1367',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-10.jpg'
            ],
            [
                'number' => 11,
                'title' => [
                    'fr' => 'Villes et communautés durables',
                    'en' => 'Sustainable Cities and Communities',
                    'ar' => 'مدن ومجتمعات محلية مستدامة'
                ],
                'description' => [
                    'fr' => 'Faire en sorte que les villes et les établissements humains soient ouverts à tous, sûrs, résilients et durables',
                    'en' => 'Make cities and human settlements inclusive, safe, resilient and sustainable',
                    'ar' => 'جعل المدن والمستوطنات البشرية شاملة للجميع وآمنة وقادرة على الصمود ومستدامة'
                ],
                'color_code' => '#FD9D24',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-11.jpg'
            ],
            [
                'number' => 12,
                'title' => [
                    'fr' => 'Consommation et production responsables',
                    'en' => 'Responsible Consumption and Production',
                    'ar' => 'الاستهلاك والإنتاج المسؤولان'
                ],
                'description' => [
                    'fr' => 'Établir des modes de consommation et de production durables',
                    'en' => 'Ensure sustainable consumption and production patterns',
                    'ar' => 'ضمان وجود أنماط استهلاك وإنتاج مستدامة'
                ],
                'color_code' => '#BF8B2E',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-12.jpg'
            ],
            [
                'number' => 13,
                'title' => [
                    'fr' => 'Mesures relatives à la lutte contre les changements climatiques',
                    'en' => 'Climate Action',
                    'ar' => 'العمل المناخي'
                ],
                'description' => [
                    'fr' => 'Prendre d\'urgence des mesures pour lutter contre les changements climatiques et leurs répercussions',
                    'en' => 'Take urgent action to combat climate change and its impacts',
                    'ar' => 'اتخاذ إجراءات عاجلة للتصدي لتغير المناخ وآثاره'
                ],
                'color_code' => '#3F7E44',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-13.jpg'
            ],
            [
                'number' => 14,
                'title' => [
                    'fr' => 'Vie aquatique',
                    'en' => 'Life Below Water',
                    'ar' => 'الحياة تحت الماء'
                ],
                'description' => [
                    'fr' => 'Conserver et exploiter de manière durable les océans, les mers et les ressources marines aux fins du développement durable',
                    'en' => 'Conserve and sustainably use the oceans, seas and marine resources for sustainable development',
                    'ar' => 'حفظ المحيطات والبحار والموارد البحرية واستخدامها على نحو مستدام لتحقيق التنمية المستدامة'
                ],
                'color_code' => '#0A97D9',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-14.jpg'
            ],
            [
                'number' => 15,
                'title' => [
                    'fr' => 'Vie terrestre',
                    'en' => 'Life on Land',
                    'ar' => 'الحياة في البر'
                ],
                'description' => [
                    'fr' => 'Préserver et restaurer les écosystèmes terrestres, en veillant à les exploiter de façon durable, gérer durablement les forêts, lutter contre la désertification, enrayer et inverser le processus de dégradation des sols et mettre fin à l\'appauvrissement de la biodiversité',
                    'en' => 'Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss',
                    'ar' => 'حماية النظم الإيكولوجية البرية وترميمها وتعزيز استخدامها على نحو مستدام، وإدارة الغابات على نحو مستدام، ومكافحة التصحر، ووقف تدهور الأراضي وعكس مساره، ووقف فقدان التنوع البيولوجي'
                ],
                'color_code' => '#56C02B',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-15.jpg'
            ],
            [
                'number' => 16,
                'title' => [
                    'fr' => 'Paix, justice et institutions efficaces',
                    'en' => 'Peace, Justice and Strong Institutions',
                    'ar' => 'السلام والعدل والمؤسسات القوية'
                ],
                'description' => [
                    'fr' => 'Promouvoir l\'avènement de sociétés pacifiques et ouvertes à tous aux fins du développement durable, assurer l\'accès de tous à la justice et mettre en place, à tous les niveaux, des institutions efficaces, responsables et ouvertes à tous',
                    'en' => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels',
                    'ar' => 'التشجيع على إقامة مجتمعات مسالمة لا يُهمّش فيها أحد من أجل تحقيق التنمية المستدامة، وإتاحة إمكانية وصول الجميع إلى العدالة، وبناء مؤسسات فعالة وخاضعة للمساءلة وشاملة للجميع على جميع المستويات'
                ],
                'color_code' => '#00689D',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-16.jpg'
            ],
            [
                'number' => 17,
                'title' => [
                    'fr' => 'Partenariats pour la réalisation des objectifs',
                    'en' => 'Partnerships for the Goals',
                    'ar' => 'عقد الشراكات لتحقيق الأهداف'
                ],
                'description' => [
                    'fr' => 'Renforcer les moyens de mettre en œuvre le Partenariat mondial pour le développement durable et le revitaliser',
                    'en' => 'Strengthen the means of implementation and revitalize the Global Partnership for Sustainable Development',
                    'ar' => 'تعزيز وسائل التنفيذ وتنشيط الشراكة العالمية من أجل التنمية المستدامة'
                ],
                'color_code' => '#19486A',
                'icon_url' => 'https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-17.jpg'
            ]
        ];

        foreach ($oddGoals as $index => $goal) {
            DB::table('odd_goals')->insert([
                'number' => $goal['number'],
                'title' => json_encode($goal['title']),
                'description' => json_encode($goal['description']),
                'icon_url' => $goal['icon_url'],
                'color_code' => $goal['color_code'],
                'official_url' => 'https://sdgs.un.org/goals/goal' . $goal['number'],
                'sort_order' => $goal['number'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
            ]);
        }

        $this->command->info('✅ Les 17 Objectifs de Développement Durable ont été créés avec succès!');
    }
}
