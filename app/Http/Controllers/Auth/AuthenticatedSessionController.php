<?php

namespace App\Http\Controllers;

use App\Actions\Auth\AttemptToAuthenticateAction;
use App\Actions\Auth\EnsureLoginIsNotThrottledAction;
use App\Actions\Auth\PrepareAuthenticatedSessionAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\Contracts\LoginResponse;
use App\Http\Responses\Contracts\LogoutResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Pipeline as RoutingPipeline;

class AuthenticatedSessionController
{
    public function __construct(
        protected StatefulGuard $guard
    ) {}

    public function index(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): LoginResponse
    {
        return $this->loginPipeline($request)->then(function ($request): LoginResponse {
            return app(LoginResponse::class);
        });
    }

    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return app(LogoutResponse::class);
    }

    protected function loginPipeline(LoginRequest $request): RoutingPipeline
    {
        return (new Pipeline(app()))->send($request)->through(
            pipes: array_filter([
                EnsureLoginIsNotThrottledAction::class,
                AttemptToAuthenticateAction::class,
                PrepareAuthenticatedSessionAction::class,
            ]),
        );
    }
}