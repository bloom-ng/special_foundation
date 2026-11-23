<?php

namespace Database\Seeders;

use App\Models\CMS;
use Illuminate\Database\Seeder;

/**
 * Loads the team and advisory board that used to live in the hardcoded
 * CMS::getTeams() / CMS::getBoards() arrays into the CMS table, so the
 * Who We Are page renders them through the editable, orderable backend.
 *
 * Intended for local and staging databases. Production already holds its own
 * records; run this there only if those sections are empty.
 */
class TeamAndBoardSeeder extends Seeder
{
    public function run(): void
    {
        $this->load(CMS::getTeams(), CMS::TYPE_TEAM);
        $this->load(CMS::getBoards(), CMS::TYPE_BOARD);
    }

    private function load(array $people, int $type): void
    {
        foreach (array_values($people) as $i => $person) {
            CMS::updateOrCreate(
                ['name' => $person['name'], 'type' => $type],
                [
                    // The dynamic getters read the job title out of `slug`.
                    'slug' => $person['position'] ?? '',
                    'page' => $person['link'] ?? '',
                    'sort_order' => $i + 1,
                    'value' => json_encode([
                        // Only one image is stored, and it is used for both the
                        // card and the pop-up, so the detail portrait is used:
                        // the list crops carry a burnt-in name bar.
                        'image' => $person['image'],
                        'content' => $person['content'],
                    ]),
                ]
            );
        }
    }
}
