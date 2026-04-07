<?php

namespace App\Console\Commands;

use App\Models\Application;
use App\Models\Child;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackfillChildren extends Command
{
    protected $signature   = 'children:backfill {--dry-run : Preview without saving}';
    protected $description = 'Create Child records for approved applications that are not yet linked';

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        // Only backfill approved applications without a child_id
        $applications = Application::whereNotNull('approved_at')
            ->whereNull('child_id')
            ->orderBy('approved_at')
            ->get();

        if ($applications->isEmpty()) {
            $this->info('Nothing to backfill — all approved applications already have a Child record.');
            return self::SUCCESS;
        }

        $this->info(($dryRun ? '[DRY RUN] ' : '') . "Found {$applications->count()} application(s) to backfill.\n");

        $rows    = [];
        $created = 0;
        $skipped = 0;

        foreach ($applications as $app) {
            $childNumber = Child::generateChildNumber($app->child_name);

            $rows[] = [
                $app->reference,
                $app->child_name,
                $app->approved_at->format('d M Y'),
                $childNumber,
                $dryRun ? 'preview' : 'will create',
            ];

            if (! $dryRun) {
                try {
                    DB::transaction(function () use ($app, $childNumber) {
                        $child = Child::create([
                            'child_number'   => $childNumber,
                            'name'           => $app->child_name,
                            'nickname'       => $app->child_nickname,
                            'dob'            => $app->child_dob,
                            'gender'         => $app->child_gender,
                            'id_number'      => $app->child_id_number,
                            'language'       => $app->child_language,
                            'documents'      => $app->documents,
                            'parent_user_id' => $app->parent_user_id,
                            'child_user_id'  => $app->child_user_id,
                        ]);

                        $app->update(['child_id' => $child->id]);
                    });
                    $created++;
                } catch (\Throwable $e) {
                    $this->error("  Failed for {$app->reference} ({$app->child_name}): {$e->getMessage()}");
                    $skipped++;
                }
            }
        }

        $this->table(
            ['Application Ref', 'Child Name', 'Approved On', 'Child Number', 'Action'],
            $rows
        );

        if (! $dryRun) {
            $this->newLine();
            $this->info("Done. Created: {$created}  |  Skipped/failed: {$skipped}");
        } else {
            $this->newLine();
            $this->warn('Dry run — no records were written. Run without --dry-run to apply.');
        }

        return self::SUCCESS;
    }
}
