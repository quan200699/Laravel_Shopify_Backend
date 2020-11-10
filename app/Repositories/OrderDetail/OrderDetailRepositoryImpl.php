<?php


namespace App\Repositories\OrderDetail;

use App\OrderDetail;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderDetailRepositoryImpl extends EloquentRepository implements OrderDetailRepository
{

    public function getModel()
    {
        $model = OrderDetail::class;
        return $model;
    }

    public function getAllWithRelationship()
    {
        return OrderDetail::with('orders', 'product')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return OrderDetail::with('orders', 'product')->where('id', $id)->first();
    }

    public function findAllOrderDetailByOrder($orderId)
    {
        return OrderDetail::with('orders', 'product')->where('orders_id', $orderId)->get();
    }

    public function sumAllProductAmountInOrderDetail($product_id)
    {
        $result = DB::table('order_details')
            ->selectRaw('sum(amount) as totalProduct')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
            ->where('products.id', '=', $product_id)
            ->groupBy('products.id')
            ->first();
        return $result;
    }
}
