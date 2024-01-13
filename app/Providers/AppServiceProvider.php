<?php

namespace App\Providers;

use App\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use App\Http\Responses\Contracts\RegisterResponse as RegisterResponseContract;
use App\Http\Responses\Contracts\VerifyEmailViewResponse as VerifyEmailViewResponseContract;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\RegisterResponse;
use App\Http\Responses\VerifyEmailViewResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindResponses();

        $this->app->bind(StatefulGuard::class, fn (): StatefulGuard => Auth::guard('web'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Model::shouldBeStrict();

        Password::defaults(function () {
            $rule = Password::min(8);

            return $this->app->environment('production')
                        ? $rule->mixedCase()->uncompromised()
                        : $rule;
        });
    }

    protected function bindResponses(): void
    {
        $this->app->bind(RegisterResponseContract::class, RegisterResponse::class);
        $this->app->bind(LoginResponseContract::class, LoginResponse::class);
        $this->app->bind(VerifyEmailViewResponseContract::class, VerifyEmailViewResponse::class);
    }
}
