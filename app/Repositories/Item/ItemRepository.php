<?php


namespace App\Repositories\Item;

use App\Repositories\Repository;

interface ItemRepository extends Repository
{
    public function getAllItemByShoppingCart($shoppingCartId);
}
