<?php


namespace App\Repositories\OrderDetail;

use App\OrderDetail;
use App\Repositories\Eloquent\EloquentRepository;

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
        return OrderDetail::with('orders', 'product')->where('id', $id)->get();
    }

    public function findAllOrderDetailByOrder($orderId)
    {
        return OrderDetail::with('orders','product')->where('orders_id',$orderId)->get();
        // TODO: Implement findAllOrderDetailByOrder() method.
    }
}
