<?php


namespace App\Repositories\Impl;


use App\Order;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderRepository;

class OrderRepositoryImpl extends EloquentRepository implements OrderRepository
{

    public function getModel()
    {
        $model = Order::class;
        return $model;
    }
}
