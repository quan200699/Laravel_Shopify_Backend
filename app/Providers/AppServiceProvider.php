<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CustomerInfoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\Impl\CategoryRepositoryImpl;
use App\Repositories\Impl\CustomerInfoRepositoryImpl;
use App\Repositories\Impl\ImageRepositoryImpl;
use App\Repositories\Impl\ItemRepositoryImpl;
use App\Repositories\Impl\NotificationRepositoryImpl;
use App\Repositories\Impl\ProductRepositoryImpl;
use App\Repositories\Impl\ReviewRepositoryImpl;
use App\Repositories\Impl\ShoppingCartRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\Impl\WarehouseBillDetailRepositoryImpl;
use App\Repositories\Impl\WarehouseBillRepositoryImpl;
use App\Repositories\Impl\WarehouseRepositoryImpl;
use App\Repositories\ItemRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ShoppingCartRepository;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseBillDetailRepository;
use App\Repositories\WarehouseBillRepository;
use App\Repositories\WarehouseRepository;
use App\Services\CategoryService;
use App\Services\CustomerInfoService;
use App\Services\ImageService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\CustomerInfoServiceImpl;
use App\Services\Impl\ImageServiceImpl;
use App\Services\Impl\ItemServiceImpl;
use App\Services\Impl\NotificationServiceImpl;
use App\Services\Impl\ProductServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\Impl\ShoppingCartServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\Impl\WarehouseBillDetailServiceImpl;
use App\Services\Impl\WarehouseBillServiceImpl;
use App\Services\Impl\WarehouseServiceImpl;
use App\Services\ItemService;
use App\Services\NotificationService;
use App\Services\ProductService;
use App\Services\ReviewService;
use App\Services\ShoppingCartService;
use App\Services\UserService;
use App\Services\WarehouseBillDetailService;
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
        $this->app->singleton(
            NotificationRepository::class,
            NotificationRepositoryImpl::class
        );
        $this->app->singleton(
            NotificationService::class,
            NotificationServiceImpl::class
        );
        $this->app->singleton(
            ShoppingCartRepository::class,
            ShoppingCartRepositoryImpl::class
        );
        $this->app->singleton(
            ShoppingCartService::class,
            ShoppingCartServiceImpl::class
        );
        $this->app->singleton(
            ItemRepository::class,
            ItemRepositoryImpl::class
        );
        $this->app->singleton(
            ItemService::class,
            ItemServiceImpl::class
        );
        $this->app->singleton(
            WarehouseBillDetailRepository::class,
            WarehouseBillDetailRepositoryImpl::class
        );
        $this->app->singleton(
            WarehouseBillDetailService::class,
            WarehouseBillDetailServiceImpl::class
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
