<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CustomerInfoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Repositories\Impl\CustomerInfoRepositoryImpl;
use App\Repositories\Impl\ImageRepositoryImpl;
use App\Repositories\Impl\ProductRepositoryImpl;
use App\Repositories\Impl\ReviewRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\Impl\WarehouseBillRepositoryImpl;
use App\Repositories\Impl\WarehouseRepositoryImpl;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseBillRepository;
use App\Repositories\WarehouseRepository;
use App\Services\CategoryService;
use App\Services\CustomerInfoService;
use App\Services\ImageService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\CustomerInfoServiceImpl;
use App\Services\Impl\ImageServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\Impl\WarehouseBillServiceImpl;
use App\Services\Impl\WarehouseServiceImpl;
use App\Services\ProductService;
use App\Services\ReviewService;
use App\Services\UserService;
use App\Services\WarehouseBillService;
use App\Services\WarehouseService;
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
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryImpl::class
        );
        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class
        );
        $this->app->singleton(
            WarehouseRepository::class,
            WarehouseRepositoryImpl::class
        );
        $this->app->singleton(
            WarehouseService::class,
            WarehouseServiceImpl::class
        );
        $this->app->singleton(
            WarehouseBillRepository::class,
            WarehouseBillRepositoryImpl::class
        );
        $this->app->singleton(
            WarehouseBillService::class,
            WarehouseBillServiceImpl::class
        );
        $this->app->singleton(
            CustomerInfoRepository::class,
            CustomerInfoRepositoryImpl::class
        );
        $this->app->singleton(
            CustomerInfoService::class,
            CustomerInfoServiceImpl::class
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
