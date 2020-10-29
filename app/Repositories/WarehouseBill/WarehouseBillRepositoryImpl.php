<?php


namespace App\Repositories\WarehouseBill;


use App\Repositories\Eloquent\EloquentRepository;
use App\WarehouseBill;

class WarehouseBillRepositoryImpl extends EloquentRepository implements WarehouseBillRepository
{

    public function getModel()
    {
        $model = WarehouseBill::class;
        return $model;
    }

    public function getAllWithRelationship()
    {
        return WarehouseBill::with('warehouse')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return WarehouseBill::with('warehouse')->where('id', $id)->get();
    }
}
