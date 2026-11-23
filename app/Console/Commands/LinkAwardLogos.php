<?php

namespace App\Console\Commands;

use App\Models\Accreditation;
use App\Models\Award;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * Points each award at the footer accreditation that carries its logo, so the
 * homepage badges and the footer badges use the same image file.
 *
 * Matching is conservative: every significant word in the award's name must
 * appear in the accreditation's name, and exactly one accreditation must
 * match. Anything ambiguous is skipped and reported rather than guessed, so
 * the two Anthem entries can never be swapped.
 */
class LinkAwardLogos extends Command
{
    protected $signature = 'awards:link-logos {--dry-run : Show what would change without saving}';

    protected $description = 'Match each award to the accreditation holding its logo';

    /** Words too common to tell two awards apart. */
    private const IGNORED = ['the', 'and', 'of', 'for', 'a', 'an', 'award', 'awards'];

    public function handle(): int
    {
        $accreditations = Accreditation::all();

        if ($accreditations->isEmpty()) {
            $this->warn('No accreditations found. Nothing to link.');

            return self::SUCCESS;
        }

        $dryRun = (bool) $this->option('dry-run');
        $linked = 0;
        $skipped = 0;

        foreach (Award::orderBy('category')->ordered()->get() as $award) {
            $tokens = $this->tokens($award->name);

            if ($tokens === []) {
                $this->warn("  skip    {$award->name} (no distinctive words to match on)");
                $skipped++;
                continue;
            }

            $matches = $accreditations->filter(function (Accreditation $a) use ($tokens) {
                $haystack = $this->normalise($a->name);

                foreach ($tokens as $token) {
                    if (! str_contains($haystack, $token)) {
                        return false;
                    }
                }

                return true;
            });

            if ($matches->count() !== 1) {
                $this->warn(sprintf(
                    '  skip    %s (%d accreditations matched, expected 1)',
                    $award->name,
                    $matches->count()
                ));
                $skipped++;
                continue;
            }

            $accreditation = $matches->first();
            $this->info("  link    {$award->name}  ->  {$accreditation->name}");

            // Never throw away a badge somebody actually uploaded. Only clear
            // the image when its file is gone, which is the case for the
            // placeholder SVGs that were seeded but never deployed.
            $keepsOwnImage = $award->image && Storage::disk('public')->exists($award->image);

            if ($keepsOwnImage) {
                $this->line('          (keeping its uploaded badge, which takes precedence)');
            }

            if (! $dryRun) {
                $award->accreditation_id = $accreditation->id;

                if (! $keepsOwnImage) {
                    $award->image = null;
                }

                $award->save();
            }

            $linked++;
        }

        $this->newLine();
        $this->info($dryRun
            ? "{$linked} would be linked, {$skipped} skipped. Re-run without --dry-run to save."
            : "{$linked} linked, {$skipped} skipped.");

        if ($skipped > 0) {
            $this->line('Skipped awards can be pointed at a logo by hand in Admin > Awards.');
        }

        return self::SUCCESS;
    }

    /** Lowercase, strip everything that is not a letter or digit. */
    private function normalise(string $value): string
    {
        return (string) preg_replace('/[^a-z0-9.]/', '', strtolower($value));
    }

    /** @return array<int, string> */
    private function tokens(string $name): array
    {
        $words = preg_split('/[^A-Za-z0-9.]+/', strtolower($name), -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return array_values(array_filter(
            $words,
            fn (string $w) => ! in_array($w, self::IGNORED, true)
        ));
    }
}
