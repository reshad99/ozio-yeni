<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Policy eşleştirmeleri.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Servisleri kaydet.
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Ek Gate tanımları gerekirse burada yapılabilir.
    }
}
