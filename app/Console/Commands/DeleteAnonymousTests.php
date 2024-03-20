<?php

namespace App\Console\Commands;

use App\Models\Test;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteAnonymousTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-anonymous-tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete-anonymous-tests';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('delete-anonymous-tests');
        $days = 1;

        $cutoffDate = Carbon::now()->subDays($days);

        // Using Query Builder to delete tests
        /** @var int $deletedTests */
        $deletedTests = Test::query()
            ->whereNull('user_id') // No user associated
            ->where('created_at', '<', $cutoffDate) // Older than x days
            ->delete();

        $this->info("Deleted $deletedTests tests that were older than $days days and had no user associated.");

        return 0;
    }
}
