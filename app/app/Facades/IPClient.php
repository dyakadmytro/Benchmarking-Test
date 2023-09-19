<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class IPClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ip-client';
    }
}
