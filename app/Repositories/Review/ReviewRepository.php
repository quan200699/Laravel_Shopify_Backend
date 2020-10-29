<?php


namespace App\Repositories\Review;

use App\Repositories\Repository;

interface ReviewRepository extends Repository
{
    public function findByUserAndProduct($userId, $productId);

    public function getAllReviewByProduct($productId);
}
