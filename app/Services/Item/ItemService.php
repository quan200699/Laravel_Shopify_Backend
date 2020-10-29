<?php


namespace App\Services\Item;

use App\Services\Service;

interface ItemService extends Service
{
    public function getAllItemByShoppingCart($shoppingCartId);
}
