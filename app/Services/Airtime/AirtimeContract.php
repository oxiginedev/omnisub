<?php

namespace App\Services\Airtime;

interface AirtimeContract
{
    public function buy(string $phone, int $amout, string $network, ?string $reference = null): void;
}