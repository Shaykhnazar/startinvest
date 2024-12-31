<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = $this->getCategories();
        $this->createCategoriesWithParents($categories);
    }

    private function createCategoriesWithParents(array $categories, ?int $parentId = null): void
    {
        foreach ($categories as $category) {
            $newCategory = BlogCategory::updateOrCreate(
                ['id' => $category['id']],
                [
                    'name' => [
                        'en' => $category['name_en'],
                        'ru' => $category['name_ru'],
                        'uz_Latn' => $category['name_uz'],
                    ],
                    'description' => [
                        'en' => $category['description_en'],
                        'ru' => $category['description_ru'],
                        'uz_Latn' => $category['description_uz'],
                    ],
                    'slug' => Str::slug($category['name_en']),
                    'parent_id' => $parentId,
                    'is_active' => true,
                    'order' => $category['id']
                ]
            );

            if (isset($category['children'])) {
                $this->createCategoriesWithParents($category['children'], $newCategory->id);
            }
        }
    }

    private function getCategories(): array
    {
        return [
            [
                'id' => 1,
                'name_en' => 'Tech',
                'name_ru' => 'Технологии',
                'name_uz' => 'Texnologiyalar',
                'description_en' => 'Technology products and innovations',
                'description_ru' => 'Технологические продукты и инновации',
                'description_uz' => 'Texnologik mahsulotlar va innovatsiyalar',
                'children' => [
                    [
                        'id' => 101,
                        'name_en' => 'Developer Tools',
                        'name_ru' => 'Инструменты разработчика',
                        'name_uz' => 'Dasturchi vositalari',
                        'description_en' => 'Tools and resources for developers',
                        'description_ru' => 'Инструменты и ресурсы для разработчиков',
                        'description_uz' => 'Dasturchilar uchun vositalar va resurslar'
                    ],
                    [
                        'id' => 102,
                        'name_en' => 'Web3',
                        'name_ru' => 'Веб3',
                        'name_uz' => 'Web3',
                        'description_en' => 'Blockchain and decentralized applications',
                        'description_ru' => 'Блокчейн и децентрализованные приложения',
                        'description_uz' => 'Blokcheyn va markazlashmagan ilovalar'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name_en' => 'AI & Machine Learning',
                'name_ru' => 'ИИ и машинное обучение',
                'name_uz' => 'Sun\'iy intellekt va mashinali o\'rganish',
                'description_en' => 'Artificial Intelligence and Machine Learning products',
                'description_ru' => 'Продукты искусственного интеллекта и машинного обучения',
                'description_uz' => 'Sun\'iy intellekt va mashinali o\'rganish mahsulotlari',
                'children' => [
                    [
                        'id' => 201,
                        'name_en' => 'ChatGPT Apps',
                        'name_ru' => 'Приложения ChatGPT',
                        'name_uz' => 'ChatGPT ilovalar',
                        'description_en' => 'Applications powered by ChatGPT',
                        'description_ru' => 'Приложения на базе ChatGPT',
                        'description_uz' => 'ChatGPT asosidagi ilovalar'
                    ],
                    [
                        'id' => 202,
                        'name_en' => 'AI Tools',
                        'name_ru' => 'Инструменты ИИ',
                        'name_uz' => 'AI vositalari',
                        'description_en' => 'Tools powered by artificial intelligence',
                        'description_ru' => 'Инструменты на базе искусственного интеллекта',
                        'description_uz' => 'Sun\'iy intellekt asosidagi vositalar'
                    ]
                ]
            ],
            [
                'id' => 3,
                'name_en' => 'Productivity',
                'name_ru' => 'Продуктивность',
                'name_uz' => 'Samaradorlik',
                'description_en' => 'Tools for better productivity and workflow',
                'description_ru' => 'Инструменты для повышения продуктивности',
                'description_uz' => 'Samaradorlikni oshirish uchun vositalar',
                'children' => [
                    [
                        'id' => 301,
                        'name_en' => 'Task Management',
                        'name_ru' => 'Управление задачами',
                        'name_uz' => 'Vazifalarni boshqarish',
                        'description_en' => 'Tools for managing tasks and projects',
                        'description_ru' => 'Инструменты для управления задачами и проектами',
                        'description_uz' => 'Vazifalar va loyihalarni boshqarish vositalari'
                    ],
                    [
                        'id' => 302,
                        'name_en' => 'Time Management',
                        'name_ru' => 'Управление временем',
                        'name_uz' => 'Vaqtni boshqarish',
                        'description_en' => 'Tools for time tracking and management',
                        'description_ru' => 'Инструменты для учета и управления временем',
                        'description_uz' => 'Vaqtni kuzatish va boshqarish vositalari'
                    ]
                ]
            ],
            [
                'id' => 4,
                'name_en' => 'Marketing',
                'name_ru' => 'Маркетинг',
                'name_uz' => 'Marketing',
                'description_en' => 'Marketing tools and platforms',
                'description_ru' => 'Маркетинговые инструменты и платформы',
                'description_uz' => 'Marketing vositalari va platformalar',
                'children' => [
                    [
                        'id' => 401,
                        'name_en' => 'Social Media Tools',
                        'name_ru' => 'Инструменты для соцсетей',
                        'name_uz' => 'Ijtimoiy tarmoq vositalari',
                        'description_en' => 'Tools for social media management',
                        'description_ru' => 'Инструменты для управления соцсетями',
                        'description_uz' => 'Ijtimoiy tarmoqlarni boshqarish vositalari'
                    ],
                    [
                        'id' => 402,
                        'name_en' => 'Email Marketing',
                        'name_ru' => 'Email-маркетинг',
                        'name_uz' => 'Email marketing',
                        'description_en' => 'Email marketing platforms and tools',
                        'description_ru' => 'Платформы и инструменты для email-маркетинга',
                        'description_uz' => 'Email marketing platformalari va vositalari'
                    ]
                ]
            ],
            [
                'id' => 5,
                'name_en' => 'Design Tools',
                'name_ru' => 'Инструменты дизайна',
                'name_uz' => 'Dizayn vositalari',
                'description_en' => 'Tools for designers and creatives',
                'description_ru' => 'Инструменты для дизайнеров',
                'description_uz' => 'Dizaynerlar uchun vositalar',
                'children' => [
                    [
                        'id' => 501,
                        'name_en' => 'UI Design',
                        'name_ru' => 'UI дизайн',
                        'name_uz' => 'UI dizayn',
                        'description_en' => 'User interface design tools',
                        'description_ru' => 'Инструменты для дизайна интерфейсов',
                        'description_uz' => 'Interfeys dizayni vositalari'
                    ],
                    [
                        'id' => 502,
                        'name_en' => 'Graphic Design',
                        'name_ru' => 'Графический дизайн',
                        'name_uz' => 'Grafik dizayn',
                        'description_en' => 'Graphic design tools and resources',
                        'description_ru' => 'Инструменты для графического дизайна',
                        'description_uz' => 'Grafik dizayn vositalari'
                    ]
                ]
            ],
            [
                'id' => 6,
                'name_en' => 'No-Code Tools',
                'name_ru' => 'No-Code инструменты',
                'name_uz' => 'No-Code vositalar',
                'description_en' => 'Build without coding',
                'description_ru' => 'Создавайте без программирования',
                'description_uz' => 'Kodsiz yarating',
                'children' => [
                    [
                        'id' => 601,
                        'name_en' => 'Website Builders',
                        'name_ru' => 'Конструкторы сайтов',
                        'name_uz' => 'Sayt yaratish vositalari',
                        'description_en' => 'Tools for building websites without code',
                        'description_ru' => 'Инструменты для создания сайтов без кода',
                        'description_uz' => 'Kodsiz sayt yaratish vositalari'
                    ],
                    [
                        'id' => 602,
                        'name_en' => 'Automation Tools',
                        'name_ru' => 'Инструменты автоматизации',
                        'name_uz' => 'Avtomatlashtirish vositalari',
                        'description_en' => 'Tools for workflow automation',
                        'description_ru' => 'Инструменты для автоматизации процессов',
                        'description_uz' => 'Jarayonlarni avtomatlashtirish vositalari'
                    ]
                ]
            ],
            [
                'id' => 7,
                'name_en' => 'Analytics',
                'name_ru' => 'Аналитика',
                'name_uz' => 'Tahlil',
                'description_en' => 'Analytics and data tools',
                'description_ru' => 'Инструменты для аналитики и данных',
                'description_uz' => 'Tahlil va ma\'lumotlar vositalari',
                'children' => [
                    [
                        'id' => 701,
                        'name_en' => 'Business Intelligence',
                        'name_ru' => 'Бизнес-аналитика',
                        'name_uz' => 'Biznes tahlil',
                        'description_en' => 'Business intelligence and analytics tools',
                        'description_ru' => 'Инструменты бизнес-аналитики',
                        'description_uz' => 'Biznes tahlil vositalari'
                    ],
                    [
                        'id' => 702,
                        'name_en' => 'Data Visualization',
                        'name_ru' => 'Визуализация данных',
                        'name_uz' => 'Ma\'lumotlarni vizuallashtirish',
                        'description_en' => 'Tools for data visualization',
                        'description_ru' => 'Инструменты для визуализации данных',
                        'description_uz' => 'Ma\'lumotlarni vizuallashtirish vositalari'
                    ]
                ]
            ],
            [
                'id' => 8,
                'name_en' => 'Finance',
                'name_ru' => 'Финансы',
                'name_uz' => 'Moliya',
                'description_en' => 'Financial tools and services',
                'description_ru' => 'Финансовые инструменты и сервисы',
                'description_uz' => 'Moliyaviy vositalar va xizmatlar',
                'children' => [
                    [
                        'id' => 801,
                        'name_en' => 'Cryptocurrency',
                        'name_ru' => 'Криптовалюта',
                        'name_uz' => 'Kriptovalyuta',
                        'description_en' => 'Cryptocurrency tools and platforms',
                        'description_ru' => 'Инструменты и платформы для криптовалют',
                        'description_uz' => 'Kriptovalyuta vositalari va platformalar'
                    ],
                    [
                        'id' => 802,
                        'name_en' => 'Personal Finance',
                        'name_ru' => 'Личные финансы',
                        'name_uz' => 'Shaxsiy moliya',
                        'description_en' => 'Personal finance management tools',
                        'description_ru' => 'Инструменты управления личными финансами',
                        'description_uz' => 'Shaxsiy moliyani boshqarish vositalari'
                    ]
                ]
            ],
            [
                'id' => 9,
                'name_en' => 'Education',
                'name_ru' => 'Образование',
                'name_uz' => 'Ta\'lim',
                'description_en' => 'Educational tools and platforms',
                'description_ru' => 'Образовательные инструменты и платформы',
                'description_uz' => 'Ta\'lim vositalari va platformalar',
                'children' => [
                    [
                        'id' => 901,
                        'name_en' => 'Learning Platforms',
                        'name_ru' => 'Обучающие платформы',
                        'name_uz' => 'O\'quv platformalari',
                        'description_en' => 'Online learning and education platforms',
                        'description_ru' => 'Онлайн-платформы для обучения',
                        'description_uz' => 'Onlayn o\'quv platformalari'
                    ],
                    [
                        'id' => 902,
                        'name_en' => 'Educational Tools',
                        'name_ru' => 'Образовательные инструменты',
                        'name_uz' => 'Ta\'lim vositalari',
                        'description_en' => 'Tools for teaching and learning',
                        'description_ru' => 'Инструменты для преподавания и обучения',
                        'description_uz' => 'O\'qitish va o\'rganish vositalari'
                    ]
                ]
            ],
            [
                'id' => 10,
                'name_en' => 'Remote Work',
                'name_ru' => 'Удаленная работа',
                'name_uz' => 'Masofaviy ish',
                'description_en' => 'Remote work tools and platforms',
                'description_ru' => 'Инструменты для удаленной работы',
                'description_uz' => 'Masofaviy ish vositalari',
                'children' => [
                    [
                        'id' => 1001,
                        'name_en' => 'Collaboration Tools',
                        'name_ru' => 'Инструменты для совместной работы',
                        'name_uz' => 'Hamkorlik vositalari',
                        'description_en' => 'Team collaboration and communication tools',
                        'description_ru' => 'Инструменты для командной работы и коммуникации',
                        'description_uz' => 'Jamoa hamkorligi va kommunikatsiya vositalari'
                    ],
                    [
                        'id' => 1002,
                        'name_en' => 'Video Conferencing',
                        'name_ru' => 'Видеоконференции',
                        'name_uz' => 'Video konferentsiya',
                        'description_en' => 'Video conferencing and meeting tools',
                        'description_ru' => 'Инструменты для видеоконференций и встреч',
                        'description_uz' => 'Video konferentsiya va uchrashuv vositalari'
                    ]
                ]
            ],
            [
                'id' => 11,
                'name_en' => 'Health & Fitness',
                'name_ru' => 'Здоровье и фитнес',
                'name_uz' => 'Sog\'liq va fitness',
                'description_en' => 'Health and fitness tools',
                'description_ru' => 'Инструменты для здоровья и фитнеса',
                'description_uz' => 'Sog\'liq va fitness vositalari',
                'children' => [
                    [
                        'id' => 1101,
                        'name_en' => 'Fitness Apps',
                        'name_ru' => 'Фитнес-приложения',
                        'name_uz' => 'Fitness ilovalar',
                        'description_en' => 'Workout and fitness tracking apps',
                        'description_ru' => 'Приложения для тренировок и отслеживания фитнеса',
                        'description_uz' => 'Mashq va fitness kuzatuv ilovalar'
                    ],
                    [
                        'id' => 1102,
                        'name_en' => 'Mental Health',
                        'name_ru' => 'Психическое здоровье',
                        'name_uz' => 'Ruhiy salomatlik',
                        'description_en' => 'Mental health and wellness apps',
                        'description_ru' => 'Приложения для психического здоровья',
                        'description_uz' => 'Ruhiy salomatlik ilovalar'
                    ]
                ]
            ],
            [
                'id' => 12,
                'name_en' => 'Entertainment',
                'name_ru' => 'Развлечения',
                'name_uz' => 'Ko\'ngil ochar',
                'description_en' => 'Entertainment and media tools',
                'description_ru' => 'Инструменты для развлечений и медиа',
                'description_uz' => 'Ko\'ngil ochar va media vositalar',
                'children' => [
                    [
                        'id' => 1201,
                        'name_en' => 'Gaming',
                        'name_ru' => 'Игры',
                        'name_uz' => 'O\'yinlar',
                        'description_en' => 'Gaming platforms and tools',
                        'description_ru' => 'Игровые платформы и инструменты',
                        'description_uz' => 'O\'yin platformalari va vositalari'
                    ],
                    [
                        'id' => 1202,
                        'name_en' => 'Streaming',
                        'name_ru' => 'Стриминг',
                        'name_uz' => 'Striming',
                        'description_en' => 'Streaming platforms and tools',
                        'description_ru' => 'Стриминговые платформы и инструменты',
                        'description_uz' => 'Striming platformalari va vositalari'
                    ]
                ]
            ],
            [
                'id' => 13,
                'name_en' => 'E-commerce',
                'name_ru' => 'Электронная коммерция',
                'name_uz' => 'Elektron tijorat',
                'description_en' => 'E-commerce tools and platforms',
                'description_ru' => 'Инструменты для электронной коммерции',
                'description_uz' => 'Elektron tijorat vositalari',
                'children' => [
                    [
                        'id' => 1301,
                        'name_en' => 'Online Stores',
                        'name_ru' => 'Интернет-магазины',
                        'name_uz' => 'Onlayn do\'konlar',
                        'description_en' => 'Online store platforms and tools',
                        'description_ru' => 'Платформы и инструменты для интернет-магазинов',
                        'description_uz' => 'Onlayn do\'kon platformalari va vositalari'
                    ],
                    [
                        'id' => 1302,
                        'name_en' => 'Payment Solutions',
                        'name_ru' => 'Платежные решения',
                        'name_uz' => 'To\'lov yechimlari',
                        'description_en' => 'Payment processing tools',
                        'description_ru' => 'Инструменты для обработки платежей',
                        'description_uz' => 'To\'lovlarni qayta ishlash vositalari'
                    ]
                ]
            ],
            [
                'id' => 14,
                'name_en' => 'Community',
                'name_ru' => 'Сообщество',
                'name_uz' => 'Jamiyat',
                'description_en' => 'Community building tools',
                'description_ru' => 'Инструменты для создания сообществ',
                'description_uz' => 'Jamiyat qurish vositalari',
                'children' => [
                    [
                        'id' => 1401,
                        'name_en' => 'Social Networks',
                        'name_ru' => 'Социальные сети',
                        'name_uz' => 'Ijtimoiy tarmoqlar',
                        'description_en' => 'Social networking platforms',
                        'description_ru' => 'Платформы социальных сетей',
                        'description_uz' => 'Ijtimoiy tarmoq platformalari'
                    ],
                    [
                        'id' => 1402,
                        'name_en' => 'Forums & Discussion',
                        'name_ru' => 'Форумы и обсуждения',
                        'name_uz' => 'Forumlar va muhokamalar',
                        'description_en' => 'Forum and discussion platforms',
                        'description_ru' => 'Платформы для форумов и обсуждений',
                        'description_uz' => 'Forum va muhokama platformalari'
                    ]
                ]
            ],
            [
                'id' => 15,
                'name_en' => 'Security',
                'name_ru' => 'Безопасность',
                'name_uz' => 'Xavfsizlik',
                'description_en' => 'Security and privacy tools',
                'description_ru' => 'Инструменты безопасности и конфиденциальности',
                'description_uz' => 'Xavfsizlik va maxfiylik vositalari',
                'children' => [
                    [
                        'id' => 1501,
                        'name_en' => 'Privacy Tools',
                        'name_ru' => 'Инструменты конфиденциальности',
                        'name_uz' => 'Maxfiylik vositalari',
                        'description_en' => 'Privacy protection tools',
                        'description_ru' => 'Инструменты защиты конфиденциальности',
                        'description_uz' => 'Maxfiylikni himoya qilish vositalari'
                    ],
                    [
                        'id' => 1502,
                        'name_en' => 'Cybersecurity',
                        'name_ru' => 'Кибербезопасность',
                        'name_uz' => 'Kiberhimoya',
                        'description_en' => 'Cybersecurity tools and platforms',
                        'description_ru' => 'Инструменты и платформы кибербезопасности',
                        'description_uz' => 'Kiberhimoya vositalari va platformalari'
                    ]
                ]
            ],
        ];
    }
}
