<?php


namespace App\Repositories\Impl;

use App\OrderDetail;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderDetailRepository;

class OrderDetailRepositoryImpl extends EloquentRepository implements OrderDetailRepository
{

    public function getModel()
    {
        $model = OrderDetail::class;
        return $model;
    }
}
