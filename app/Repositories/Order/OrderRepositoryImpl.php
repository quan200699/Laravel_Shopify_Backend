<?php


namespace App\Repositories\Order;


use App\Order;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderRepositoryImpl extends EloquentRepository implements OrderRepository
{

    public function getModel()
    {
        $model = Order::class;
        return $model;
    }

    public function findAllByUserAndStatus($user_id, $status)
    {
        $result = Order::with('user')->where('user_id', $user_id)
            ->where('status', $status)->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Order::with('user')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Order::with('user')->where('id', $id)->get();
    }

    public function findAllProductsByUser($user_id)
    {
        return Order::with('user')
            ->leftJoin('order_details', 'orders.id', '=', 'order_details.orders_id')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)->get();
        // TODO: Implement findAllProductsByUser() method.
    }

    public function sumAllPriceInOrder($month, $year)
    {
        $result = DB::table('orders')
            ->selectRaw('sum(order_details.amount*products.price) as totalPrice')
            ->leftJoin('order_details','orders.id','=','order_details.orders_id')
            ->leftJoin('products','order_details.product_id','=','products.id')
            ->whereMonth('create_date',$month)
            ->whereYear('create_date',$year)
            ->first();
        return $result;
    }
}
