<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowLocale extends Command
{
    protected $signature = 'app:locale';
    protected $description = 'Shows the current application locale';

    /**
     * @return int
     */
    public function handle(): int
    {
        $this->info('Current application locale: ' . app()->getLocale());
        return 0;
    }
}
