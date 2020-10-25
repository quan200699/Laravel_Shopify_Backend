<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;

use App\Repositories\WarehouseBillRepository;
use App\WarehouseBill;

class WarehouseBillRepositoryImpl extends EloquentRepository implements WarehouseBillRepository
{

    public function getModel()
    {
        $model = WarehouseBill::class;
        return $model;
    }
}
