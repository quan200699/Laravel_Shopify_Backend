<?php


namespace App\Repositories;


interface ReviewRepository extends Repository
{
    public function getAllReviewByProduct($productId);
}
