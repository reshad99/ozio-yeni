<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/V1/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {

            foreach (config('services.versions') as $version) {
                $version = ucfirst($version);

                Route::middleware('api')
                    ->prefix("api/$version")
                    ->group(base_path("routes/$version/api.php"));
            }


            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if (request()->expectsJson() && !request()->ajax()) {
            $this->renderable(function (ValidationException $e) {
                return response(['success' => false, 'statusCode' => 422, 'message' => 'Məlumatlar düzgün deyil', 'errors' => $e->errors()], 422);
            });

            $this->renderable(function (AuthenticationException $e) {
                return response(['success' => false, 'statusCode' => 401, 'message' => 'Hesaba daxil olmamısınız'], 401);
            });

            $this->renderable(function (NotFoundHttpException $e) {
                return response(['success' => false, 'statusCode' => 404, 'message' => 'Belə bir səhifə tapılmadı'], 404);
            });

            $this->renderable(function (ModelNotFoundException $e) {
                return response(['success' => false, 'statusCode' => 404, 'message' => 'Belə bir məlumat tapılmadı'], 404);
            });

            $this->renderable(function (Exception $e) {
                return response(['success' => false, 'statusCode' => 400, 'message' => $e->getMessage() . $e->getFile() . $e->getLine()], 400);
            });
        }
    })->create();
