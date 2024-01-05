<?php

namespace App\Providers;

use App\Http\Responses\Contracts\RegisterResponseContract;
use App\Http\Responses\RegisterResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading( ! $this->app->environment('production'));
    }

    protected function bindResponses(): void
    {
        $this->app->bind(RegisterResponseContract::class, RegisterResponse::class);
    }
}
