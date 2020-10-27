<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\WarehouseBillDetailRepository;
use App\WarehouseBillDetail;

class WarehouseBillDetailRepositoryImpl extends EloquentRepository implements WarehouseBillDetailRepository
{

    public function getModel()
    {
        $model = WarehouseBillDetail::class;
        return $model;
    }
}
