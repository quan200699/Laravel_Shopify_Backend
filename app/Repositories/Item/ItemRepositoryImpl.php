<?php


namespace App\Repositories\Item;


use App\Item;
use App\Repositories\Eloquent\EloquentRepository;

class ItemRepositoryImpl extends EloquentRepository implements ItemRepository
{

    public function getModel()
    {
        $this->model = Item::class;
        return $this->model;
    }

    public function getAllItemByShoppingCart($shoppingCartId)
    {
        $result = Item::with('product', 'shoppingCart')
            ->where('shopping_cart_id', $shoppingCartId)->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Item::with('product', 'shoppingCart')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Item::with('product', 'shoppingCart')->where('id', $id)->first();
    }
}
