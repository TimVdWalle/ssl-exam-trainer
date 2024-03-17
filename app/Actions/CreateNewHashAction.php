<?php

namespace App\Actions;

use App\Models\Test;

class CreateNewHashAction
{
    /**
     * @return string
     * @throws \Exception
     */
    public function __invoke(): string
    {
        /** @var int $hashLength */
        $hashLength = config('ssl_exam_trainer.test_hash_length');
        // TODO: add code to check if hash exists in cache AND/OR in db
        // as soon as we have one collision: search further, but notify to bugsnag so that the hash length should be made bigger in the configuration (env)

//        do {
            $newHash = bin2hex(random_bytes(intval($hashLength / 2))); // Generate a new hash
//        } while (Test::where('hash_column', $newHash)->exists()); // Check if it exists



//        $hash = bin2hex(random_bytes(8));
        return $newHash;
    }

}
