<?php


namespace App\Repositories\WarehouseBillDetail;


use App\Repositories\Eloquent\EloquentRepository;
use App\WarehouseBillDetail;

class WarehouseBillDetailRepositoryImpl extends EloquentRepository implements WarehouseBillDetailRepository
{

    public function getModel()
    {
        $model = WarehouseBillDetail::class;
        return $model;
    }
}
