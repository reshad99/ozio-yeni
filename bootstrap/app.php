<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api_v1.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {

            foreach (config('services.versions') as $version) {
                $version = ucfirst($version);

                Route::middleware('api')
                ->prefix("api/$version")
                ->group(base_path('routes/api.php'));
            }


                Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
