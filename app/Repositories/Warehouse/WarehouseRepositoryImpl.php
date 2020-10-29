<?php


namespace App\Repositories\Warehouse;


use App\Repositories\Eloquent\EloquentRepository;
use App\Warehouse;

class WarehouseRepositoryImpl extends EloquentRepository implements WarehouseRepository
{

    public function getModel()
    {
        $model = Warehouse::class;
        return $model;
    }
}
