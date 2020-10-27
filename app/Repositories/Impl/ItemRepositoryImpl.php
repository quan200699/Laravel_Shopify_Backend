<?php


namespace App\Repositories\Impl;


use App\Item;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ItemRepository;

class ItemRepositoryImpl extends EloquentRepository implements ItemRepository
{

    public function getModel()
    {
        $this->model = Item::class;
        return $this->model;
    }

    public function getAllItemByShoppingCart($shoppingCartId)
    {
        $result = $this->model->where('shopping_cart_id', $shoppingCartId)->get();
        return $result;
    }
}
