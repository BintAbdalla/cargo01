<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\interfaces\CargaisonServiceInterface::class,
            \App\Services\CargaisonService::class
        );
    
        $this->app->bind(
            \App\Services\interfaces\ProductServiceInterface::class,
            \App\Services\ProduitService::class
        );
    }
    
}
