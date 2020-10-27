<?php


namespace App\Services;


interface ItemService extends Service
{
    public function getAllItemByShoppingCart($shoppingCartId);
}
