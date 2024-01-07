<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Responses\Contracts\VerifyEmailResponse;
use App\Jobs\CreateReservedAccount;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(VerifyEmailRequest $request): VerifyEmailResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return app(VerifyEmailResponse::class);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));

            CreateReservedAccount::dispatch($request->user());
        }

        return app(VerifyEmailResponse::class);
    }
}
