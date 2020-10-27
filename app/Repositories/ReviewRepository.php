<?php


namespace App\Repositories;


interface ReviewRepository extends Repository
{
    public function findByUserAndProduct($userId, $productId);
}
