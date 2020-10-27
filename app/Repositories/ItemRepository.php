<?php


namespace App\Repositories;


interface ItemRepository extends Repository
{
    public function getAllItemByShoppingCart($shoppingCartId);
}
