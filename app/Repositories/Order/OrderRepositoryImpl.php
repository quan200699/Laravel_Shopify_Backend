<?php


namespace App\Repositories\Order;


use App\Order;
use App\Repositories\Eloquent\EloquentRepository;

class OrderRepositoryImpl extends EloquentRepository implements OrderRepository
{

    public function getModel()
    {
        $model = Order::class;
        return $model;
    }

    public function findAllByUserAndStatus($user_id, $status)
    {
        $result = $this->model->where('user_id', $user_id)
            ->where('status', $status)->get();
        return $result;
    }
}
