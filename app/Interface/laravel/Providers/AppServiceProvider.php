<?php

namespace App\Interface\laravel\Providers;

use App\Domain\product\ProductRepository;
use App\Infrastructure\repository\ProductRepositoryPostgres;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductRepository::class, ProductRepositoryPostgres::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
