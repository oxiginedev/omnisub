<?php

namespace App\Http\Responses\Contracts;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface RegisterResponseContract
{
    public function toResponse(Request $request): Response;
}