<?php

namespace App\Contracts;

interface IPProviderInterface
{
    public function getIPData(string $ip): string;
}
