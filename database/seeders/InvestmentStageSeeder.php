<?php

namespace Database\Seeders;

use App\Models\InvestmentStage;
use Illuminate\Database\Seeder;

class InvestmentStageSeeder extends Seeder
{
    public function run(): void
    {
        $stages = $this->getStages();
        foreach ($stages as $stage) {
            InvestmentStage::updateOrCreate([
                'name' => $stage['name'],
            ], [
                'description' => $stage['description'],
            ]);
        }

    }

    private function getStages(): array
    {
        return [
            [
                'name' => 'Pre-Seed',
                'description' => 'Pre-seed funding is the earliest stage of financing for a startup, typically occurring in the ideation or concept stage before the startup has developed a minimum viable product (MVP) or generated any revenue. Usually pre-seed financing is provided by friends,family or angel investors and the funding can range from $1,000 — $500,000.',
            ],
            [
                'name' => 'Seed Stage',
                'description' => 'Seed stage funding is the formal round of financing for a startup.It usually occurs once a company has developed a minimum viable product (MVP), gained some traction and has developed a clear plan to grow its business. Seed stage funding is normally provided by angel investors,venture capital firms,accelerators or via crowdfunding platforms.The funding can range from $1 million — $5 million.',
            ],
            [
                'name' => 'Series A',
                'description' => 'Series A funding is the second round of financing for a startup. It usually occurs when a company has achieved the product market fit and is ready to expand into new markets. At this stage, startups typically have proven their business model and have demonstrated revenue growth.Series A funding is normally led by venture capitalists since startups are raising millions of dollars.The funding can range from $5 million — $15 million.',
            ],
            [
                'name' => 'Series B',
                'description' => 'Series B is the third round of financing for a startup. Very fewer companies make it to Series B round and beyond. At this stage, startups have a large customer base, a proven acquisition strategy and the ability to grow 2–3x year over year (YoY). The other name of Series B is the expansion.The round is led by VCs and the funding amount varies heavily from business to business.',
            ],
            [
                'name' => 'Series C',
                'description' => 'Series C is the fourth round of financing for a startup. Companies at series C have multiple revenue models and are profitable.This round usually occurs to further expand the business internationally, or prepare for an initial public offering (IPO). Series C is led by VCs, private equity firms or by existing investors. The funding amount depends on the valuation of the startup.',
            ],
        ];
    }
}
