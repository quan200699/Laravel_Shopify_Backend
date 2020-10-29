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

    public function getAllWithRelationship()
    {
        // TODO: Implement getAllWithRelationship() method.
    }

    public function findByIdWithRelationship($id)
    {
        // TODO: Implement findByIdWithRelationship() method.
    }
}
