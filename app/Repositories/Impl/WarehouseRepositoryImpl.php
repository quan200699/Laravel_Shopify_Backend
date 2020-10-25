<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\WarehouseRepository;
use App\Warehouse;

class WarehouseRepositoryImpl extends EloquentRepository implements WarehouseRepository
{

    public function getModel()
    {
        $model = Warehouse::class;
        return $model;
    }
}
