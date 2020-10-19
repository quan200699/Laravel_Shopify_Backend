<?php


namespace App\Repositories\Impl;


use App\WarehouseBillDetail;

class WarehouseBillDetailRepositoryImpl extends \App\Repositories\Eloquent\EloquentRepository implements \App\Repositories\WarehouseBillDetailRepository
{

    public function getModel()
    {
        $model = WarehouseBillDetail::class;
        return $model;
    }
}
