<?php

namespace App\Providers;

use App\Services\V1\Api\Sms\Gateways\Lsim;
use App\Services\V1\Api\Sms\SmsGateway;
use Illuminate\Support\ServiceProvider;

class DependencyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(SmsGateway::class, function ($app) {
            return new Lsim();
        });
    }
}
