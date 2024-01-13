<?php

namespace App\Http\Controllers\Auth;

use App\Http\Responses\Contracts\FailedPasswordResetLinkResponse;
use App\Http\Responses\Contracts\RequestPasswordResetLinkViewResponse;
use App\Http\Responses\Contracts\SuccessfulPasswordResetLinkResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController
{
    public function create(Request $request): RequestPasswordResetLinkViewResponse
    {
        return app(RequestPasswordResetLinkViewResponse::class);
    }

    public function store(Request $request): Responsable
    {
        $request->validate(['email' => 'required|email:filter|exists:users,table']);

        $status = Password::sendResetLink(
            credentials: $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? app(SuccessfulPasswordResetLinkResponse::class)
                    : app(FailedPasswordResetLinkResponse::class);
    }
}
