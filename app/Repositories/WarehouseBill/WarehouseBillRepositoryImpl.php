<?php


namespace App\Repositories\WarehouseBill;


use App\Repositories\Eloquent\EloquentRepository;
use App\WarehouseBill;
use Illuminate\Support\Facades\DB;

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

    public function sumTotalPriceHaveBought($month, $year)
    {
        $result = DB::table('warehouse_bills')
            ->selectRaw('sum(amount*price) as totalPrice')
            ->leftJoin('warehouse_bill_details', 'warehouse_bills.id', '=', 'warehouse_bill_details.ware_house_bill_id')
            ->leftJoin('products', 'warehouse_bill_details.product_id', '=', 'products.id')
            ->whereMonth('create_date', '=', $month)
            ->whereYear('create_date', '=', $year)
            ->first();
        return $result;
    }
}
