<?php

namespace App\Http\Responses;

use App\Http\Responses\Contracts\RegisterResponse as RegisterResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse(Request $request): Response
    {
        return $request->wantsJson()
                    ? new JsonResponse('', Response::HTTP_CREATED)
                    : redirect(RouteServiceProvider::HOME);
    }
}
