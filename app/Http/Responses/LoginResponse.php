<?php

namespace App\Http\Responses;

use App\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    public function toResponse(Request $request): Response
    {
        return $request->wantsJson()
                    ?: redirect()->intended(RouteServiceProvider::HOME);
    }
}