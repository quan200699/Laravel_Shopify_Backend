<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\WarehouseRepository;
use App\Warehouse;

class WarehouseBillRepositoryImpl extends EloquentRepository implements WarehouseBillRepository
{

    public function getModel()
    {
        $model = Warehouse::class;
        return $model;
    }
}
