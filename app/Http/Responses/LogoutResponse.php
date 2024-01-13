<?php

namespace App\Http\Responses;

use App\Http\Responses\Contracts\LogoutResponse as LogoutResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse(\Illuminate\Http\Request $request): Response
    {
        return $request->wantsJson()
                    ? response()->noContent()
                    : redirect('/');
    }
}
