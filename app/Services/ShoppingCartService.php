<?php


namespace App\Services;


interface ShoppingCartService extends Service
{
    public function findByUser($userId);
}
