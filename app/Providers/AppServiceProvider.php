<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryImpl;
use App\Repositories\CustomerInfo\CustomerInfoRepository;
use App\Repositories\CustomerInfo\CustomerInfoRepositoryImpl;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryImpl;
use App\Repositories\Item\ItemRepository;
use App\Repositories\Item\ItemRepositoryImpl;
use App\Repositories\Notification\NotificationRepository;
use App\Repositories\Notification\NotificationRepositoryImpl;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryImpl;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryImpl;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryImpl;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Review\ReviewRepositoryImpl;
use App\Repositories\ShoppingCart\ShoppingCartRepository;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryImpl;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImpl;
use App\Repositories\Warehouse\WarehouseRepository;
use App\Repositories\Warehouse\WarehouseRepositoryImpl;
use App\Repositories\WarehouseBill\WarehouseBillRepository;
use App\Repositories\WarehouseBill\WarehouseBillRepositoryImpl;
use App\Repositories\WarehouseBillDetail\WarehouseBillDetailRepository;
use App\Repositories\WarehouseBillDetail\WarehouseBillDetailRepositoryImpl;
use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceImpl;
use App\Services\CustomerInfo\CustomerInfoService;
use App\Services\CustomerInfo\CustomerInfoServiceImpl;
use App\Services\Image\ImageService;
use App\Services\Image\ImageServiceImpl;
use App\Services\Item\ItemService;
use App\Services\Item\ItemServiceImpl;
use App\Services\Notification\NotificationService;
use App\Services\Notification\NotificationServiceImpl;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceImpl;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceImpl;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceImpl;
use App\Services\Review\ReviewService;
use App\Services\Review\ReviewServiceImpl;
use App\Services\ShoppingCart\ShoppingCartService;
use App\Services\ShoppingCart\ShoppingCartServiceImpl;
use App\Services\User\UserService;
use App\Services\User\UserServiceImpl;
use App\Services\Warehouse\WarehouseService;
use App\Services\Warehouse\WarehouseServiceImpl;
use App\Services\WarehouseBill\WarehouseBillService;
use App\Services\WarehouseBill\WarehouseBillServiceImpl;
use App\Services\WarehouseBillDetail\WarehouseBillDetailService;
use App\Services\WarehouseBillDetail\WarehouseBillDetailServiceImpl;
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
        $this->app->singleton(
            OrderRepository::class,
            OrderRepositoryImpl::class
        );
        $this->app->singleton(
            OrderService::class,
            OrderServiceImpl::class
        );
        $this->app->singleton(
            OrderDetailRepository::class,
            OrderDetailRepositoryImpl::class
        );
        $this->app->singleton(
            OrderDetailService::class,
            OrderDetailServiceImpl::class
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
