<?php

namespace App\Services\EasyAccess;

use Illuminate\Support\ServiceProvider;

class EasyAccessServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: EasyAccessService::class,
            concrete: fn (): EasyAccessService => new EasyAccessService()
        );
    }
}