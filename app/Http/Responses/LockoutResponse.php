<?php

namespace App\Http\Responses;

use App\Http\Responses\Contracts\LockoutResponse as LockoutResponseContract;
use App\Support\LoginRateLimiter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LockoutResponse implements LockoutResponseContract
{
    public function __construct(
        protected LoginRateLimiter $limiter,
    ) {}

    public function toResponse(Request $request): Response
    {
        return with($this->limiter->availableIn($request), function (int $seconds) {
            throw ValidationException::withMessages([
                'email' => [
                    trans('auth.throttle', [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]),
                ],
            ])->status(Response::HTTP_TOO_MANY_REQUESTS);
        });
    }
}