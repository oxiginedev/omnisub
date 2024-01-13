<?php

namespace App\Http\Responses;

use App\Http\Responses\Contracts\VerifyEmailViewResponse as VerifyEmailViewResponseContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailViewResponse implements VerifyEmailViewResponseContract
{
    public function toResponse(Request $request): Response
    {
        return $request->wantsJson()
                    ? new JsonResponse()
                    : to_route('verification.notice');
    }
}