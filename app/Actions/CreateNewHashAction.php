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
            // https://stackoverflow.com/questions/73845399/phpstan-parameter-1-length-of-function-random-bytes-expects-int1-max-int
            // bin2hex doubles the chars, so we halve the length first
            $newHash = bin2hex(random_bytes(max(4, intval($hashLength / 2))));
//        } while (Test::where('hash_column', $newHash)->exists()); // Check if it exists



//        $hash = bin2hex(random_bytes(8));
        return $newHash;
    }

}
