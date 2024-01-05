<?php

namespace App\Http\Controllers\Auth;

use App\Http\Responses\Contracts\VerifyEmailViewResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): VerifyEmailViewResponse
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : app(VerifyEmailViewResponse::class);
    }
}
