<?php


namespace App\Repositories;


interface ShoppingCartRepository extends Repository
{
    public function findByUser($userId);
}
