<?php


namespace App\Services\Review;

use App\Services\Service;

interface ReviewService extends Service
{
    public function findByUserAndProduct($userId, $productId);

    public function getAllReviewByProduct($productId);
}
