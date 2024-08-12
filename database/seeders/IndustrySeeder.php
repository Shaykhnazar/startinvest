<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = $this->getIndustries();
        foreach ($industries as $industry) {
            Industry::updateOrCreate(
                ['id' => $industry['id']],
                [
                    'title' => $industry['title'],
                    'description' => $industry['description'],
                ]
            );
        }
    }

    private function getIndustries(): array
    {
        return [
            ['id' => 1, 'title' => 'Sun’iy intellekt', 'description' => 'Sun’iy intellekt sohasidagi startaplar.'],
            ['id' => 2, 'title' => 'Blokcheyn', 'description' => 'Blokcheyn texnologiyalari bo‘yicha startaplar.'],
            ['id' => 3, 'title' => 'FinTech', 'description' => 'Moliyaviy texnologiyalar (FinTech) bo‘yicha startaplar.'],
            ['id' => 4, 'title' => 'HealthTech', 'description' => 'Sog‘liqni saqlash texnologiyalari (HealthTech) bo‘yicha startaplar.'],
            ['id' => 5, 'title' => 'EdTech', 'description' => 'Ta’lim texnologiyalari (EdTech) bo‘yicha startaplar.'],
            ['id' => 6, 'title' => 'AgriTech', 'description' => 'Qishloq xo‘jaligi texnologiyalari (AgriTech) bo‘yicha startaplar.'],
            ['id' => 7, 'title' => 'CleanTech', 'description' => 'Toza texnologiyalar (CleanTech) bo‘yicha startaplar.'],
            ['id' => 8, 'title' => 'BioTech', 'description' => 'Biotexnologiyalar (BioTech) bo‘yicha startaplar.'],
            ['id' => 9, 'title' => 'Kiberxavfsizlik', 'description' => 'Kiberxavfsizlik bo‘yicha startaplar.'],
            ['id' => 10, 'title' => 'E-commerce', 'description' => 'Elektron savdo (E-commerce) bo‘yicha startaplar.'],
            ['id' => 11, 'title' => 'FoodTech', 'description' => 'Oziq-ovqat texnologiyalari (FoodTech) bo‘yicha startaplar.'],
            ['id' => 12, 'title' => 'Gaming', 'description' => 'O‘yinlar va videoo‘yinlar sohasidagi startaplar.'],
            ['id' => 13, 'title' => 'SaaS (Dasturiy ta’minot)', 'description' => 'SaaS (Software as a Service) bo‘yicha startaplar.'],
            ['id' => 14, 'title' => 'TravelTech', 'description' => 'Sayohat texnologiyalari (TravelTech) bo‘yicha startaplar.'],
            ['id' => 15, 'title' => 'PropTech', 'description' => 'Ko‘chmas mulk texnologiyalari (PropTech) bo‘yicha startaplar.'],
            ['id' => 16, 'title' => 'Logistika', 'description' => 'Logistika bo‘yicha startaplar.'],
            ['id' => 17, 'title' => 'Ijtimoiy media', 'description' => 'Ijtimoiy tarmoqlar va media texnologiyalari bo‘yicha startaplar.'],
            ['id' => 18, 'title' => 'Mobil ilovalar', 'description' => 'Mobil ilovalar sohasidagi startaplar.'],
            ['id' => 19, 'title' => 'Kiyiladigan texnologiyalar', 'description' => 'Kiyiladigan texnologiyalar (Wearables) bo‘yicha startaplar.'],
            ['id' => 20, 'title' => 'Robototexnika', 'description' => 'Robototexnika bo‘yicha startaplar.'],
            ['id' => 21, 'title' => 'Energiya', 'description' => 'Energiya sohasidagi startaplar.'],
            ['id' => 22, 'title' => 'Aqlli shaharlar', 'description' => 'Aqlli shahar texnologiyalari (Smart Cities) bo‘yicha startaplar.'],
            ['id' => 23, 'title' => 'Avtomobil sanoati', 'description' => 'Avtomobil texnologiyalari (Automotive) bo‘yicha startaplar.'],
            ['id' => 24, 'title' => 'MarTech', 'description' => 'Marketing texnologiyalari (MarTech) bo‘yicha startaplar.'],
            ['id' => 25, 'title' => 'AdTech', 'description' => 'Reklama texnologiyalari (AdTech) bo‘yicha startaplar.'],
            ['id' => 26, 'title' => 'LegalTech', 'description' => 'Yuridik texnologiyalar (LegalTech) bo‘yicha startaplar.'],
            ['id' => 27, 'title' => 'HRTech', 'description' => 'Kadrlar boshqaruvi texnologiyalari (HRTech) bo‘yicha startaplar.'],
            ['id' => 28, 'title' => 'Ko‘chmas mulk', 'description' => 'Ko‘chmas mulk bo‘yicha startaplar.'],
            ['id' => 29, 'title' => 'SportTech', 'description' => 'Sport texnologiyalari (SportsTech) bo‘yicha startaplar.'],
            ['id' => 30, 'title' => 'RetailTech', 'description' => 'Chakana savdo texnologiyalari (RetailTech) bo‘yicha startaplar.'],
            ['id' => 31, 'title' => 'InsurTech', 'description' => 'Sug‘urta texnologiyalari (InsurTech) bo‘yicha startaplar.'],
            ['id' => 32, 'title' => 'Media va Ko‘ngilochar', 'description' => 'Media va ko‘ngilochar texnologiyalar.'],
            ['id' => 33, 'title' => 'Telekom', 'description' => 'Telekommunikatsiyalar (Telecom) bo‘yicha startaplar.'],
            ['id' => 34, 'title' => 'Ta’lim', 'description' => 'Ta’lim sohasidagi startaplar.'],
            ['id' => 35, 'title' => 'Sog‘liqni saqlash', 'description' => 'Sog‘liqni saqlash sohasidagi startaplar.'],
            ['id' => 36, 'title' => 'Atrof-muhit', 'description' => 'Atrof-muhit texnologiyalari (Environmental) bo‘yicha startaplar.'],
            ['id' => 37, 'title' => 'Ishlab chiqarish', 'description' => 'Ishlab chiqarish texnologiyalari (Manufacturing) bo‘yicha startaplar.'],
            ['id' => 38, 'title' => 'Transport', 'description' => 'Transport texnologiyalari (Transportation) bo‘yicha startaplar.'],
            ['id' => 39, 'title' => 'Taminot zanjiri', 'description' => 'Taminot zanjiri texnologiyalari (Supply Chain) bo‘yicha startaplar.'],
            ['id' => 40, 'title' => 'Virtual Haqiqat', 'description' => 'Virtual haqiqat texnologiyalari (Virtual Reality).'],
            ['id' => 41, 'title' => 'Qo‘shimcha Haqiqat', 'description' => 'Qo‘shimcha haqiqat texnologiyalari (Augmented Reality).'],
            ['id' => 42, 'title' => 'Moda', 'description' => 'Moda texnologiyalari (Fashion).'],
            ['id' => 43, 'title' => 'San’at va Dizayn', 'description' => 'San’at va dizayn sohasidagi startaplar.'],
            ['id' => 44, 'title' => 'Notijorat', 'description' => 'Notijorat tashkilotlar uchun texnologiyalar (Nonprofit).'],
            ['id' => 45, 'title' => 'Ijtimoiy ta’sir', 'description' => 'Ijtimoiy ta’sir texnologiyalari (Social Impact).'],
            ['id' => 46, 'title' => 'PetTech', 'description' => 'Uy hayvonlari texnologiyalari (PetTech).'],
            ['id' => 47, 'title' => 'SpaceTech', 'description' => 'Kosmik texnologiyalar (SpaceTech).'],
            ['id' => 48, 'title' => 'Moliyalash', 'description' => 'Moliyalash texnologiyalari (Financing).'],
            ['id' => 49, 'title' => 'Konsalting', 'description' => 'Konsalting xizmatlari bo‘yicha startaplar.'],
            ['id' => 50, 'title' => 'Tadbirlarni boshqarish', 'description' => 'Tadbirlarni boshqarish texnologiyalari (Event Management).'],
        ];
    }
}
