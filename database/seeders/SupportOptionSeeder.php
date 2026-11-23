<?php

namespace Database\Seeders;

use App\Models\SupportOption;
use Illuminate\Database\Seeder;

/**
 * The Ways to Support cards, with the copy supplied by TSF.
 *
 * Cards 1 and 6 use photographs supplied by TSF. Card 2 uses the cover of
 * the Celebrate by Giving toolkit. The remaining four were picked from the
 * foundation's existing photo library and pre-cropped to the card's 2:1
 * frame; any of them can be replaced through the admin.
 */
class SupportOptionSeeder extends Seeder
{
    public function run(): void
    {
        // Payment links taken from the live /donate page, which TSF confirmed
        // is the authoritative source, rather than the links in the brief.
        $ngn = 'https://paystack.shop/pay/h34dhapt3d';
        $usd = 'https://paystack.shop/pay/p3ha2q123l';
        // /donate has no monthly giving link, so this is still the brief's.
        $monthly = 'https://paystack.shop/pay/hazv56gztq';

        $cards = [
            [
                'group' => SupportOption::GROUP_INDIVIDUALS,
                'track_id' => 'sponsor-a-scholar',
                'title' => 'Sponsor a Scholar',
                'image' => 'support-options/sponsor-a-scholar.jpg',
                'body' => '₦300,000 keeps a child in school for a full year: tuition, uniforms, books and stationery. ₦100,000 covers one term.',
                'button_label' => 'Sponsor a Scholar',
                'button_url' => '/donor-inspire-scholarship',
            ],
            [
                'group' => SupportOption::GROUP_INDIVIDUALS,
                'track_id' => 'celebrate-by-giving',
                'title' => 'Celebrate by Giving',
                'image' => 'support-options/celebrate-by-giving.jpg',
                'body' => 'Turn your birthday, graduation, wedding or anniversary into a gift that lasts. Ask friends and family to give to a child\'s education instead of gifts.',
                'button_label' => 'Start a Fundraiser',
                'button_url' => '/ways-to-support/enquiry?type=fundraiser',
                'secondary_label' => 'Download the toolkit',
                'secondary_url' => '/storage/support/celebrate-by-giving-toolkit.pdf',
            ],
            [
                'group' => SupportOption::GROUP_INDIVIDUALS,
                'track_id' => 'give-in-honor-or-memory',
                'title' => 'Give in Honor or Memory',
                'image' => 'support-options/give-in-honor-or-memory.jpg',
                'body' => 'Honor a parent, teacher, friend or loved one with the gift of education. We will let them know.',
                'button_label' => 'Give a Tribute Gift (NGN)',
                'button_url' => $ngn,
                'secondary_label' => 'Give a Tribute Gift (USD)',
                'secondary_url' => $usd,
            ],
            [
                'group' => SupportOption::GROUP_INDIVIDUALS,
                'track_id' => 'give-monthly',
                'title' => 'Give Monthly',
                'image' => 'support-options/give-monthly.jpg',
                'body' => 'Support the foundation\'s day-to-day operations.',
                'button_label' => 'Give Monthly',
                'button_url' => $monthly,
            ],
            [
                'group' => SupportOption::GROUP_BUSINESSES,
                'track_id' => 'workplace-giving',
                'title' => 'Workplace Giving',
                'image' => 'support-options/workplace-giving.jpg',
                'body' => 'Ask your employer to match your gift, or run a staff giving drive.',
                'button_label' => 'Speak to Us',
                'button_url' => '/ways-to-support/enquiry?type=workplace-giving',
            ],
            [
                'group' => SupportOption::GROUP_BUSINESSES,
                'track_id' => 'dedicate-your-event',
                'title' => 'Dedicate Your Event',
                'image' => 'support-options/dedicate-your-event.jpg',
                'body' => 'Dedicate an end-of-year office party, school event or community drive to TSF.',
                'button_label' => 'Speak to Us',
                'button_url' => '/ways-to-support/enquiry?type=event',
            ],
            [
                'group' => SupportOption::GROUP_BUSINESSES,
                'track_id' => 'partner-with-us',
                'title' => 'Partner With Us',
                'image' => 'support-options/partner-with-us.jpg',
                'body' => 'Corporate and institutional partnerships.',
                'button_label' => 'Partner With Us',
                'button_url' => '/get-involved#partner',
            ],
        ];

        $counters = [];

        foreach ($cards as $card) {
            $counters[$card['group']] = ($counters[$card['group']] ?? 0) + 1;

            SupportOption::updateOrCreate(
                ['track_id' => $card['track_id']],
                $card + [
                    'status' => 'active',
                    'sort_order' => $counters[$card['group']],
                ]
            );
        }
    }
}
