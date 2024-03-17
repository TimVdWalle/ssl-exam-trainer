<?php

namespace App\Actions;

class CreateNewHashAction
{
    public function handle()
    {
        $hash = bin2hex(random_bytes(8));
        return $hash;
    }

}
