<?php


namespace App\Services\ShoppingCart;

use App\Services\Service;

interface ShoppingCartService extends Service
{
    public function findByUser($userId);
}
