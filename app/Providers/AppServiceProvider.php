<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Repositories\Impl\ProductRepositoryImpl;
use App\Repositories\ProductRepository;
use App\Services\CategoryService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(
            CategoryRepository::class,
            CategoryRepositoryImpl::class
        );
        $this->app->singleton(
            CategoryService::class,
            CategoryServiceImpl::class
        );
        $this->app->singleton(
            ProductRepository::class,
            ProductRepositoryImpl::class
        );
        $this->app->singleton(
            ProductService::class,
            ProductServiceImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
