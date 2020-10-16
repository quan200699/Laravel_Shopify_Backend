<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\ImageRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Repositories\Impl\ImageRepositoryImpl;
use App\Repositories\Impl\ProductRepositoryImpl;
use App\Repositories\Impl\ReviewRepositoryImpl;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\ImageServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\ProductService;
use App\Services\ReviewService;
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
        $this->app->singleton(
            ImageRepository::class,
            ImageRepositoryImpl::class
        );
        $this->app->singleton(
            ImageService::class,
            ImageServiceImpl::class
        );
        $this->app->singleton(
            ReviewRepository::class,
            ReviewRepositoryImpl::class
        );
        $this->app->singleton(
            ReviewService::class,
            ReviewServiceImpl::class
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
