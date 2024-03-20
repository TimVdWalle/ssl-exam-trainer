<?php

namespace App\Actions;

use App\Models\Test;

class CheckIfTestExistsForHash
{
    /**
     * @return ?Test
     * @throws \Exception
     */
    public function __invoke(string $hash): ?Test
    {
        // Find the test by hash
        $test = Test::where('hash', $hash)->first();

        // Check if the test has a score or a pass status
        if ($test && ($test->score !== null || $test->passed !== null)) {
            return $test;
        }

        // Return null if no result exists or if it doesn't have a score or pass status
        return null;
    }
}
