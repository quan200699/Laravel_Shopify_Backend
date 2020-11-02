<?php


namespace App\Repositories\Order;


use App\Order;
use App\Product;
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
        return Order::with('user')->where('id', $id)->first();
    }

    public function findAllProductsByUser($user_id)
    {
        return Product::with('category')
            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_details.orders_id')
            ->where('orders.user_id', $user_id)
            ->where('orders.status', '=', 1)
            ->get();
    }

    public function sumAllPriceInOrder($month, $year)
    {
        $result = DB::table('orders')
            ->selectRaw('sum(amount*price) as totalPrice')
            ->leftJoin('order_details', 'orders.id', '=', 'order_details.orders_id')
            ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
            ->whereMonth('create_date', '=', $month)
            ->whereYear('create_date', '=', $year)
            ->first();
        return $result;
    }
}
