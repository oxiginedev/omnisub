<?php

namespace App\Http\Responses\Contracts;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface LockoutResponse
{
    public function toResponse(Request $request): Response;
}