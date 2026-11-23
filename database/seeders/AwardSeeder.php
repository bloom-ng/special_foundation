<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Awards and memberships supplied by TSF for the Q4 update.
     *
     * The badge files here are placeholders. On an installation that already
     * has the real logos in the footer accreditation list, run
     * `php artisan awards:link-logos` afterwards to point each award at the
     * accreditation holding its logo. No links were supplied, so every badge
     * is currently non-clickable.
     */
    public function run(): void
    {
        $items = [
            ['Anthem Awards, Gold', '2025', Award::CATEGORY_AWARD, 'Winner', 'awards/anthem-gold.svg', 1],
            ['Anthem Awards, Community Voice', '2025', Award::CATEGORY_AWARD, 'Winner', 'awards/anthem-community-voice.svg', 2],
            ['International CSR Excellence Award', '2026', Award::CATEGORY_AWARD, 'Winner', 'awards/csr-excellence.svg', 3],
            ['.ORG Impact Awards', '2026', Award::CATEGORY_AWARD, 'Finalist', 'awards/org-impact.svg', 4],
            ['QS Reimagine Education Awards', '2026', Award::CATEGORY_AWARD, 'Finalist', 'awards/qs-reimagine.svg', 5],
            ['GlobalGiving', null, Award::CATEGORY_MEMBERSHIP, 'Verified partner/member', 'awards/globalgiving.svg', 1],
            ['NNNGO', null, Award::CATEGORY_MEMBERSHIP, 'Verified partner/member', 'awards/nnngo.svg', 2],
            ['CAF', null, Award::CATEGORY_MEMBERSHIP, 'Verified partner/member', 'awards/caf.svg', 3],
        ];

        foreach ($items as [$name, $year, $category, $recognition, $image, $order]) {
            Award::updateOrCreate(
                ['name' => $name],
                [
                    'year' => $year,
                    'category' => $category,
                    'recognition' => $recognition,
                    'link' => null,
                    'image' => $image,
                    'status' => 'active',
                    'sort_order' => $order,
                ]
            );
        }
    }
}
