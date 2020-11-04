<?php


namespace App\Repositories\WarehouseBillDetail;


use App\Repositories\Eloquent\EloquentRepository;
use App\WarehouseBillDetail;
use Illuminate\Support\Facades\DB;

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

    public function sumAllProduct($productId)
    {
        $result = DB::table('warehouse_bill_details')
            ->selectRaw('sum(amount) as totalProduct')
            ->leftJoin('products', 'warehouse_bill_details.product_id', '=', 'products.id')
            ->where('products.id', '=', $productId)
            ->groupBy('products.id')
            ->first();
        return $result;
    }
}
