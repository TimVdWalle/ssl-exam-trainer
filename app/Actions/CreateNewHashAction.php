<?php

namespace App\Actions;

class CreateNewHashAction
{
    /**
     * @return string
     * @throws \Exception
     */
    public function handle(): string
    {
        $hash = bin2hex(random_bytes(8));
        return $hash;
    }

}
