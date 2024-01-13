<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\CreateNewUserAction;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\Contracts\RegisterResponseContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;

class RegisteredUserController
{
    public function __construct(
        protected StatefulGuard $guard
    ) {
    }

    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request, CreateNewUserAction $creator)
    {
        event(new Registered($user = $creator->create($request->validated())));

        $this->guard->login($user);

        return app(RegisterResponseContract::class);
    }
}
