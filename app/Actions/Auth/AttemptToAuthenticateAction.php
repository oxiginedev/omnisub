<?php

namespace App\Actions\Auth;

use App\Support\LoginRateLimiter;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AttemptToAuthenticateAction
{
    public function __construct(
        protected LoginRateLimiter $limiter,
        protected StatefulGuard $guard
    ) {
    }

    public function handle(Request $request, callable $next): mixed
    {
        if ($this->guard->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember_me'))
        ) {
            return $next($request);
        }

        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
}
