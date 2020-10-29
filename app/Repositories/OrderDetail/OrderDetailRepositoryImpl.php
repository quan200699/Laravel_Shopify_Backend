<?php


namespace App\Repositories\OrderDetail;

use App\OrderDetail;
use App\Repositories\Eloquent\EloquentRepository;

class OrderDetailRepositoryImpl extends EloquentRepository implements OrderDetailRepository
{

    public function getModel()
    {
        $model = OrderDetail::class;
        return $model;
    }
}
