<?php


namespace App\Repositories\ShoppingCart;


use App\Repositories\Eloquent\EloquentRepository;
use App\ShoppingCart;

class ShoppingCartRepositoryImpl extends EloquentRepository implements ShoppingCartRepository
{

    public function getModel()
    {
        $this->model = ShoppingCart::class;
        return $this->model;
    }

    public function findByUser($userId)
    {
        $result = $this->model->where('user_id', $userId)->get();
        return $result;
    }
}
