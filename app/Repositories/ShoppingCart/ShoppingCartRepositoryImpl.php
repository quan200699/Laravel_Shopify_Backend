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
        $result = ShoppingCart::with('user')->where('user_id', $userId)->first();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return ShoppingCart::with('user')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return ShoppingCart::with('user')->where('id', $id)->first();
    }
}
