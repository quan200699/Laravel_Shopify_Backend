<?php


namespace App\Repositories\ShoppingCart;

use App\Repositories\Repository;

interface ShoppingCartRepository extends Repository
{
    public function findByUser($userId);
}
