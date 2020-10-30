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

    public function getAllWithRelationship()
    {
        return WarehouseBillDetail::with('wareHouseBill', 'product')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return WarehouseBillDetail::with('wareHouseBill', 'product')
            ->where('id', $id)->get();
    }

    public function findAllByWarehouseBill($warehouseBillId)
    {
        return WarehouseBillDetail::with('warehouseBill', 'product')
            ->where('ware_house_bill_id',$warehouseBillId)->get();
    }
}
