<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class RowPermissionMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @param  string|null  $modelClass
     * @return mixed
     */
    public function handle($request, Closure $next, $permission, $modelClass = null)
    {
        /**
         * @var \App\Models\Admin $admin
         */
        $admin = Auth::guard('admin')->user();

        //TODO CHANGE THIS INTO CONFIG AND ENV FILE
        if ($admin->email == 'admin@example.com') {
            return $next($request);
        }

        try {
            if (!$admin->hasPermissionTo($permission)) {
                return abort(403, 'Unauthorized');
            }
        } catch (PermissionDoesNotExist $th) {
            return abort(403, 'Unauthorized');
        }

        if ($modelClass) {
            $model = $this->resolveModel($request, $modelClass);
            if ($model === false) {
                return abort(404, 'Model not found');
            }

            if ($model->hasPermissionV2($admin)) {
                return $next($request);
            } else {
                return abort(403, 'Unauthorized');
            }
        } else {
            return $next($request);
        }
    }

    /**
     * Modeli request üzerinden çözümle.
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $modelClass
     * @return mixed
     */
    protected function resolveModel($request, $modelClass)
    {
        // Örnek: request parametresinden ID'yi al
        try {
            $modelId = $request->route('id'); // Route'tan ID'yi al
            // if modelId is null then return false
            if (!$modelId) {
                return false;
            }

            return app($modelClass)->findOrFail($modelId);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
