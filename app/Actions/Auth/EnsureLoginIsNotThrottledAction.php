<?php

namespace App\Actions\Auth;

use App\Http\Responses\Contracts\LockoutResponse;
use App\Support\LoginRateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;

class EnsureLoginIsNotThrottledAction
{
    public function __construct(
        protected LoginRateLimiter $limiter,
    ) {
    }

    public function handle(Request $request, callable $next): mixed
    {
        if (! $this->limiter->tooManyAttempts($request)) {
            return $next($request);
        }

        event(new Lockout($request));

        return app(LockoutResponse::class);
    }
}
