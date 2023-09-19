<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class IPAPI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ipapi';
    }
}
