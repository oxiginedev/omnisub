<?php

namespace App\Actions;

use Illuminate\Support\Str;

class GenerateReferenceAction
{
    public static function generate(int $length = 11): string
    {
        return Str::upper(Str::random($length));
    }
}