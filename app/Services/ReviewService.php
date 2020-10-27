<?php


namespace App\Services;


interface ReviewService extends Service
{
    public function findByUserAndProduct($userId, $productId);
}
