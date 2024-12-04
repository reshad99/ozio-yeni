<?php

use App\Http\Middleware\RowPermissionMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../Modules/Api/routes/V1/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {

            foreach (config('services.versions') as $version) {
                $version = ucfirst($version);

                Route::middleware('api')
                    ->prefix("api/$version")
                    ->group(base_path("Modules/Api/routes/$version/api.php"));
            }


            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // RowPermission

        //add this middleware to the $routeMiddleware array in app/Http/Kernel.php
        $middleware->alias([
            'row-perm' => RowPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if (request()->expectsJson() && !request()->ajax()) {
            $exceptions->report(function (ValidationException $e) {
                return response(['success' => false, 'statusCode' => 422, 'message' => 'Məlumatlar düzgün deyil', 'errors' => $e->errors()], 422);
            });

            $exceptions->report(function (AuthenticationException $e) {
                return response(['success' => false, 'statusCode' => 401, 'message' => 'Hesaba daxil olmamısınız'], 401);
            });

            // $exceptions->report(function (NotFoundHttpException $e) {
            //     return response(['success' => false, 'statusCode' => 404, 'message' => 'Belə bir səhifə tapılmadı'], 404);
            // });

            $exceptions->report(function (ModelNotFoundException $e) {
                return response(['success' => false, 'statusCode' => 404, 'message' => 'Belə bir məlumat tapılmadı'], 404);
            });

            $exceptions->report(function (Exception $e) {
                return response(['success' => false, 'statusCode' => 400, 'message' => $e->getMessage() . $e->getFile() . $e->getLine()], 400);
            });
        }
    })->create();
